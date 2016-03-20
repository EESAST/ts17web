<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\Sourcecodes;
use yii\web\UploadedFile;
use app\models\User;

class OnlineCompileController extends Controller
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

        //上传文件
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->sourcecode = UploadedFile::getInstance($model, 'sourcecode');
            if ($id=$model->upload()) {
                //上传成功就render到uploadsuccess页面
                return $this->render('uploadsuccess',['id'=>$id]);
            }
        }

        //上传文件$model,
        return $this->render('index', ['model' => $model]);//,'indexs'=>$indexs]);
    }
}