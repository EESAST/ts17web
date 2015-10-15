<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Team',
]) . ' ' . $model->teamname;
?>
<div class="team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
