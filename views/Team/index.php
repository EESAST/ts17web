
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">队伍信息</strong> 
    / <small>你和你的队友们将在这里相遇</small></div>
  </div>
    <p>
        <?= Html::a(Yii::t('app', 'Join Team'), ['join'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Create Team'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'teamname',
            'leadername',
             'slogan:ntext',
             'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


