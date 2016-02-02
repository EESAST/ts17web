<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Forum';

?>
<a href="<?php echo Url::toRoute('forum/new-forum') ;?>"><button class="am-btn am-btn-primary am-btn-block"><br/><span class="am-text-lg"><i class="am-icon-th-large"></i>发帖</span><br/><br/></button></a>
<hr data-am-widget="divider" class="am-divider am-divider-default" />
<div class="am-g">
    <div class="am-u-sm-9">
        <table class="am-table am-table-striped am-table-hover table-main">
            <button class="am-btn am-btn-default am-btn-block"><span class="am-text-lg">全部帖子</span></button>
            <thead>
              <tr>
                <th width="10%"><?php echo $sort->link('kinds')?></th>
                <th width="21%"><?php echo $sort->link('theme')?></th>
                <th width="10%"><?php echo $sort->link('author')?></th>
                <th width="7%"><?php echo $sort->link('reply')?></th>
                <th width="7%"><?php echo $sort->link('like')?></th>
                <th width="20%"><?php echo $sort->link('updated_at')?></th>
                <th width="14%" ><a href="#" class="am-disabled">操作</a></th>
              </tr>
          </thead>
          <tbody>

            <?php //以下代码置顶3个浏览量最高的 ?>
            <?php foreach ($topquery as $top): ?>
              <tr>
                <td>
                    置顶
                </td>
                <td>
                    <i class='am-icon-book'></i>
                    <a href="<?php echo Url::to(['forum/detail-forum','id'=>$top->index])?>">
                        <?= $top->theme ?>
                    </a>
                </td>
                <td><?= $top->author?></td>
                <td><?= $top->reply?></td>
                <td><?= $top->like?></td>
                <td><?= $top->updated_at?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-disabled"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only am-disabled"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; //以上代码置顶3个浏览量最高的 ?>


            <?php foreach ($forums as $forum): //以下代码显示全部的帖子?>
              <tr>
                <td >
                    <?php if ($forum->kinds==='tucao') {?>
                        [吐槽灌水]
                    <?php }elseif ($forum->kinds==='tactic') { ?>
                        [战术讨论]
                    <?php }elseif ($forum->kinds==='rule') { ?>
                        [规则询问]
                    <?php }elseif ($forum->kinds==='bug') { ?>
                        [平台报错]
                    <?php } ?>
                </td>
                <td>
                    <i class='am-icon-book'></i>
                    <a href="<?php echo Url::to(['forum/detail-forum','id'=>$forum->index])?>">
                        <?= $forum->theme ?>
                    </a>
                </td>
                <td><?= $forum->author?></td>
                <td><?= $forum->reply?></td>
                <td><?= $forum->like?></td>
                <td><?= $forum->updated_at?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-disabled">
                            <span class="am-icon-pencil-square-o"></span> 编辑
                        </button>
                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only am-disabled">
                            <span class="am-icon-trash-o"></span> 删除
                        </button>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; //以上代码显示全部的帖子?>
            </tbody>
        </table>
        <br/>
    </div>

    <div class="am-u-sm-3 ">
        <?php //以下按钮可以对帖子进行分类显示 ?>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'all'])?>"><button>全部</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'tucao'])?>"><button>吐槽灌水</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'tactic'])?>"><button>战术讨论</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'rule'])?>"><button>规则询问</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'bug'])?>"><button>平台报错</button></a><br/>
        <?php if (!Yii::$app->user->isGuest) { //如果没登陆就没有“与我相关按钮” ?>
            <a href="<?php echo Url::to(['forum/index','kinds'=>'aboutme'])?>"><button>与我相关</button></a><br/>
        <?php } ?>
        讲笑话或论坛守则<br/><br/>
        左边的前两个是置顶，现在设置是被点赞量最高的两个，什么按钮都不能控制它们<br/><br/>
        上面“与我相关”按钮包括了作者是自己还有自己回复的帖子，作者是自己的会显示在前面<br/><br/>
        啊对要注意一下手机适配的问题<br/><br/>
        删除是点进每个帖子之后才能删除<br/><br/>

    </div>

</div>

<div align="center">
    <?php echo LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
</div>

