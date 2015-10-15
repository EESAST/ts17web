<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = Yii::t('app', 'Join Team');

?>
<div class="team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="team-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'teamname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'key')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('Join', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
