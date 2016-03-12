<?php

/* @var $this yii\web\View */
$count=0;
use yii\helpers\Url;
$this->title = 'Eatting in Tsinghua'; 
?>
<style type="text/css">


    .detail {
      background: #fff;
    }
    .detail-h2 {
      text-align: center;
      font-size: 250%;
      color: white;
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
    .gray{
      background-color: gray;
    }
</style>
<div id="pic" style="background-color: #0e90d2; width: 100%;">

<img src="images/word.png"  style="width:100%;margin-top: 4%;margin-bottom:4%" class="am-animation-scale-up am-animation-fade" />
<img src="images/star1.png" style="width:10%; margin-top:-3%; margin-left: 10%;margin-bottom: 10%" class="am-animation-slide-top" />
<img src="images/star2.png" style="width:10%; margin-top:1%; margin-left: 4%; margin-bottom: 10%" class="am-animation-slide-top"/>
<img src="images/star3.png" style="width:10%; margin-top:-4%; margin-left: 4%; margin-bottom: 10%"class="am-animation-slide-top" />
<img src="images/star4.png" style="width:10%; margin-top:4%; margin-left: 4%; margin-bottom: 10%" class="am-animation-slide-top"/>
<img src="images/star5.png" style="width:10%; margin-top:1%; margin-left: 4%; margin-bottom: 10%" class="am-animation-slide-top"/>
<img src="images/star6.png" style="width:10%; margin-top:-3%; margin-left: 4%; margin-bottom: 10%" class="am-animation-slide-top"/>

</div>

<br/>
<br/>

<div class="am-g" style="width:80%;">
<h3 align="center">
在这里，你可以找到值得信赖的队友，挑战一波又一波比赛，享受3D回放带来的快感，与其他选手对抗。
<br/><br/>在这无垠的太空中，正义还是邪恶、征服还是被征服，一切掌握在你的手中，开启属于你的队式十七吧！
<br/><br/><br/>
</h3>

<hr/>

<div class="am-container"><div class="am-modal-dialog am-cf">
    <div class="am-modal-bd">
      <div class="am-g">
      <?php foreach ($news as $new)if(++$count<5){  ?>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">

          <h3>
            <?= "<span class='am-text-default'>".$new->title."<br/></span><br/><span class='am-text-xs'>"."<span class='am-text-xs'>更新于</span>".$new->addedat."</span>" ?>
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


</div>
<br/>



  <br/>
  <br/>