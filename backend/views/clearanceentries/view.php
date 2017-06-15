<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$baseUrl = Yii::$app->request->baseUrl;

/* @var $this yii\web\View */
/* @var $model common\models\Clearanceentries */

$this->title = $model['Clear By ID'];
$this->params['breadcrumbs'][] = ['label' => 'Clearanceentries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearanceentries-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Clear By ID' => $model['Clear By ID'], 'Clearance Level Code' => $model['Clearance Level Code'], 'Department' => $model->Department, 'Student ID' => $model['Student ID']], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'Clear By ID' => $model['Clear By ID'], 'Clearance Level Code' => $model['Clearance Level Code'], 'Department' => $model->Department, 'Student ID' => $model['Student ID'] ], [
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
            'Clearance Level Code',
            'Department',
            'Student ID',
            'Clear By ID',
            'Initiated By',
            'Initiated Date',
            'Initiated Time',
            'Last Date Modified',
            'Last Time Modified',
            'Student Intake',
            'Cleared',
            'Priority Level',
            'Academic Year',
            'Semester',
            'Status',
        ],
    ]) ?>

</div>
