
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Team',
]) . ' ' . $model->teamname;
?>
<div class="am-padding">
<div class="am-cf"><strong class="am-text-primary am-text-lg"><?= Html::encode($this->title) ?></strong>
</div>
<hr/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
