<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

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
		//'css/site.css',
		'metro/css/metro.css',
		'metro/css/kra.css',
		'metro/css/cards.css',
		'metro/css/metro-schemes.css',
		'metro/css/metro-responsive.css',
		'metro/css/metro-icons.css',
		'metro/css/pure-min.css',
		'metro/css/grids-responsive-min.css',
		'css/mysite.css'
	];
	public $js = [
	];
	public $depends = [
		//'yii\web\YiiAsset',
		//'yii\bootstrap\BootstrapAsset',
	];
}
