<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Purchaserequisition */

$this->title = 'Update Purchaserequisition: ' . $model->No_;
$this->params['breadcrumbs'][] = ['label' => 'Purchaserequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->No_, 'url' => ['view', 'id' => $model->No_]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="purchaserequisition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
