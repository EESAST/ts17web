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
        return $this->redirect(['site/index']);
        if(Yii::$app->user->isGuest)
            return $this->render('/site/index');
        if (User::findByUsername(Yii::$app->user->identity->username)->teamname=="")
            return $this->render('/team/error',['message'=>'<h2><br/><br/>你还没有加入任何一个战队呢!<br/><br/></h2>']);
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->sourcecode = UploadedFile::getInstance($model, 'sourcecode');
            if ($model->upload()) {
                // ÎÄ¼þÉÏ´«³É¹¦
                return $this->render('uploadsuccess', ['model' => $model]);
            }
        }
        $connection = \Yii::$app->db;
        $teamname = User::findByUsername(Yii::$app->user->identity->username)->teamname;
        $command = $connection->createCommand('SELECT id FROM sourcecodes where team = '.'\''.$teamname.'\'');
        $indexs = $nextindex = $command->queryall();
        return $this->render('index', ['model' => $model,'indexs'=>$indexs]);
    }
}