<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Assignments */

$this->title = 'Create Assignments';
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>