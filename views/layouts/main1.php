<?php 
use yii\helpers\Url;
use app\assets\MyAppAsset2;
MyAppAsset2::register($this);

$this->title = 'Dashboard';

?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<div class="am-g">
  <div class=" am-u-sm-3 am-u-lg-2 admin-sidebar am-margin-left">
    <div>
      <img src="images/avatar.jpg" alt="..." class="am-img-thumbnail " width="200px" height="200px">
    </div>
    <div>
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo Url::toRoute('dashboard/index') ;?>"><span class="am-icon-user"></span>个人资料</a></li>
        <li><a href="<?php echo Url::toRoute('team/index') ;?>"><span class="am-icon-users"></span>战队之家</a></li>
        <li><a href="<?php echo Url::toRoute('online-compile/index') ;?>"><span class="am-icon-users"></span>代码提交</a></li>
        <li><a href="<?php echo Url::toRoute('supporting-files/index') ;?>"><span class="am-icon-folder-open"></span>资源下载</a></li>        <li class="am-disabled"><a href="#"><span class="am-icon-table"></span>更多功能</a></li>
      </ul>
    </div>
          <div class="am-panel am-panel-default">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span>动态</p>
          <p>这里放点新闻资讯</p>
        </div>
      </div>
    <br/>
    <br/>
    <br/>
    <br/>

  </div>
<div class="admin-content am-u-sm-8 am-u-lg-9 am-u-end">
  <?= $content ?>
</div>
</div>
<?php $this->endContent(); ?>