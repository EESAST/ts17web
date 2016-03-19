<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Sourcecodes;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Team;
use app\models\Battleform;
use app\models\Battleresult;
use yii\data\Pagination;
use yii\helpers\Html;


class BattleController extends Controller
{
    public $layout = 'main1';
    
    public function actionIndex()
    {

        //没登录就回到主页
        if(Yii::$app->user->isGuest)
            return $this->render('/site/index');

        $myteamname = User::findByUsername(Yii::$app->user->identity->username)->teamname;

        //没加入队伍就到/team/error页面
        if ($myteamname=="")
            return $this->render('/team/error',['message'=>'<h2>你还没有加入任何一个战队呢!</h2>']);

        $team = Team::findByTeamname($myteamname);

        //我已上传成功的代码
        $mycodes = Sourcecodes::find()->where(['team'=>$myteamname])->select('uploaded_at')->orderBy('uploaded_at DESC')->column();
        
        //已上传代码的队伍，除掉自己所在的队伍
        $teamnames = Sourcecodes::find()->select('team')->where("team<>'$myteamname'")->distinct()->orderBy('uploaded_at DESC')->column();
        
        //别的队伍的代码
        $otherscodes = Sourcecodes::find()->where("team<>'$myteamname'")->select('uploaded_at')->orderBy('uploaded_at DESC')->column();

        //对战结果
        $results1 = Battleresult::find();
        //对战结果分页器
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $results1->count(),
        ]);
        $results = $results1->orderBy('battle_at DESC')->offset($pagination->offset)
            ->limit($pagination->limit)->all();

        //表单
        $model = New BattleForm();
        //上传文件$model,
        return $this->render('index', [
            'model'=>$model,//表单
            'mycodes'=>$mycodes,//我已上传成功的代码
            'teamnames'=>$teamnames,//已上传代码的队伍，除掉自己所在的队伍
            'otherscodes' => $otherscodes,//别的队伍的代码
            'results'=>$results,//对战结果
            'pagination'=>$pagination,//对战结果分页器
            ]);
    }

    public function actionSite($teamname)
    {
        $model = new BattleForm();
        $model = $model->getTeamcodes($teamname);

        foreach($model as $value)//=>$name)
        {
            echo Html::tag('option',Html::encode($value));//,array('value'=>$value));
        }
    }

}





