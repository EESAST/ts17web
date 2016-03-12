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
<div class="am-cf">

<table>




</table>

    <ul>
      <li>
        头像：<img src="touxiang/".<?=$model->username?>.".png" onerror="this.src='images/star4.png'" width="100" height="100" >&nbsp&nbsp
        <button>更换头像</button>

      </li>
      <li>用户名：<?=$model->username?>&nbsp&nbsp&nbsp
          <a href="<?php echo Url::to(['dashboard/verifyoldpwd'])?>">
            <button>修改密码</button>
          </a>
      </li>
      <li>邮箱：<?=$model->email?></li>
      <li>真实姓名：<?=$model->realname?></li>
      <li>学校：<?=$model->school?></li>
      <li>班级：<?=$model->class?></li>
      <li>学生证号：<?=$model->studentnumber?></li>
    </ul>
</div>
  <!-- content end -->
</div>