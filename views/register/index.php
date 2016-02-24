<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\RegisterForm */
/* @var $portrait app\models\PortraitForm */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register" style="width:90%">
<br/>
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5 am-form \">{input}</div>\n<div class=\"col-lg-5 am-form\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label am-song'],
            'errorOptions'=>['']
        ],
    ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'password2')->passwordInput() ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'realname') ?>

        <?= $form->field($model, 'school') ?>

        <?= $form->field($model, 'class') ?>

        <?= $form->field($model, 'studentnumber') ?>

        /*<?= $form->field($portrait, 'imagefile')->fileInput() ?>*/


        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Register', ['class' => 'am-btn am-btn-success', 'name' => 'register-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        
    </div>
</div>
