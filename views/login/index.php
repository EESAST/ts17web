<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

echo \Yii::$app->view->renderFile('@app/views/site/index.php');

?>

<button type="button" class="am-btn am-btn-primary" id='123' data-am-modal="{target:'#temp'}" >点我试试</button>
<div class="am-modal am-modal-prompt" tabindex='-1' id='temp'>
    <div class="am-modal-dialog" id='login'>
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="am-modal-hd">Login</div>
        <input type="text" class="am-modal-prompt-input" id="loginform-username" name="LoginForm[username]" >
        <input type="password" class="am-modal-prompt-input"  id='loginform-password' name="LoginForm[password]">
        <div class="am-modal-footer">
            <span class="am-modal-btn"  data-am-modal-cancel> login</span>
            <span class="am-modal-btn"  data-am-modal-confirm>cancel</span>
        </div>
    <?php ActiveForm::end(); ?>
    </div>

</div>
<script>
    $(function(){
        $('#123').on('click',function(){
            $('#temp').modal({
                relatedTarget:this,
                OnConfirm:function(e){
                    alert("你输入的是 ");
                },
                OnCalcel:function(e){
                    alert("算了");
                }
            });
        });
    });
</script>

<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                <?= Html::a(Yii::t('app', 'Register'), ['/register'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>