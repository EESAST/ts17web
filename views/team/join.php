<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Team */
?>

<br/><br/>
<?
$this->title = Yii::t('app', '加入队伍');
?>
<div class="team-view">
    <div class="am-cf"><strong class="am-text-primary am-text-lg"><?= Html::encode($this->title) ?>/<span class="am-text-danger am-text"></span></strong></div>
    <hr/>
    <?= DetailView::widget([
        'model' => $team,
        'attributes' => [
            'teamname',
            'leadername',
            'member1name',
            'member2name',
            'member3name',
            'slogan:ntext',
            'status',
        ],
    ]) ?>

</div>


<div class="team-join">
    <div class="team-form">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'key')->textarea(['rows' => 1]) ?>
        <div class="form-group">
            <?= Html::submitButton('Join', ['class' => $model->isNewRecord ? 'am-btn am-btn-success' : 'am-btn am-btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

