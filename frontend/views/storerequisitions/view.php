<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Storerequisitions */

$this->title = $model->No_;
$this->params['breadcrumbs'][] = ['label' => 'Storerequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storerequisitions-view">

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
            'Employee Code',
            'Employee Name',
            'Reason',
            'Requisition Date',
            'Status',
            'Raised by',
            'No_ Series',
            'Purchase?',
            'MA Approval',
            'Rejected',
            'Process Type',
            'Global Dimension 1 Code',
            'Ordered',
            'User',
            'Global Dimension 2 Code',
            'Global Dimension 3 Code',
            'Procurement Plan',
            'Purchaser Code',
            'Document Type',
            'Currency Code',
            'Date of Use',
            'Requisition Type',
            'Posted',
            'Global Dimension 4 Code',
            'Purchase Type',
            'Language Code (Default)',
            'Attachment',
            'Posted By',
            'Date Posted',
            'Issued',
            'Issued By',
            'Received',
            'Received By',
            'Date Issued',
            'Date Received',
        ],
    ]) ?>

</div>
