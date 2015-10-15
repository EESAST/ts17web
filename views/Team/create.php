<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = Yii::t('app', 'Create Team');
?>
<div class="team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
