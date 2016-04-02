<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Sourcecodes;
use yii\web\UploadedFile;
use app\models\User;
use app\models\Team;
use app\models\Firstroundcodes;

class FirstroundsubmitController extends Controller
{
    public $layout = 'main1';
    public function actionIndex()
    {

        //没登录就回到主页
        if(Yii::$app->user->isGuest)
            return $this->render('/site/index');

        //没加入队伍就到/team/error页面
        if (User::findByUsername(Yii::$app->user->identity->username)->teamname=="")
            return $this->render('/team/error',['message'=>'<h2>你还没有加入任何一个战队呢!</h2>']);

        $myteamname = User::findByUsername(Yii::$app->user->identity->username)->teamname;
        $myteam = Team::findOne(['teamname'=> $myteamname]);

        //上传文件
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            if ($myteam->uploaded_time<50) {

                $model->sourcecode = UploadedFile::getInstance($model, 'sourcecode');
                if ($id=$model->upload_first_round()) {
                    return $this->render('uploadsuccess');
                }
            }
        }

        $alreadysubmit=Firstroundcodes::find()->where(array('teamid'=>$myteam->id))->exists();

        //上传文件$model,
        return $this->render('index', [
            'model' => $model,
            'alreadysubmit'=>$alreadysubmit,
            'myteam'=>$myteam,
            ]
        );//,'indexs'=>$indexs]);
    }
}