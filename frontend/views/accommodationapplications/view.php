<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Accommodationapplications */

$this->title = $model->No_;
$this->params['breadcrumbs'][] = ['label' => 'Accommodationapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodationapplications-view">

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
            'Space Allocated',
            'Room Applied',
            'Academic Year',
            'Academic Session',
            'Block No',
            'Student No_',
            'Allocated',
            'Room Allocated',
            'Status',
            'Rejected Reason',
            'Posted',
            'Billed',
            'Billing Date',
            'Billed By',
            'Student Gender',
        ],
    ]) ?>

</div>
