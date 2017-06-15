<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Requisitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchaserequisition-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Purchase Requisition', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showOnEmpty' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'No_',
            'Employee Code',
            'Employee Name',
            'Reason',
            'Requisition Date',
            

            // 'Requisition Date',
            // 'Status',
            // 'Raised by',
            // 'No_ Series',
            // 'Purchase?',
            // 'MA Approval',
            // 'Rejected',
            // 'Process Type',
            // 'Global Dimension 1 Code',
            // 'Ordered',
            // 'User',
            // 'Global Dimension 2 Code',
            // 'Global Dimension 3 Code',
            // 'Procurement Plan',
            // 'Purchaser Code',
            // 'Document Type',
            // 'Currency Code',
            // 'Date of Use',
            // 'Requisition Type',
            // 'Posted',
            // 'Global Dimension 4 Code',
            // 'Purchase Type',
            // 'Language Code (Default)',
            // 'Attachment',
            // 'Posted By',
            // 'Date Posted',
            // 'Issued',
            // 'Issued By',
            // 'Received',
            // 'Received By',
            // 'Date Issued',
            // 'Date Received',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'class' => 'dataTable striped border hovered bordered',
            'data-role' => 'datatable',
            'data-searching' => 'true',
            'data-paging' => 'true',
            'data-ordering' => 'false',
            'data-info' => 'false'
        ],
    ]); ?>
</div>
