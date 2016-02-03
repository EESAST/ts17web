<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;

//从上个界面传过来了$forum
//需要在database里面再建一个table，detailforum存一个大帖子下的回复，对应到$forum（大帖子）的index

$this->title = $forum->theme;
?>
<br/>
<br/>
<div class="am-g">
<div class="am-u-sm-8">
    <section class="am-panel am-panel-default">
        <div class="am-panel-hd">
            <span class="am-text-lg am-text-warning">话题： </span>
            <?=$forum->theme ?>
            <span class="am-text-lg am-text-warning"><font align:"right">
                <a href="">赞:</a>
            </span>
            <?=$forum->like?>
        </div>
    </section>
<article class="am-comment-success">
<img src="images/avatar.jpg" alt="" class="am-comment-avatar" width="48" height="48">	
<div class="am-comment-main">
  <header class="am-comment-hd">
     <div class="am-comment-meta">
        <a href="#" class="am-comment-author">
            <span class="am-text-lg am-text-success">
                <?=$forum->author?>
            </span>
        </a>
        &nbsp发帖于&nbsp<time><?=$forum->created_at ?></time>
        <?php if (Yii::$app->user->identity->username===$forum->author) { ?>
            <span class="am-icon-trash-o">
            <?= Html::a(Yii::t('app', '删除键在这里，是作者才会出现'), ['delete', 'id' => $forum->index], [
                'class' => '',
                'data' => [
                    'confirm' => Yii::t('app', '删去的帖子就像泼出去的水，再也回不来了，你去定要删除吗？'),
                    'method' => 'post',
                ],
            ]) ?>
            </span>
        <?php } ?>
            
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
        <span class="am-text-lg am-text-warning">评论：</span>
        <?=$forum->reply?>
        <span class="am-icon-chevron-down am-fr" ></span>
      </div>
      <div class="am-panel-bd am-collapse am-in am-cf" id="collapse-panel-3">
        <ul class="am-comments-list">
        <?php if(!$forum->reply==0): ?>
        <?php foreach ($detailforums as $detailforum): ?>
          <li id="<?=$detailforum->author?>" class="am-comment">
            <a href="#"><img src="images/avatar.jpg" alt="" class="am-comment-avatar" width="48" height="48"></a>
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

<div class="site-forum">

<?php
    $form = ActiveForm::begin([
        'id' => 'detail-forum-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-11 am-form\">{input}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); 
?>
		
        <?= $form->field($model, 'reply')->textarea(['rows' => 4])?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('提交', ['class' => 'am-btn am-btn-secondary', 'name' => 'submit-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">
        
    </div>
</div>
<?php endif; ?>

</div>

<?php //热门讨论贴，现在是赞最多的前八个?>
<div class="am-u-sm-4 ">
      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门讨论帖</div>
        <ul class="am-list blog-list">

            <?php foreach ($forums as $forum): ?>
                <li><a href="<?php echo Url::to(['forum/detail-forum','id'=>$forum->index])?>"><?= $forum->theme ?></a></li>
            <?php endforeach; ?>

          <li><a href="#">点赞、评论其他人的帖子，@</a></li>
          <li><a href="#">到底写不写嘛</a></li>          
        </ul>
        </section>
</div>
</div>













