<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Team */

?>
<br/><br/>
<?php
$this->title = Yii::t('app', '创建队伍');
?>
<div class="team-create">

     <div class="am-cf"><strong class="am-text-primary am-text-lg"><?= Html::encode($this->title) ?></strong>
     <hr/>
    <small><?php echo $model->slogan ?></small></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
