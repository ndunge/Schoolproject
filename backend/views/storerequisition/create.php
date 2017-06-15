<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Storerequisition */

$this->title = 'Create Store Requisition';
$this->params['breadcrumbs'][] = ['label' => 'Storerequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storerequisition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'nextstoreNo'=>$nextstoreNo,
        'employeeDetails' => $employeeDetails,
        'model2' => $model2,
        'json'=>$json,
        'items'=>$items,
        'accounts'=>$accounts,
    ]) ?>

</div>
