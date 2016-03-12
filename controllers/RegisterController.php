<?php

namespace app\controllers;


use Yii;
use app\models\RegisterForm;
use yii\web\UploadedFile;





class RegisterController extends \yii\web\Controller
{

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 7,
                'minLength' => 5,
            ],
        ];
    }
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) )
        {
            if(($model->register())) {
            $model->login();
            return $this->redirect(['site/index']);
        }
        }

        return $this->render('index', ['model' => $model,]);
    }

}
