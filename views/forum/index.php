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
              <tr>
                <td>
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

        <div align="center">
            <?php echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
        ?>
</div>

    </div>

    <div class="am-u-sm-3 ">
        <?php //以下按钮可以对帖子进行分类显示 ?>
        <b>帖子分类</b><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'all'])?>"><button>全部</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'tucao'])?>"><button>吐槽灌水</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'tactic'])?>"><button>战术讨论</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'rule'])?>"><button>规则询问</button></a><br/>
        <a href="<?php echo Url::to(['forum/index','kinds'=>'bug'])?>"><button>平台报错</button></a><br/>
        <?php if (!Yii::$app->user->isGuest) { //如果没登陆就没有“与我相关按钮” ?>
            <a href="<?php echo Url::to(['forum/index','kinds'=>'myposts'])?>"><button>我发的帖子</button></a><br/>
            <a href="<?php echo Url::to(['forum/index','kinds'=>'myreplies'])?>"><button>我回的帖子</button></a><br/>
        <?php } ?>
        讲笑话或论坛守则<br/><br/>
        左边的前两个是<b>置顶</b>，现在设置是被点赞量最高的两个，什么按钮都不能控制它们<br/><br/>
        上面<b>“我发的文”</b>按钮是作者是自己的帖子<br/>
        <b>“我回的文”</b>是自己回复的帖子<br/><br/>
        啊对要注意一下<b>手机适配</b>的问题<br/><br/>
        <b>点赞</b>是进去帖子之后，点“赞”,这里弄了一个likehistory数据库点了以后插入对应的forumid和userid，
        点的时候用ajax调用controllers/changeLike.php查看数据库里面有没有这个数据<br/><br/>
        <b>删除</b>是点进每个帖子之后才能删除，在“发帖于”的右边写“删除键在这里，因为你是作者所以能看到”有点隐蔽＝ ＝，因为我前端实在不会搞；如果你是作者的话才会出现<br/><br/>
        然后<b>编辑</b>还是不要了吧，因为这样不太好。。如果发了什么不当的东西突然改掉了，
        之前下面回复的人就很傻逼。。然后如果要可以查看历史编辑记录的话我们这个论坛就就太复杂了。。。<br/>

    </div>

</div>



