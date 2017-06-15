<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Semester',
            'Unit',
            'Lecture Room',
            'Day of Week',
            'No_ Of Hours',
            'Date',
            'StartTime',
            'EndTime',
            'Lecturer',


            // 'Period',
            // 'Day of Week',
            // 'Lecture Room',
            // 'Class',
            // 'Unit Class',
            // 'Exam',
            // 'Released',
            // 'No_ Of Hours',
            // 'Lecturer',
            // 'Exam Date',
            // 'Full Time_Part Time:datetime',
            // 'Department',
            // 'Programme Option',
            // 'Room Type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'class' => 'dataTable striped border hovered bordered',
            'data-role' => 'datatable',
            'data-searching' => 'true',
            'data-paging' => 'false',
            'data-ordering' => 'false',
            'data-info' => 'false'
        ],
    ]); ?>
</div>
