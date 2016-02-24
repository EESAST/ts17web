<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-8 am-form \">{input}</div>\n<div class=\"col-lg-2 am-form\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label am-song'],
            'errorOptions'=>['']
        ],
    ]); ?>

    <?= $form->field($model, 'teamname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slogan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'key')->textarea(['rows' => 6]) ?>

    <div class="form-group">
    	<div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'am-btn am-btn-success' : 'am-btn am-btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
