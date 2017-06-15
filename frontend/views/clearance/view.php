<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Clearance */

$this->title = $model->No_;
$this->params['breadcrumbs'][] = ['label' => 'Clearances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->No_], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->No_], [
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
            'No_',
            'Date',
            'Date Completed',
            'Student No_',
            'Programme',
            'Remarks',
            'Library Clearance Remarks',
            'Library Clearance ID',
            'Library Clearance Date',
            'Library Clearance Time',
            'Sports Clearance Remarks',
            'Sports Clearance ID',
            'Sports Clearance Date',
            'Sports Clearance Time',
            'Finance Clearance Remarks',
            'Finance Clearance ID',
            'Finance Clearance Date',
            'Finance Clearance Time',
            'Faculty Clearance Remarks',
            'Faculty Clearance ID',
            'Faculty Clearance Date',
            'Faculty Clearance Time',
            'Status',
            'Student Signature',
            'Books Lost',
            'Library Amount',
            'Library Other Charges',
            'Fees Amount',
            'Library Cleared',
            'Sports Cleared',
            'Finance Cleared',
            'Faculty Cleared',
            'No_ Series',
        ],
    ]) ?>

</div>
