<?php

use yii\helpers\Html;
use app\doc\widgets\myActiveForm;
use yii\captcha\Captcha;

$this->title = '更改密码';

?>
<br/>
<br/>
<br/>

<div class="am-u-lg-4 am-sm-8 am-md-6 am-u-sm-centered am-u-lg-centerd am-u-md-centerd">
    <?php $form = myActiveForm::begin([ 
        'id' => 'verifyoldpwd-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
        <?= $form->field($model, 'verifypwd',['placeholder'=>'请输入您的旧密码']) ?>
        <?= $form->field($model, 'newpwd',['placeholder'=>'请输入您的新密码']) ?>
        <?= $form->field($model, 'verifynewpwd',['placeholder'=>'请再一次输入您的新密码']) ?>
        <?= Html::submitButton('确定', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'verify-button']) ?>
    <?php myActiveForm::end(); ?>
</div>
<br/>

<script>
$(document).ready(function(){
    var verifypwd=$("#form_verifypwd").children("input");    
    verifypwd.focus(function(){
        $("#form_verifypwd").removeClass("am-form-error").children("span").remove();
    });
});

</script>