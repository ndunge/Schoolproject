<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hostelcards';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hostelcard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hostelcard', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Hostel No',
            'Discription',
            'Asset No',
            'Space Per Room',
            // 'Cost Per Occupant',
            // 'Gender',
            // 'Location',
            // 'Programme',
            // 'Cost per Room',
            // 'Room Prefix',
            // 'Minimum Balance',
            // 'Starting No',
            // 'Total Rooms',
            // 'Building Contact',
            // 'Contact Phone',
            // 'Contact Email:email',
            // 'Contact Extension',
            // 'Contact Telephone',
            // 'Ownership',
            // 'Building Type',
            // 'Hostel Status',

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

