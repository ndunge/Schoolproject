<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Appointment', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'AppointmentID',
            'Student_No',
            'Student_Name',
            
            // 'Appointment_Date',
            // 'Creation_date',
            // 'Subject',
            // 'Comments',
            // 'Appointment_Time',

            ['class' => 'yii\grid\ActionColumn'],
            [
                
                'format' => 'raw',                
                'value' => function ($dataProvider)     {
                    $AppointmentNo = $dataProvider['AppointmentID'];
                     return Html::a('view', "appointments/view?id=$AppointmentNo");
                 },
            ]
       
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
