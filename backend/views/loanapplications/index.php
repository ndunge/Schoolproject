<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loan Applications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loanapplications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Loan Applications', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Loan No',
            'Loan Product Type',
            'Application Date',
            'Amount Requested',
            // 'Approved Amount',
            // 'Loan Status',
            // 'Issued Date',
            // 'Instalment',
            // 'Repayment',
            // 'Flat Rate Principal',
            // 'Flat Rate Interest',
            // 'Interest Rate',
            // 'No Series',
            // 'Interest Calculation Method',
            // 'Employee No',
            // 'Employee Name',
            // 'Payroll Group',
            // 'Description',
            // 'Opening Loan',
            // 'Interest',
            // 'Interest Imported',
            // 'principal imported',
            // 'Interest Rate Per',
            // 'Reference No',
            // 'Interest Deduction Code',
            // 'Deduction Code',
            // 'Debtors Code',
            // 'External Document No',
            // 'HELB No_',
            // 'University Name',
            // 'Stop Loan',
            // 'Select',
            // 'StopagePeriod',
            // 'Reason',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
