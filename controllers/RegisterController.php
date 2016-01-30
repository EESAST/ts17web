<?php

namespace app\controllers;


use Yii;
use app\models\User;
use app\models\RegisterForm;
use app\models\LoginForm;


class RegisterController extends \yii\web\Controller
{

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('/dashboard/index');
        }

        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post()) && $user=$model->register()) 
        {
            Yii::$app->user->login($user, 0);
            return $this->render('/dashboard/index');
            //注册成功后登陆并直接跳转到dashboard
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
