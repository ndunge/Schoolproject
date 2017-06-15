<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Roomsassignment */

$this->title = $model->Code;
$this->params['breadcrumbs'][] = ['label' => 'Roomsassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roomsassignment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Code], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'timestamp',
            'Code',
            'Room No',
            'Remarks',
            'Customer',
            'Room Type',
            'Rate',
            'Billed',
            'Billed Date',
            'Room Status',
            'Booked Date',
            'Check Out Date',
            'Pax',
            'Total Amount',
        ],
    ]) ?>

</div>
