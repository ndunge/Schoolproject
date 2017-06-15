<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accommodation Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodationapplications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Accommodation Applications', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'No_',
            'Space Allocated',
            'Room Applied',
            'Academic Year',
            // 'Academic Session',
            // 'Block No',
            // 'Student No_',
            // 'Allocated',
            // 'Room Allocated',
            // 'Status',
            // 'Rejected Reason',
            // 'Posted',
            // 'Billed',
            // 'Billing Date',
            // 'Billed By',
            // 'Student Gender',

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
