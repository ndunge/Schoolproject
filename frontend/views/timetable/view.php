<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Timetable */

$this->title = $model->Class;
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Class' => $model->Class, 'Day of Week' => $model->Day of Week, 'Exam' => $model->Exam, 'Lecture Room' => $model->Lecture Room, 'Period' => $model->Period, 'Programme' => $model->Programme, 'Released' => $model->Released, 'Semester' => $model->Semester, 'Stage' => $model->Stage, 'Unit' => $model->Unit, 'Unit Class' => $model->Unit Class], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Class' => $model->Class, 'Day of Week' => $model->Day of Week, 'Exam' => $model->Exam, 'Lecture Room' => $model->Lecture Room, 'Period' => $model->Period, 'Programme' => $model->Programme, 'Released' => $model->Released, 'Semester' => $model->Semester, 'Stage' => $model->Stage, 'Unit' => $model->Unit, 'Unit Class' => $model->Unit Class], [
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
            'Programme',
            'Stage',
            'Unit',
            'Semester',
            'Period',
            'Day of Week',
            'Lecture Room',
            'Class',
            'Unit Class',
            'Exam',
            'Released',
            'No_ Of Hours',
            'Lecturer',
            'Exam Date',
            'Full Time_Part Time:datetime',
            'Department',
            'Programme Option',
            'Room Type',
        ],
    ]) ?>

</div>
