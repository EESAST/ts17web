<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Forum';

?>
<a href="<?php echo Url::toRoute('forum/new-forum') ;?>"><button class="am-btn am-btn-primary am-btn-block"><br/><span class="am-text-lg"><i class="am-icon-hand-pointer-o"></i>点我发帖</span><br/><br/></button></a>
<hr data-am-widget="divider" class="am-divider am-divider-default" />
<div class="am-g">
    <div class="am-u-sm-9">
        <table class="am-table am-table-striped am-table-hover table-main">
            <button class="am-btn am-btn-default am-btn-block"><span class="am-text-lg">全部帖子</span></button>
            <thead>
              <tr>
                <th width="10%"><?php echo $sort->link('kinds')?></th>
                <th width="25%"><?php echo $sort->link('theme')?></th>
                <th width="15%"><?php echo $sort->link('author')?></th>
                <th width="9%"><?php echo $sort->link('reply')?></th>
                <th width="10%"><?php echo $sort->link('plike')?></th>
                <th width="20%"><?php echo $sort->link('updated_at')?></th>
              </tr>
          </thead>
          <tbody>

            <?php //以下代码置顶3个浏览量最高的 ?>
            <?php foreach ($topquery as $top): ?>
              <tr class="am-primary">
                <td >
                    置顶
                </td>
                <td>
                    <i class='am-icon-book'></i>
                    <a href="<?php echo Url::to(['forum/detail-forum','id'=>$top->id])?>">
                        <?= $top->theme ?>
                    </a>
                </td>
                <td><?= $top->author?></td>
                <td><?= $top->reply?></td>
                <td><?= $top->plike?></td>
                <td><?= $top->updated_at?></td>
              </tr>
            <?php endforeach; //以上代码置顶3个浏览量最高的 ?>


            <?php foreach ($forums as $forum): //以下代码显示全部的帖子?>
              <tr>
                <td >
                    <?php if ($forum->kinds==='tucao') {?>
                        吐槽灌水
                    <?php }elseif ($forum->kinds==='tactic') { ?>
                        战术讨论
                    <?php }elseif ($forum->kinds==='rule') { ?>
                        规则询问
                    <?php }elseif ($forum->kinds==='bug') { ?>
                        平台报错
                    <?php } ?>
                </td>
                <td>
                    <i class='am-icon-book'></i>
                    <a href="<?php echo Url::to(['forum/detail-forum','id'=>$forum->id])?>">
                        <?= $forum->theme ?>
                    </a>
                </td>
                <td><?= $forum->author?></td>
                <td><?= $forum->reply?></td>
                <td><?= $forum->plike?></td>
                <td><?= $forum->updated_at?></td>
              </tr>
            <?php endforeach; //以上代码显示全部的帖子?>
            </tbody>
        </table>
        <br/>

        <div align="right">
            <?php echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>
</div>

    </div>

    <div class="am-u-sm-3 ">
        <?php //以下按钮可以对帖子进行分类显示 ?>
		<section class="am-panel am-panel-default">
  			<header class="am-panel-hd">
    			<h3 class="am-panel-title">帖子分类</h3>
  			</header>
  			<div class="am-panel-bd">
  				<ul class="am-list">
    			<li><a href="<?php echo Url::to(['forum/index','kinds'=>'all'])?>">全部</a></li>
        		<li><a href="<?php echo Url::to(['forum/index','kinds'=>'tucao'])?>">吐槽灌水</a></li>
        		<li><a href="<?php echo Url::to(['forum/index','kinds'=>'tactic'])?>">战术讨论</a></li>
        		<li><a href="<?php echo Url::to(['forum/index','kinds'=>'rule'])?>">规则询问</a></li>
        		<li><a href="<?php echo Url::to(['forum/index','kinds'=>'bug'])?>">平台报错</a></li>
        		<?php if (!Yii::$app->user->isGuest) { //如果没登陆就没有“与我相关按钮” ?>
            		<li><a href="<?php echo Url::to(['forum/index','kinds'=>'myposts'])?>">我发的帖子</a></li>
            		<li><a href="<?php echo Url::to(['forum/index','kinds'=>'myreplies'])?>">我回的帖子</a></li>
        		<?php } ?>
        		</ul>
  			</div>
		</section>
		<section class="am-panel am-panel-default">
  			<header class="am-panel-hd">
    			<h3 class="am-panel-title">队式动态</h3>
  			</header>
  			<div class="am-panel-bd">
  				<strong><?= $new->title ?></strong>
          <p><?= $new->text ?></p>
  			</div>
		</section>
    </div>

</div>



