<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Imprestrequest */

$this->title = $model->No_;
$this->params['breadcrumbs'][] = ['label' => 'Imprestrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imprestrequest-view">

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
            'Request Date',
            'Trip No',
            'Employee No',
            'Employee Name',
            'Trip Start Date',
            'Trip Expected End Date',
            'No_ of Days',
            'Global Dimension 1 Code',
            'No_ Series',
            'Deadline for Imprest Return',
            'Status',
            'Type',
            'User ID',
            'Bank Account',
            'Global Dimension 2 Code',
            'Transaction Type',
            'Customer A_C',
            'Country',
            'City',
            'Job Group',
            'Imprest_Advance No',
            'Posted',
            'Applies-to Doc_ No_',
            'Imprest Amount',
            'CBK Website Address',
            'Surrendered',
            'Receipt Created',
            'Cheque No',
            'Language Code',
            'Attachement',
            'External Application',
            'Employee_Commissioner',
            'Archived',
            'Select',
            'Recover from Payroll',
            'Transferred to Payroll',
            'Request Type',
            'Request No',
        ],
    ]) ?>

</div>
