<?php

namespace app\controllers;


use Yii;
use app\models\LoginForm;


class LoginController extends \yii\web\Controller
{

    public function actions()
    {
        return [
         'captcha' => [
              'class' => 'yii\captcha\CaptchaAction',
              'maxLength' => 7,
              'minLength' => 5
            ],
        ];
    }
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
       if ($model->load(Yii::$app->request->post()) &&$model->login()) {
            return $this->redirect(['site/index']);
            //登陆之后直接跳转到site
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
?>
