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
<h2 align="center">
在这里，你可以找到值得信赖的队友，挑战一波又一波比赛，享受3D回放带来的快感，与其他选手对抗。
<br/><br/>在这无垠的太空中，正义还是邪恶、征服还是被征服，一切掌握在你的手中，开启属于你的队式十七吧！
</h2>
<br/>
<br/>
</div>
</div>


<div class="am-container"><div class="am-modal-dialog am-cf">
    <div class="am-modal-bd">
      <div class="am-g">
      <?php foreach ($news as $new){ ?>
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


  <br/>
  <br/>

<div class="am-container">
<div class="am-g">
    <div class="am-u-lg-4">
      
        茫茫宇宙，万古洪荒。

        星球，这一古老而神秘的存在形式，以生活在银河系旋臂某一不知名偏远角落的碳基生命无法理解的方式生存着，进行最原始的厮杀，争夺荒芜宇宙稀缺的物质与能量。在这惊心动魄的战斗中，弱小的生命渐渐走向消亡，强大的生命存活下来，继续这诅咒的轮回。

      
    </div>
    <div class="am-u-lg-4">
      智慧的基因一旦出现，就如同恒星终结时的闪光一般传播到宇宙的各个角落。

第一缕智慧之光照射到这个荒芜的角落，已经是17年前的事情了。这17年里，星球的战争方式发生了翻天覆地的变化。他们从简单的物质集合体进化出了意识。弱小的个体开始聚集起来，共谋生存。某种最为简单原始却可靠的远距通信方式也出现在一些最具智慧的个体之间。

    </div>
    <div class="am-u-lg-4">
      尽管相隔13亿光年的茫茫时空，人类对星球原始智慧的存在却并非毫无察觉。在来自深空的引力波信号中，他们解码出了一些特殊的信号。虽然大多数人对此一无所知，然而研究者们很清楚这个不能公开的发现到底隐含着什么意义。

对人类创造的智力游戏的征服只是第一步。只有足够强大的AI才能超越人类的存在，穿越近乎无穷的空间与这些原始的生命建立联系。

    </div>
</div>
</div>



<br/>
<br/>