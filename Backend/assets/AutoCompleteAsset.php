<?php
namespace app\assets;
use yii\web\AssetBundle;

class AutocompleteAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /**
     * @inheritdoc
     */
    public $css = [
        'css/libs/jquery-ui.css',
    ];
    /**
     * @inheritdoc
     */
    public $js = [
        'js/libs/jquery-ui.js',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
