<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Leave Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaveapplication-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Leave Application', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Application No',
            'Employee No',
            'Leave Code',
            'Days Applied',
            // 'Start Date',
            // 'End Date',
            // 'Application Date',
            // 'Approved Days',
            // 'Approved Start Date',
            // 'Verified By Manager',
            // 'Verification Date',
            // 'Leave Status',
            // 'Approved End Date',
            // 'Approval Date',
            // 'Comments',
            // 'Taken',
            // 'Acrued Days',
            // 'Over used Days',
            // 'Leave Allowance Payable',
            // 'Post',
            // 'days',
            // 'No_ series',
            // 'Leave balance',
            // 'Resumption Date',
            // 'Employee Name',
            // 'Status',
            // 'Leave Entitlment',
            // 'Duties Taken Over By',
            // 'Name',
            // 'Mobile No',
            // 'Balance brought forward',
            // 'Leave Earned to Date',
            // 'Maturity Date',
            // 'Date of Joining Company',
            // 'Fiscal Start Date',
            // 'No_ of Months Worked',
            // 'Annual Leave Entitlement Bal',
            // 'Department Code',
            // 'User ID',
            // 'Contract No_',
            // 'Directorate Code',
            // 'Department Name',
            // 'Directorate name',
            // 'AdvanceDays',
            // 'TodaysDate',

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
