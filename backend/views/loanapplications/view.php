<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Loanapplications */

$this->title = $model->Loan No;
$this->params['breadcrumbs'][] = ['label' => 'Loanapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loanapplications-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Loan No' => $model->Loan No, 'Loan Product Type' => $model->Loan Product Type], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Loan No' => $model->Loan No, 'Loan Product Type' => $model->Loan Product Type], [
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
            'Loan No',
            'Loan Product Type',
            'Application Date',
            'Amount Requested',
            'Approved Amount',
            'Loan Status',
            'Issued Date',
            'Instalment',
            'Repayment',
            'Flat Rate Principal',
            'Flat Rate Interest',
            'Interest Rate',
            'No Series',
            'Interest Calculation Method',
            'Employee No',
            'Employee Name',
            'Payroll Group',
            'Description',
            'Opening Loan',
            'Interest',
            'Interest Imported',
            'principal imported',
            'Interest Rate Per',
            'Reference No',
            'Interest Deduction Code',
            'Deduction Code',
            'Debtors Code',
            'External Document No',
            'HELB No_',
            'University Name',
            'Stop Loan',
            'Select',
            'StopagePeriod',
            'Reason',
        ],
    ]) ?>

</div>
