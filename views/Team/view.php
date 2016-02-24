
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Team */

$this->title = $model->teamname;
?>
<div class="am-padding">
    <div class="am-cf"><strong class="am-text-primary am-text-lg"><?= Html::encode($this->title) ?></strong>/
    <small><?php echo $model->slogan ?></small></div>
    <hr/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teamname',
            'leadername',
            'member1name',
            'member2name',
            'member3name',
            'slogan:ntext',
//            'key:ntext',
            'status',
        ],
    ]) ?>
    <?php if(Yii::$app->user->identity->username==$model->leadername): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'am-btn am-btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'am-btn am-btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php elseif(Yii::$app->user->identity->username==$model->member1name||Yii::$app->user->identity->username==$model->member2name||Yii::$app->user->identity->username==$model->member3name): ?>
    <p>
    <?= Html::a(Yii::t('app', 'Quit'), ['quit','id'=>$model->id], ['class' => 'am-btn am-btn-danger',]) ?>
    </p>
    <?php elseif(Yii::$app->user->identity->teamname==''): ?>
    <p>
        <?= Html::a(Yii::t('app', 'Join'), ['join','id'=>$model->id], ['class' => 'am-btn am-btn-primary',]) ?>
    </p>
    <?php endif; ?>     
</div>

