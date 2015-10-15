<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;
use yii\web\AssetBundle;

class MyAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'AmazeUI-2.4.2/assets/css/amazeui.css',
         "AmazeUI-2.4.2/assets/css/app.css",
    ];
    public $js = [
        "AmazeUI-2.4.2/assets/js/jquery.min.js",
        'AmazeUI-2.4.2/assets/js/amazeui.min.js',
    ];
    public $depends = [
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
?>