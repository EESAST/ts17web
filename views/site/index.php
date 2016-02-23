<?php

/* @var $this yii\web\View */
$count=0;
$this->title = 'Eatting in Tsinghua';?>


<div class="get">
  <div class="am-g">
    <div class="am-u-lg">
      <h1 class="get-title"><?php echo $this->title;?> 队式开发大赛</h1>
      <p>
        <a href="#" class="am-btn am-btn-sm get-btn">获取更多信息？</a>
      </p>
    </div>
  </div>
</div>


<div class="detail">
  <div class="am-g am-container">
    <div class="am-u-lg-12">
      <h2 class="detail-h2">第17届队式程序开发大赛，有你精彩!</h2>

      <div class="am-g">
      <?php foreach ($news as $new){
        if($count ++ >3)break;
       ?>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">

          <h3>
            <?= "<span class='am-text-primary'>".$new->title."</span><br/><span class='am-text-xs'>".$new->addedby."<span class='am-text-xs'>更新于</span>".$new->addedat."</span>" ?>
          </h3>
          <p class="detail-p">
           <?= $new->text ?>
          </p>
        </div>
      <?php } ?>
      </div>
    </div>
  </div>
</div>

