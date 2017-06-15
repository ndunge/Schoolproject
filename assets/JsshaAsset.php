<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 08/07/2016
 * Time: 09:21
 */

use yii\web\AssetBundle;


class JsshaAsset extends AssetBundle
{
	public $sourcePath = '@npm/jssha';
	public $js = [
		'src/sha3.js'
	];
}