<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Timetable */

$this->title = 'Update Timetable: ' . $model->Class;
$this->params['breadcrumbs'][] = ['label' => 'Timetables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Class, 'url' => ['view', 'Class' => $model->Class, 'Day of Week' => $model->Day of Week, 'Exam' => $model->Exam, 'Lecture Room' => $model->Lecture Room, 'Period' => $model->Period, 'Programme' => $model->Programme, 'Released' => $model->Released, 'Semester' => $model->Semester, 'Stage' => $model->Stage, 'Unit' => $model->Unit, 'Unit Class' => $model->Unit Class]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timetable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
