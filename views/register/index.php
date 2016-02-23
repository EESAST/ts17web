<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use app\doc\widgets\myActiveForm;
$this->title = 'Register';
?>
<div class="am-g">
<div class="am-u-md-8 am-u-sm-centered">
    <?php $form = myActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}",
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'errorOptions'=>['class'=>'am-text-danger']
        ],
    ]); ?>

    <h2 align="center"><strong><a href="#">请填写下表进行注册</a></strong></h2>
        <?= $form->field($model, 'username',['placeholder'=>'请设置一个用户名(至少应包含6个字符)']) ?>

        <?= $form->field($model, 'password',['placeholder'=>'请设置登录密码(至少应包含6个字符)'])->passwordInput() ?>

        <?= $form->field($model, 'password2',['placeholder'=>'请确认登录密码(两次输入的密码需要一致)'])->passwordInput() ?>

        <?= $form->field($model, 'email',['placeholder'=>'请输入您的邮箱(该邮箱将在找回密码)']) ?>

        <?= $form->field($model, 'realname',['placeholder'=>'请输入您的真实姓名(这有助于我们确定您的真实身份)']) ?>

        <?= $form->field($model, 'school',['placeholder'=>'请输入您的学校全称(五道口男子技术学院?)']) ?>

        <?= $form->field($model, 'class',['placeholder'=>'请输入您的院系-班级(例:电子工程系-无59班)']) ?>

        <?= $form->field($model, 'studentnumber',['placeholder'=>'请输入您的学号(例:2015012345)']) ?>

        
        <?= Html::submitButton('Register', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'register-button']) ?>
    
    <?php myActiveForm::end(); ?>
</div>
</div>
<br/>