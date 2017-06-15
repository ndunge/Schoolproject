<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hostelledger */

$this->title = $model->Hostel No;
$this->params['breadcrumbs'][] = ['label' => 'Hostelledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hostelledger-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Hostel No' => $model->Hostel No, 'Room No' => $model->Room No, 'Space No' => $model->Space No], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Hostel No' => $model->Hostel No, 'Room No' => $model->Room No, 'Space No' => $model->Space No], [
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
            'Space No',
            'Room No',
            'Hostel No',
            'No',
            'Status',
            'Room Cost',
            'Student No',
            'Receipt No',
            'Booked',
            'Items Assigned',
            'Date Assigned',
            'Items Returned',
            'Date Returned',
        ],
    ]) ?>

</div>
