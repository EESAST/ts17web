
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teams');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Join Team'), ['join'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Create Team'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if (!empty($teamname))//Èç¹ûÓÐteam£¬ÔòÊä³ömyteaminfo
        echo
        ' <table><caption><h2>My Team Info</h2></caption><tr></tr><td>Team Name</td><td>Leader</td><td>Member</td><td>Slogan</td>
        <tr><td><?php echo $myTeamInfo->teamname?></td><td><?php echo $myTeamInfo->leadername?></td><td>
                <?php echo $myTeamInfo->member1name.$myTeamInfo->member2name.$myTeamInfo->member3name?></td><td><?php echo $myTeamInfo->slogan?></td></tr></table>'
    ?>



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

</div>

