<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Leaveapplication */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Leaveapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaveapplication-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Application No], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Application No], [
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
            'Application No',
            'Employee No',
            'Leave Code',
            'Days Applied',
            'Start Date',
            'End Date',
            'Application Date',
            'Approved Days',
            'Approved Start Date',
            'Verified By Manager',
            'Verification Date',
            'Leave Status',
            'Approved End Date',
            'Approval Date',
            'Comments',
            'Taken',
            'Acrued Days',
            'Over used Days',
            'Leave Allowance Payable',
            'Post',
            'days',
            'No_ series',
            'Leave balance',
            'Resumption Date',
            'Employee Name',
            'Status',
            'Leave Entitlment',
            'Duties Taken Over By',
            'Name',
            'Mobile No',
            'Balance brought forward',
            'Leave Earned to Date',
            'Maturity Date',
            'Date of Joining Company',
            'Fiscal Start Date',
            'No_ of Months Worked',
            'Annual Leave Entitlement Bal',
            'Department Code',
            'User ID',
            'Contract No_',
            'Directorate Code',
            'Department Name',
            'Directorate name',
            'AdvanceDays',
            'TodaysDate',
        ],
    ]) ?>

</div>
