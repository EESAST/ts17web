<?php
/* @var $this yii\web\View */
$this->title = 'Supporting-files';
function list_file($dir){
	$list=scandir($dir);
	foreach ($list as $file) {
		$file_url=$dir.'/'.$file;
		$update_time=filectime($file_url);
		$file_size=round(filesize($file_url)/1024);
		if(!is_dir($file_url))echo "<tr><td>$file</td><td>".date('M,d,Y G:i',$update_time)."</td><td>$file_size KB</td><td><a href='$file_url'><i class='am-icon-download'></i></a></td></tr>";
	}
}

use yii\helpers\Url;
?>
<div class="admin-content">

  <div class="am-cf am-padding">
    <br/>
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">资源下载</strong> 
    / <small>
    在文件使用过程中遇到bug请<a href="<?php echo Url::to(['forum/new-forum'])?>">通知向开发组相关人员</a>，文件最终解释权归第十七届队式程序开发组所有</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab1">选手包</a></li>
      <li><a href="#tab2">3D回放器</a></li>
      <li><a href="#tab3">游戏规则</a></li>
      <li><a href="#tab4">Sample Ai</a></li>
    </ul>
    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab1">
      	<div class="am-g">
      	<div class="am-u-lg-12 am-u-sm-12">
        <div class="am-g am-margin-top">
          	<table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th width="40%">文件名</th>
                <th width="30%">更新时间</th>
                <th width="15%">文件大小</th>
                <th width="15%">下载</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            	$dir="files/Package";
            	list_file($dir);				

            ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
      </div>


      <div class="am-tab-panel am-fade am-in" id="tab2">
      	<div class="am-g">
      	<div class="am-u-lg-12 am-u-sm-12">
        <div class="am-g am-margin-top">
          	<table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th width="40%">文件名</th>
                <th width="30%">更新时间</th>
                <th width="15%">文件大小</th>
                <th width="15%">下载</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            	$dir="files/player";
            	list_file($dir);				
            ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
      </div>
      <div class="am-tab-panel am-fade am-in" id="tab3">
      	<div class="am-g">
      	<div class="am-u-lg-12 am-u-sm-12">
        <div class="am-g am-margin-top">
          	<table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th width="40%">文件名</th>
                <th width="30%">更新时间</th>
                <th width="15%">文件大小</th>
                <th width="15%">下载</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            	$dir="files/Rules";
            	list_file($dir);				
            ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
      </div>
      <div class="am-tab-panel am-fade am-in" id="tab4">
      	<div class="am-g">
      	<div class="am-u-lg-12 am-u-sm-12">
        <div class="am-g am-margin-top">
          	<table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th width="40%">文件名</th>
                <th width="30%">更新时间</th>
                <th width="15%">文件大小</th>
                <th width="15%">下载</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            	$dir="files/SampleAi";
            	list_file($dir);				
            ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
