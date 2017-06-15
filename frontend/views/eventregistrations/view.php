<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Eventregistrations */

$this->title = $model->Event Registration No;
$this->params['breadcrumbs'][] = ['label' => 'Eventregistrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventregistrations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Event Registration No], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Event Registration No], [
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
            'Event Registration No',
            'Event ID',
            'SessionID',
            'Description',
            'Attended',
            'Participant Type',
            'Partcipant No',
            'Participant Name',
            'Registration Date',
            'No_ Series',
        ],
    ]) ?>

</div>
