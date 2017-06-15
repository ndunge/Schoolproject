<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

/**
 * Created by PhpStorm.
 * User: mike
 * Date: 23/06/16
 * Time: 12:00
 */

use yii\web\AssetBundle;

class MetrouiAsset extends AssetBundle
{
	public $sourcePath = '@bower/metro/build';
	public $css = [
		'css/metro.min.css',
		'css/metro-responsive.min.css',
		'css/metro-icons.min.css'
	];
	public $js = [
		'js/metro.min.js'
	];
	public $depends = [
		'yii\web\JqueryAsset'
	];
}