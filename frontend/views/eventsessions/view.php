<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Eventsession */

$this->title = $model->Event ID;
$this->params['breadcrumbs'][] = ['label' => 'Eventsessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventsession-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Event ID' => $model->Event ID, 'Line No_' => $model->Line No_], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Event ID' => $model->Event ID, 'Line No_' => $model->Line No_], [
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
            'Event ID',
            'Line No_',
            'StartTime',
            'EndTime',
            'Venue',
            'FacilitatorType',
            'Facilitator',
            'No_ Series',
            'Base Calendar',
            'Date',
            'Description',
        ],
    ]) ?>

</div>
