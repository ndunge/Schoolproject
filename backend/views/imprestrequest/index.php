<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imprest Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imprestrequest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Imprest Request', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'No_',
            'Request Date',
            'Trip No',
            'Employee No',
            // 'Employee Name',
            // 'Trip Start Date',
            // 'Trip Expected End Date',
            // 'No_ of Days',
            // 'Global Dimension 1 Code',
            // 'No_ Series',
            // 'Deadline for Imprest Return',
            // 'Status',
            // 'Type',
            // 'User ID',
            // 'Bank Account',
            // 'Global Dimension 2 Code',
            // 'Transaction Type',
            // 'Customer A_C',
            // 'Country',
            // 'City',
            // 'Job Group',
            // 'Imprest_Advance No',
            // 'Posted',
            // 'Applies-to Doc_ No_',
            // 'Imprest Amount',
            // 'CBK Website Address',
            // 'Surrendered',
            // 'Receipt Created',
            // 'Cheque No',
            // 'Language Code',
            // 'Attachement',
            // 'External Application',
            // 'Employee_Commissioner',
            // 'Archived',
            // 'Select',
            // 'Recover from Payroll',
            // 'Transferred to Payroll',
            // 'Request Type',
            // 'Request No',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
