<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hostelledgers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hostelledger-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hostelledger', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Space No',
            'Room No',
            'Hostel No',
            'No',
            // 'Status',
            // 'Room Cost',
            // 'Student No',
            // 'Receipt No',
            // 'Booked',
            // 'Items Assigned',
            // 'Date Assigned',
            // 'Items Returned',
            // 'Date Returned',

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
