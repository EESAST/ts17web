<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use app\doc\widgets\myActiveForm;
use yii\captcha\Captcha;

$this->title = 'Login';

?>
<br/>
<br/>
<br/>
<!--这是我的问题，整个页面设计时没有考虑到这些问题，导致了页面的垂直居中除了问题，所以看源代码的小朋友请见谅，我就是这么渣 -->
<div class="am-u-lg-4 am-sm-8 am-md-6 am-u-sm-centered am-u-lg-centerd am-u-md-centerd">
    <?php $form = myActiveForm::begin([ 
        'id' => 'login-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
        <?= $form->field($model, 'username',['placeholder'=>'请输入您的用户名']) ?>

        <?= $form->field($model, 'password',['placeholder'=>'请输入您的登录密码'])->passwordInput() ?>
        
        <?= $form->field($model,
        'verifyCode',
         ['options' => ['class' => 'am-form-field'],
         ])->widget(Captcha::className(),

        ['template' => "{input}<div align='center'>{image}</div>",
        'imageOptions' => ['alt' => '验证码'],
        'captchaAction' => 'site/captcha',
        ]); ?>




        <?= Html::submitButton('登陆', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'login-button']) ?>
    <p></p>
    <div class="am-fr"><a href="#"><p>忘记密码?</p></a></div>
    <?php myActiveForm::end(); ?>
</div>
<br/>

<script type="text/javascript">
$(document).ready(function(){
    var username=$("#form_username").children("input");    
    var password=$("#form_password").children("input");
    username.focus(function(){
        $("#form_username").removeClass("am-form-error").children("span").remove();
    });
    password.focus(function(){
        $("#form_password").removeClass("am-form-error").children("span").remove();
    });

});



</script>