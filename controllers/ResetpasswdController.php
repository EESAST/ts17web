<?php

namespace app\controllers;


use Yii;
class ResetpasswdController extends \yii\web\Controller

{
    public function actionIndex()
    {
        return $this->redirect(['site/index']);
        $mail= Yii::$app->mailer->compose();
        $mail->setFrom('duishi17@eesast.com')
            ->setTo('duishi17@eesast.com')
            ->setSubject('This is a test mail ')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();

        var_dump(Yii::$app->mail);
        die();
    }
}