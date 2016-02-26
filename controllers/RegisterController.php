<?php

namespace app\controllers;


use Yii;
use app\models\RegisterForm;
use app\models\PortraitForm;
use yii\web\UploadedFile;





class RegisterController extends \yii\web\Controller
{

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('/dashboard/index');
        }
        $portrait = new PortraitForm();
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) )
        {
            $portrait->imagefile = UploadedFile::getInstance($portrait, 'portrait');
            $connection = \Yii::$app->db;
            $command = $connection->createCommand('SELECT max(id) FROM user');
            $index = $command->queryall();
            var_dump($portrait->userid);
            $model->portrait = $portrait;
            $user=$model->register();
            Yii::$app->user->login($user, 0);
            return $this->render('/dashboard/index');
            //注册成功后登陆并直接跳转到dashboard
        }
        return $this->render('index', [
            'model' => $model,
            'portrait'=>$portrait,
        ]);
    }

}
