<?php 
use yii\helpers\Url;
use app\assets\MyAppAsset2;
MyAppAsset2::register($this);

$this->title = 'Dashboard';

?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="am-g am-cf">

<div class="am-u-lg-8 am-u-md-10 am-sm-12 am-u-md-centered am-u-lg-centered ">
  <?= $content ?>
</div>


</div>
<?php $this->endContent(); ?>