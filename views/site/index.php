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
<div class="am-container">
<div class="am-g">
    <div class="am-u-lg-4">
      <pre>
        class demo{
          private $_username;
          function static hello(){
            alert("welcome come to stellar craft");
          }
          function static getWinner(){
            echo $this->_username;
          } 
        }
      </pre>
    </div>
    <div class="am-u-lg-4">
      <pre>
        class demo{
          private $_username;
          function static hello(){
            alert("welcome come to stellar craft");
          }
          function static getWinner(){
            echo $this->_username;
          } 
        }
      </pre>
    </div>
    <div class="am-u-lg-4">
      <pre>
        class demo{
          private $_username;
          function static hello(){
            alert("welcome come to stellar craft");
          }
          function static getWinner(){
            echo $this->_username;
          } 
        }
      </pre>
    </div>
</div>
</div>



<br/>
<br/>
  <div class="am-container"><div class="am-modal-dialog am-cf">
    <div class="am-modal-bd">
      <div class="am-g">
      <?php foreach ($news as $new){
        if($count ++ >3)break;
       ?>
        <div class="am-u-lg-3 am-u-md-6 am-u-sm-12 detail-mb">

          <h3>
            <?= "<span class='am-text-default'>".$new->title."</span><br/><span class='am-text-xs'>".$new->addedby."<span class='am-text-xs'>更新于</span>".$new->addedat."</span>" ?>
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