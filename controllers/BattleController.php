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

        //$myteam = Team::findByTeamname($myteamname);
        $myteam = Team::findOne(['teamname'=> $myteamname]);

        //我已上传成功的代码
        $mycodes = Sourcecodes::find()->where(['team'=>$myteamname])->orderBy('uploaded_at DESC')->all();
        $mycodes2 = $mycodes;
        foreach ($mycodes2 as $mycode) {
             $mycode->uploaded_at = $mycode->id.'号，上传于'.$mycode->uploaded_at;
         } 
        
        //已上传代码的队伍，除掉自己所在的队伍
        $teamnames = Sourcecodes::find()->select('team')->where("team<>'$myteamname'")->distinct()->orderBy('uploaded_at DESC');
        $teams = Team::find()->where(['teamname'=>$teamnames])->all();
        
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

        if ($model->load(Yii::$app->request->post())) {
            if($myteam->battled_time<100){//如果对战次数还没到10次
                $myteam->battled_time++;
                $myteam->save(false);

                $model->myteam = $myteam->id;
                //我方代码编号
                $model->mycode = $_POST['BattleForm']['mycode'];
                //敌方队伍名称
                $model->enemyteam = $_POST['BattleForm']['enemyteam'];
                //敌方代码编号
                $model->enemycode = $_POST['BattleForm']['enemycode'];               
                $re = $model->battle();
                
                $result = new Battleresult();
                $result->team1=$myteamname;
                $result->ai1=$model->mycode;
                $result->team2=Team::findOne(['id'=> $model->enemyteam])->teamname;
                $result->ai2=$model->enemycode;
                $result->battle_at=date("Y-m-d H:i:s");
                $result->result='编译中';
                $result->save();

                return $this->redirect(['index']);
            }
        }
        
        return $this->render('index', [
            'model'=>$model,//表单
            'myteam'=>$myteam,//
            'mycodes'=>$mycodes2,//我已上传成功的代码
            'teams'=>$teams,//已上传代码的队伍，除掉自己所在的队伍
            'otherscodes' => $otherscodes,//别的队伍的代码
            'results'=>$results,//对战结果
            'pagination'=>$pagination,//对战结果分页器
            ]);
    }

    public function actionSite($teamname)
    {
        $model = new BattleForm();
        $codes = $model->getTeamcodes($teamname);

        foreach($codes as $value)//=>$name)
        {
            echo Html::tag('option',Html::encode($value->id.'号，上传于'.$value->uploaded_at),array('value'=>$value->id));//,array('value'=>$value));
        }
    }

}





