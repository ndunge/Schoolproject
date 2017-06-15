<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Clearanceentries */

$this->title = 'Update Clearanceentries: ' . $model->Clear By ID;
$this->params['breadcrumbs'][] = ['label' => 'Clearanceentries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Clear By ID, 'url' => ['view', 'Clear By ID' => $model->Clear By ID, 'Clearance Level Code' => $model->Clearance Level Code, 'Department' => $model->Department, 'Student ID' => $model->Student ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clearanceentries-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
