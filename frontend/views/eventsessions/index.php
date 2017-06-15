<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventsession-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            
            'Venue',
            'Description',
             
[
                'label' => 'Start Time',
                'attribute' => 'StartTime',
                'format' => ['date', 'php:d/m/y h:i'],
            ],
             
[
                'label' => 'End Time',
                'attribute' => 'EndTime',
                'format' => ['date', 'php:d/m/y h:i'],
            ],
            // 'Venue',
            // 'FacilitatorType',
            // 'Facilitator',
            // 'No_ Series',
            // 'Base Calendar',
            // 'Date',
            // 'Description',

            //['class' => 'yii\grid\ActionColumn'],
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
