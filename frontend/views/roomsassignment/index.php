<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms Assignments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roomsassignment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Roomsassignment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'timestamp',
            'Code',
            'Room No',
            'Remarks',
            'Customer',
            // 'Room Type',
            // 'Rate',
            // 'Billed',
            // 'Billed Date',
            // 'Room Status',
            // 'Booked Date',
            // 'Check Out Date',
            // 'Pax',
            // 'Total Amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
       'tableOptions' => [
            'class' => 'dataTable striped border hovered bordered',
            'data-role' => 'datatable',
            'data-searching' => 'true',
            'data-paging' => 'true',
            'data-ordering' => 'false',
            'data-info' => 'false'
        ],
    ]); ?>
</div>

