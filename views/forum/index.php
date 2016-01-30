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
                <th class="table-title" width="30%"><?php echo $sort->link('theme')?></th>
                <th class="table-auther" width="10%"><?php echo $sort->link('author')?></th>
                <th class="table-date" width="9%"><?php echo $sort->link('reply')?></th>
                <th class="table-date" width="20%"><?php echo $sort->link('updated_at')?></th>
                <th class="table-set" width="20%" ><a href="#" class="am-disabled">操作</a></th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($forums as $forum): ?>
              <tr>
                <td >
                    <i class='am-icon-book'></i>
                    <a href="<?php echo Url::to(['forum/detail-forum','id'=>$forum->index])?>" >
                    <?= $forum->theme?>
                    </a>
                </td>
                <td><?= $forum->author?></td>
                <td><?= $forum->reply?></td>
                <td><?= $forum->updated_at?></td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button class="am-btn am-btn-default am-btn-xs am-text-secondary am-disabled"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only am-disabled"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
           </tbody>
        </table>
        <br/>
        <br/>
        <br/>
    </div>




    <div class="am-u-sm-3 ">
        要不这里讲笑话？或者写论坛守则2333<br/><br/>
        主要是整个页面都搞论坛页面不好看<br/>
        <br/>
        然后你们后端貌似没有实现分页功能，所以前端也先不写了哈……

    </div>

</div>


