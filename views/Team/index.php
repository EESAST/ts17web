<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<br/>
  <div class="am-cf am-padding">
    <div class="am-cf"><strong class="am-text-primary am-text-lg">队伍信息</strong>/<small>你和你的队友们将在这里相遇</small></div>
<br/>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn','header'=>'序号'],
            'teamname',
            'leadername',
             'slogan:ntext',
             'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view}     {area}',
                'buttons' => [
                 'area' => function ($url, $model) {
                                     return Html::a('<span class="am-icon-user-plus"></span>', $url,['title' => Yii::t('app', '申请加入')]);
                             },
                 'view' => function ($url, $model) {
                                    return Html::a('<span class="am-icon-twitch"></span>', $url, ['title' => Yii::t('app', '查看详情')]);
                            },
                ],
            'urlCreator' => function ($action, $model, $key, $index) {
                 if ($action === 'view') {
                    return ['view', 'id' => $model->id];
                } else if ($action === 'area' && Yii::$app->user->identity->teamname==null) {
                      return ['join','id'=>$model->id];
                }
            }
            ]

        ],
    ]);
     ?>
    <p>
        <?php  
        if(Yii::$app->user->identity->teamname!=null) 
            echo Html::a(Yii::t('app', '我要到我的战队看看'), ['view','id'=>$info], ['class' => 'am-btn am-btn-success am-btn-block']);
        else
            echo Html::a(Yii::t('app', '算了，还是创建队伍吧'), ['create'], ['class' => 'am-btn am-btn-success am-btn-block']);

         ?>
    </p>
    
</div>
