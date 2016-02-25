<?php

/* @var $this yii\web\View */
$count=0;
use yii\helpers\Url;
$this->title = 'Eatting in Tsinghua';?>
<style type="text/css">


    .detail {
      background: #fff;
    }

    .detail-h2 {
      text-align: center;
      font-size: 150%;
      margin: 40px 0;
    }
    .detail-h3 {
      color: #1f8dd6;
    }

    .detail-p {
      color: #7f8c8d;
    }

    .detail-mb {
      margin-bottom: 30px;
    }
</style>


<img src="images/trythis.jpg" style="width: 100%">

<div class="" style="background-color: #00B2e0">
  <div class="am-g am-container">
    <div class="am-u-lg-12">
      <h2 class="detail-h2">第17届队式程序开发大赛，有你精彩!</h2>
    </div>
  </div>
</div>
<br/>
<br/>

<div class="am-container">
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