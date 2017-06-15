<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Appointments */

$this->title = $model->AppointmentID;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->AppointmentID], ['class' => 'button primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->AppointmentID], [
            'class' => 'button danger',
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
            'AppointmentID',
            'Student_No',
            'Student_Name',
            'Staff_ID',
            'Appointment_Date',
            'Creation_Date',
            'Subject',
            'Comments',
            'Appointment_Time',
        ],
    ]) ?>

</div>
