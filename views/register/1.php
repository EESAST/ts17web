<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
<br/>


    <div class="col-lg-offset-1" style="color:#999;">
        
    </div>
</div>

 <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'action'=>'index.php?r=register/index',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5 \">{input}</div>\n<div class=\"col-lg-5\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
            'errorOptions'=>['']
        ],
    ]); ?>
      <div class="am-form-group">
        <label for="user-name" class="am-u-sm-3 am-form-label">姓名 / Name</label>
        <div class="am-u-sm-9">
          <input type="text" id="user-name" placeholder="姓名 / Name">
          <small>输入你的名字，让我们记住你。</small>
        </div>
      </div>

      <div class="am-form-group">
        <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件 / Email</label>
        <div class="am-u-sm-9">
          <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email">
          <small>邮箱你懂得...</small>
        </div>
      </div>

      <div class="am-form-group">
        <label for="user-phone" class="am-u-sm-3 am-form-label">电话 / Telephone</label>
        <div class="am-u-sm-9">
          <input type="email" id="user-phone" placeholder="输入你的电话号码 / Telephone">
        </div>
      </div>

      <div class="am-form-group">
        <label for="user-QQ" class="am-u-sm-3 am-form-label">QQ</label>
        <div class="am-u-sm-9">
          <input type="email" id="user-QQ" placeholder="输入你的QQ号码">
        </div>
      </div>

      <div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">微博 / Twitter</label>
        <div class="am-u-sm-9">
          <input type="email" id="user-weibo" placeholder="输入你的微博 / Twitter">
        </div>
      </div>

      <div class="am-form-group">
        <label for="user-intro" class="am-u-sm-3 am-form-label">简介 / Intro</label>
        <div class="am-u-sm-9">
          <textarea class="" rows="5" id="user-intro" placeholder="输入个人简介"></textarea>
          <small>250字以内写出你的一生...</small>
        </div>
      </div>

      <div class="am-form-group">
        <div class="am-u-sm-9 am-u-sm-push-3">
          <button type="button" class="am-btn am-btn-primary">保存修改</button>
        </div>
      </div>
    <?php ActiveForm::end(); ?>
  </div>































  <!--
<div class="am-g">

  <div class="am-u-md-6 am-u-sm-centered">
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}{error}",
            'errorOptions'=>['']
        ],
    ]); ?>
        <fieldset class="am-form-set">
        <input type="text" id="doc-vld-name-2-1" minlength="3" placeholder="输入用户名（至少 3 个字符）" required/>

        
        <input type="text" placeholder="取个昵称(字母开头，至少包含六个字符)" id="registerform-username" name="RegisterForm[username]" minlength="6" required/>
        <input type="password" placeholder="输入密码(密码长度不能少于6位)" id="registerform-password" name="RegisterForm[password]" minlength="6" required/>
        <input type="password" placeholder="确认密码" id="registerform-password2"  name="RegisterForm[password2]" data-equal-to="#registerform-password1" required/>
        <input type="email" placeholder="您的邮箱" id="registerform-email"  name="RegisterForm[email]" required/>
        <input type="text" placeholder="真实姓名" id="registerform-realname" name="RegisterForm[realname]" required/>
        <input type="text" placeholder="您的学校" id="registerform-school" name="RegisterForm[school]" required/>
        <input type="text" placeholder="院系班级" id="registerform-class" name="RegisterForm[class]" required/>
        <input type="text" placeholder="学生证号(选填)" id="registerform-studentnumber" name="RegisterForm[studentnumber]" required/>
        <button type="submit" class="am-btn am-btn-primary am-btn-block">Submit</button>
      </fieldset>      
    <?php ActiveForm::end(); ?>
  </div>
</div>



<div class="am-g">
  <div class="am-u-md-6 am-u-sm-centered">
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}{error}",
            'errorOptions'=>['']
        ],
    ]); ?>
    <fieldset >
        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password2')->passwordInput() ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'realname') ?>

        <?= $form->field($model, 'school') ?>

        <?= $form->field($model, 'class') ?>

        <?= $form->field($model, 'studentnumber') ?>

         <?= Html::submitButton('Register', ['class' => 'am-btn am-btn-success am-btn-block', 'name' => 'register-button']) ?>
        </fieldset>
    <?php ActiveForm::end(); ?>

</div>
</div>


-->