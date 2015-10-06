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

    <?= $form->field($model, 'slogan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'key')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=>1]) ?>

    <div class="form-group">Yii::t('app', 'Update')
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
