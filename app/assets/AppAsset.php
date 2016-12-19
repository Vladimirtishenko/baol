<?php
namespace app\assets;

class AppAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@app/media';
    public $css = [
        'build/build.app.css',
    ];
    public $js = [
        'build/build.app.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
    }
}
