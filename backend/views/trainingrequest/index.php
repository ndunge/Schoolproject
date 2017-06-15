<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Training Requests';

?>
<div class="trainingrequest-index">
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
        <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
        <li><a href="../">Home</a></li>
        <li><?= $this->title; ?></li>
</ul>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Training Request', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Request No_',
            'Request Date',
            'Employee No',
            'Employee Name',
            // 'No_ Series',
            // 'Department Code',
            // 'Status',
            // 'Designation',
            // 'Period',
            // 'No_ Of Days',
            // 'Training Insitution',
            // 'Venue',
            // 'Tuition Fee',
            // 'Per Diem',
            // 'Air Ticket',
            // 'Total Cost',
            // 'Course Title',
            // 'Description',
            // 'Planned Start Date',
            // 'Planned End Date',
            // 'Country Code',
            // 'CBK Website Address',
            // 'Exchange Rate',
            // 'Total Cost (LCY)',
            // 'Currency',
            // 'GL Account',
            // 'Budget Name',
            // 'Available Funds',
            // 'Need Source',
            // 'Training Objective',
            // 'User ID',
            // 'Commisioner No',
            // 'Commissioner Name',
            // 'Commissioner',
            // 'Source of Funding',
            // 'Variance',
            // 'Group or Individual',
            // 'Sessions',
            // 'Remarks',
            // 'Local or Abroad',
            // 'Directorate',
            // 'Department Name',
            // 'Directorate Name',
            // 'Period End Date',
            // 'Reimbursible Interest',
            // 'Date of Travel',
            // 'Return Date',
            // 'Requires Flight',
            // 'Travel Documents Fees',
            // 'Per Diem Days',
            // 'Destination',
            // 'Requires LPO',
            // 'Language Code(Default)',
            // 'Attachment',
            // 'Finance Notified',
            // 'Procurement Notified',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
