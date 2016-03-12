<?php 
use app\doc\widgets\myActiveForm;
use yii\helpers\Html;
?>
<br/>
<div>
<br/>
      <div class="am-fl"><strong class="am-text-primary am-text-lg">个人资料</strong> / <small>Personal information</small></div>
      <br/>
      <hr/><small>本页面处于开发阶段，请随意吐槽</small><hr/>
      <hr/><small>目前暂不提供信息修改功能，请见谅</small><hr/>
      <br/>
<div class="am-cf">
    <?php $form = myActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}{input}",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'errorOptions'=>['class'=>'am-text-danger']
        ],
    ]); ?>
        <?= $form->field($model, 'username',['placeholder'=>'请设置一个用户名(应输入6-32个字符，汉字按照1个字符计算)']) ?>

        <?= $form->field($model, 'password',['placeholder'=>'请设置登录密码(至少应包含6个字符)'])->passwordInput() ?>
        <?= $form->field($model, 'email',['placeholder'=>'请输入您的邮箱(该邮箱将在找回密码)']) ?>

        <?= $form->field($model, 'realname',['placeholder'=>'请输入您的真实姓名(这有助于我们确定您的真实身份)']) ?>

        <?= $form->field($model, 'school',['placeholder'=>'请输入您的学校全称(五道口男子技术学院?)']) ?>

        <?= $form->field($model, 'class',['placeholder'=>'请输入您的院系-班级(例:电子工程系-无59班)']) ?>

        <?= $form->field($model, 'studentnumber',['placeholder'=>'请输入您的学号(例:2015012345)']) ?>

        
        <?= Html::submitButton('保存修改', ['class' => 'am-btn am-btn-primary am-btn-block', 'name' => 'register-button']) ?>
    
    <?php myActiveForm::end(); ?>
</div>
  <!-- content end -->
  <br/>
  <br/>
  </div>