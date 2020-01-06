<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [     
        'css/libs/bootstrap.min.css',
        'css/libs/font-awesome.css',
        'css/app.css',
        'css/libs/_all-skins.css',
        'css/style.css',
        'css/libs/jquery-ui.css',
        'css/libs/tabduan.css',
        'css/fileinput.css',
        'css/lightbox.css',
        'froala_editor_3.0.6/css/froala_style.min.css',
        'froala_editor_3.0.6/css/froala_editor.pkgd.min.css',
    ];
    public $js = [
        'pdfjs/build/pdf.js',
        'js/libs/jquery.mark.min.js',
        'js/libs/jquery.mask.js',
        'js/libs/jquery.validate.min.js',
        'js/libs/bootstrap.min.js',
        'js/libs/jquery-ui.js',
        'js/app.js',
        'js/lightbox.js',       
        'js/libs/add-tr.js',
        'js/fileinput.js',
        'js/development/common.js',
        'froala_editor_3.0.6/js/froala_editor.pkgd.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];    
}
