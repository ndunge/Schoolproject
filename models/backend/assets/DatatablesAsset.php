<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;


/**
 * Created by PhpStorm.
 * User: mike
 * Date: 27/06/16
 * Time: 12:20
 */

use yii\web\AssetBundle;


class DatatablesAsset extends AssetBundle
{
	public $sourcePath = '@bower/datatables.net';
	public $css = [
	];
	public $js = [
		'js/jquery.dataTables.min.js'
	];
	public $depends = [
		'yii\web\JqueryAsset'
	];
}