<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;

//从上个界面传过来了$forum
//需要在database里面再建一个table，detailforum存一个大帖子下的回复，对应到$forum（大帖子）的index

$this->title = $forum->theme;
$this->params['breadcrumbs'][] = ['label' => 'Forum', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<style>
table.padding0 td{padding:10px}
</style>








<table border="1" width="100%" align ="center" class = "padding0">

	<tr>
		<td align="center"><b>主题</b></td>
		<td align="center"><b><?=$forum->theme?></b></td>
	</tr>
	<tr>
		<td align="center" width="15%" rowspan="2" valign="top">
			<br/>
			<p><img width="100%" height="50%"
				src="images/avatar.jpg"/></p><br/>
			<p><b><?=$forum->author?></b></p>
		</td>
		<td valign="top">	
			<p><?=$forum->content?></p>
		</td>	
	</tr>
	<tr>
		<td valign="bottom" align="right">
			#楼主&nbsp&nbsp&nbsp发布于<?=$forum->created_at?>
		</td>
	</tr>

</table>

<br/>











<table border="1" width="90%" align ="center" class = "padding0">
<?php $i=2;foreach ($detailforums as $detailforum): ?>
    <tr>
		<td valign="bottom" align="left">
			#<?= $i++; ?>楼&nbsp&nbsp&nbsp发布于<?=$detailforum->created_at?>
		</td>
		<td align="center" width="15%" rowspan="2" valign="top">
			<br/>
			<p><img width="100%" height="50%"
				src="images/avatar.jpg"/></p><br/>
			<p><b><?=$detailforum->author?></b></p>
		</td>
	</tr>
    <tr>
		<td valign="top" width="85$">	
			<p> <?=$detailforum->reply?> </p>
		</td>	
	</tr>
	

<?php endforeach; ?>
</table>

<br/>&nbsp<br/>











<?php if (!\Yii::$app->user->isGuest) { ?>

<div class="site-forum">

<?php
    $form = ActiveForm::begin([
        'id' => 'detail-forum-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); 
?>

        <?= $form->field($model, 'reply')->textarea(['rows' => 6])?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        
    </div>
</div>

<?php } ?>






















