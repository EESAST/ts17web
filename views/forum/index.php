<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Forum';
$this->params['breadcrumbs'][] = $this->title;

?>
<h1 align = "center" >Forums</h1>



<?php //若没登陆，就不能发布新的帖子
if (!\Yii::$app->user->isGuest) { ?>
		<p align = "center"><?= Html::a(Yii::t('app', '发帖'), ['new-forum'], ['class' => 'btn btn-success']) ?></p>
<?php } ?>





<?php //好像Yii的自带css将padding设置成了0px 所以就设置回来。。。?>
<style>
.padding0
    td{
        padding:5px;
        border-radius: 10px;
    }


</style>

<table border="1" width="100%" align ="center" class="padding0">
<tr>
	<td align="center" width="60%"><b><?php echo $sort->link('theme')?></b></td>
	<td align="center" width="15%"><b><?php echo $sort->link('author')?></b></td>
	<td align="center" width="8%"><b><?php echo $sort->link('reply')?></b></td>
	<td align="center" width="17%"><b><?php echo $sort->link('updated_at')?></b></td>
</tr>
<?php foreach ($forums as $forum): ?>
    	<tr>
    		<td><img align="center" width="15" height="15" src="images/folder.gif"/> 
    				<a href="<?php echo 'index.php?r=forum/detail-forum&id='.$forum->index
    				//这里之后改成服务器的网址,现在是localhost?>" >
    				<?= $forum->theme?>
    				</a>
    		</td>
    		<td align="center"><?= $forum->author?></td>
    		<td align="center"><?= $forum->reply?></td>
			<td align="center"><?= $forum->updated_at?></td>
    	</tr>
<?php endforeach; ?>
</table>



<div align="center">
<?= LinkPager::widget(['pagination' => $pagination]) 
//pagination 自动换页?>
</div>
