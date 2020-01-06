<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.css',
        'css/material-design-iconic-font.css',
        'css/style_portal.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/sign-up.js',
        'js/jquery.validate.js',
        'js/common.js',
        'js/devoops.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
