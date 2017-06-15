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
 * Date: 27/06/16
 * Time: 12:20
 */

use yii\web\AssetBundle;


class DatatablesAsset extends AssetBundle
{
	public $sourcePath = '@bower/datatables.net';
	public $css = [
	 'datatables.net-bs/css/dataTables.bootstrap.min.css',
      //  'datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
	];
	public $js = [
		'js/jquery.dataTables.min.js',
		'datatables.net-buttons/js/dataTables.buttons.min.js',
		//'datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
        'datatables.net-buttons/js/buttons.print.min.js',
        'datatables.net-buttons/js/buttons.html5.min.js',
        'datatables.net-buttons/js/buttons.flash.min.js',
	];
	public $depends = [
		'yii\web\JqueryAsset'
	];
}