<?php 
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;

//从上个界面传过来了$forum
//需要在database里面再建一个table，detailforum存一个大帖子下的回复，对应到$forum（大帖子）的id

$this->title = $forum->theme;
?>
<head>
<script>
function likefunc(forumid, userid){
    var dataString = 'forumid=' + forumid + '&userid=' + userid;
    $("#jindutiao").fadeIn(400).html('<i class="am-icon-spinner am-icon-spin" style="display: inline-block"></i>');
    $.ajax({
        type: "POST",
        url: "../controllers/changeLike.php",
        data: dataString,
        cache: false,
        success: function(result){
            if(result){
                var position=result.indexOf("||");
                var warningMessage=result.substring(0,position);
                if(warningMessage=='success'){
                    var successMessage=result.substring(position+2);
                    $("#jindutiao").html('&nbsp');
                    $("#likelike").html(successMessage);
                }else{
                    var errorMessage=result.substring(position+2);
                    $("#jindutiao").html(errorMessage);
                }
            }
        }
    });
}
</script>
</head>


<br/>
<br/>
<div class="am-g">
<div class="am-u-sm-8 am-u-md-8 am-u-lg-8">
    <section class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <span class="am-text-lg am-text-primary">话题： </span>
            <?=$forum->theme ?>&nbsp&nbsp
            <span class="am-text-lg am-text-warning">
                <?php if(!\Yii::$app->user->isGuest){ ?>
                  <a href="#" onclick=likefunc(<?= $forum->id ?>,<?= Yii::$app->user->identity->id ?>) > <i class="am-icon-thumbs-o-up"></i> </a>
                <?php }else { ?>
                  <i class="am-icon-thumbs-o-up"></i>
                <?php } ?>
            </span>
            <span id="likelike"><?=$forum->plike?></span>
            <span class="am-text-lg am-text-warning">
                <?php if(!\Yii::$app->user->isGuest){ ?>
                    <span id="jindutiao">&nbsp</span>
                <?php }else { ?>
                    <span>(登录才能点赞)</span>
                <?php } ?>
            </span>
        </div>
    </section>
<article class="am-comment-success">
<img src="images/star<? $user=User::findByUsername($forum->author);echo $user==null?1:$user->pic ?>.png" onerror="this.src='images/star4.png'" alt="" class="am-comment-avatar" width="48" height="48">

    <div class="am-comment-main">
  <header class="am-comment-hd">
     <div class="am-comment-meta">
        <a href="#" class="am-comment-author">
            <span class="am-text-lg am-text-success">
                <?=$forum->author?>
            </span>
        </a>
        &nbsp发帖于&nbsp<time><?=$forum->created_at ?></time>
        <?php if(!\Yii::$app->user->isGuest){ if (Yii::$app->user->identity->username===$forum->author) { ?>
            <span class="am-icon-trash-o">
            <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $forum->id], [
                'class' => '',
                'data' => [
                    'confirm' => Yii::t('app', '删去的帖子就像泼出去的水，再也回不来了，你确定要删除吗？'),
                    'method' => 'post',
                ],
            ]) ?>
            </span>
        <?php } } ?>
            
    </div>
  </header>
  <div class="am-comment-bd">
  	<p><?=$forum->content ?></p>
  </div>
</div>
<br/>
</article>


 <div class="am-panel am-panel-default">
      <div class="am-panel-hd am-cf" data-am-collapse="{target: '#collapse-panel-3'}">
        <span class="am-text-lg am-text-primary">评论：</span>
        <?=$forum->reply?>
        <span class="am-icon-chevron-down am-fr" ></span>
      </div>
      <div class="am-panel-bd am-collapse am-in am-cf" id="collapse-panel-3">
        <ul class="am-comments-list">
        <?php if(!$forum->reply==0): ?>
        <?php foreach ($detailforums as $detailforum): ?>
          <li id="<?=$detailforum->author?>" class="am-comment">
            <img src="images/star<? $user=User::findByUsername($detailforum->author);echo $user==null?1:$user->pic ?>.png"onerror="this.src='images/star4.png'" alt="" class="am-comment-avatar" width="48" height="48">
              <div class="am-comment-main">
              <header class="am-comment-hd">
                    <div class="am-comment-meta">
                        <a href="#" class="am-comment-author">
                            <span class="am-comment-author am-text-lg ">
                                <?=$detailforum->author?>
                            </span>
                        </a>&nbsp评论于&nbsp<time><?=$detailforum->created_at?></time>
                    </div>
               </header>
              <div class="am-comment-bd">
              		<p><?=$detailforum->reply?></p>
              </div>
            </div>
           <?php if(!\Yii::$app->user->isGuest&&\Yii::$app->user->identity->username===$detailforum->author):?>
           			<script type="text/javascript">
           					$('li#<?=$detailforum->author ?>').addClass('am-comment-flip am-comment-warning')
           													  .find('span').addClass('am-text-warning');
           				
           			</script>
           	<?php endif; ?>
          </li>
          
         <?php endforeach; ?>
         <?php else: ?>
          <p>这连一只会拉屎的鸟都没有，更别提评论了</p>
          <br/>
         <?php endif; ?>
        </ul>
     </div>
</div>




<?php if (!\Yii::$app->user->isGuest): ?>

<div class="am-container">
<h3>发表新评论</h3>
<?php
    $form = ActiveForm::begin([
        'id' => 'detail-forum-form',
        'options' => ['class' => 'am-form'],
        'fieldConfig' => [
            'template' => "{input}"        
        ],
    ]); 
?>
		
<?= $form->field($model, 'reply')->textarea(['rows' => 4])?>
<br/>
<?= Html::submitButton('submit', ['class' => 'am-btn am-btn-secondary am-btn-block', 'name' => 'submit-button']) ?>
<?php ActiveForm::end(); ?>
</div>
<?php endif; ?>
<br/>
</div>

<?php //热门讨论贴，现在是赞最多的前二个?>
<div class="am-u-sm-6 am-u-md-4 am-u-lg-4">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门讨论帖</div>
        <ul class="am-list blog-list">

            <?php foreach ($forums as $forum): ?>
                <li><a href="<?php echo Url::to(['forum/detail-forum','id'=>$forum->id])?>"><?= $forum->theme ?></a></li>
            <?php endforeach; ?>
        
        </ul>
        </section>
</div>
</div>













