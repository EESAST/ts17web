<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teamname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leadername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member1name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member2name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'member3name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slogan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'key')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
