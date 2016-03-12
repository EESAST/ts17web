<?php 
use app\doc\widgets\myActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<br/>
<div>
    <br/>
    <div class="am-fl"><strong class="am-text-primary am-text-lg">个人资料</strong> / <small>Personal information</small></div>

    <br/>
</div>
<br/>
<div class="am-g">
    <div class="am-u-sm-8 am-u-lg-8">
        <div class="am-input-group am-input-group-primary">
            <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="姓名： ".$model->username ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-secondary">
            <span class="am-input-group-label"><i class="am-icon-envelope am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="邮箱： ".$model->email ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-success">
            <span class="am-input-group-label"><i class="am-icon-user am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="真实姓名：".$model->realname ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-warning">
            <span class="am-input-group-label"><i class="am-icon-graduation-cap am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="学校：".$model->school ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-danger">
            <span class="am-input-group-label"><i class="am-icon-users am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="班级： ".$model->email ?>">
        </div>
        <br/>
        <div class="am-input-group am-input-group-danger">
            <span class="am-input-group-label"><i class="am-icon-tag am-icon-fw"></i></span>
            <input type="text" class="am-form-field" disabled="disabled" value="<?="学生证号： ".$model->studentnumber ?>">
        </div>
        <br/>

        <a class="am-link-muted" href="<?php echo Url::to(['dashboard/verifyoldpwd'])?>">
            <button id="button1" class="am-btn am-btn-default am-btn-block">修改密码</button>
        </a>
    </div>
    <div class="am-u-sm-4 am-u-lg-4">
        <div style="width:120px;border: grey 1px solid;padding-top: 10px;">
        <img class="am-center" src="images/star<?=$model->pic ?>.png" width="100" height="100" style="padding: 5px;">
        <button
            type="button"
            id="button2"
            class="am-btn am-btn-default am-btn-block"
            data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 400, height: 225}">
            更换头像
        </button>
        </div>
        <script>
            $("#button1").hover(function(){$(this).addClass("am-btn-primary")});
            $("#button1").mouseleave(function(){$(this).removeClass("am-btn-primary")});
            $("#button2").hover(function(){$(this).addClass("am-btn-primary")});
            $("#button2").mouseleave(function(){$(this).removeClass("am-btn-primary")});
        </script>
    </div>
</div>
<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">更换头像
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd">
            <div class="am-g">
                <div id="pic1" class="am-u-lg-2"><img src="images/star1.png" style="width: 120%"/></div>
                <div id="pic2" class="am-u-lg-2"><img src="images/star2.png" style="width: 120%"/></div>
                <div id="pic3" class="am-u-lg-2"><img src="images/star3.png" style="width: 120%"/></div>
                <div id="pic4" class="am-u-lg-2"><img src="images/star4.png" style="width: 140%"/></div>
                <div id="pic5" class="am-u-lg-2"><img src="images/star5.png" style="width: 120%"/></div>
                <div id="pic6" class="am-u-lg-2"><img src="images/star6.png" style="width: 150%"/></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("img").click(function(){
            var a=$(this).parent().attr("id");

            var b= "<input value=" +a+ " name='data'>";
            var temp = document.createElement("form");
            temp.action = "<?= Url::to(['dashboard/resetpic']) ?>";
            temp.method = "post";

            temp.appendChild(b);
            //document.body.appendChild(temp);
            alert(123);
            temp.submit();

            $("#doc-modal-1").modal('close');
            return temp;


        });
    });


</script>