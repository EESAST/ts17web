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
        'id' => 'changepwd-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}",
        ],
    ]); ?>
        <?= $form->field($model, 'newpwd',['placeholder'=>'请输入您的新密码']) ?>
        <?= $form->field($model, 'verifynewpwd',['placeholder'=>'请再一次输入您的新密码']) ?>
        <?= Html::submitButton('确定', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'changepwd-button']) ?>
    <p></p>
    <?php myActiveForm::end(); ?>
</div>
<br/>

<script>
$(document).ready(function(){
    var newpwd=$("#form_newpwd").children("input");    
    var verifynewpwd=$("#form_verifynewpwd").children("input");  
    newpwd.focus(function(){
        $("#form_newpwd").removeClass("am-form-error").children("span").remove();
    });
    verifynewpwd.focus(function(){
        $("#form_verifynewpwd").removeClass("am-form-error").children("span").remove();
    });
});

</script>