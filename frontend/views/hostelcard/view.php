<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Hostelcard */

$this->title = $model->Hostel No;
$this->params['breadcrumbs'][] = ['label' => 'Hostelcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hostelcard-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Hostel No], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Hostel No], [
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
            'Hostel No',
            'Discription',
            'Asset No',
            'Space Per Room',
            'Cost Per Occupant',
            'Gender',
            'Location',
            'Programme',
            'Cost per Room',
            'Room Prefix',
            'Minimum Balance',
            'Starting No',
            'Total Rooms',
            'Building Contact',
            'Contact Phone',
            'Contact Email:email',
            'Contact Extension',
            'Contact Telephone',
            'Ownership',
            'Building Type',
            'Hostel Status',
        ],
    ]) ?>

</div>
