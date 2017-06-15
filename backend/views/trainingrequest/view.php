<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Trainingrequest */

$this->title = $model->Request No_;
$this->params['breadcrumbs'][] = ['label' => 'Trainingrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingrequest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Request No_], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Request No_], [
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
            'Request No_',
            'Request Date',
            'Employee No',
            'Employee Name',
            'No_ Series',
            'Department Code',
            'Status',
            'Designation',
            'Period',
            'No_ Of Days',
            'Training Insitution',
            'Venue',
            'Tuition Fee',
            'Per Diem',
            'Air Ticket',
            'Total Cost',
            'Course Title',
            'Description',
            'Planned Start Date',
            'Planned End Date',
            'Country Code',
            'CBK Website Address',
            'Exchange Rate',
            'Total Cost (LCY)',
            'Currency',
            'GL Account',
            'Budget Name',
            'Available Funds',
            'Need Source',
            'Training Objective',
            'User ID',
            'Commisioner No',
            'Commissioner Name',
            'Commissioner',
            'Source of Funding',
            'Variance',
            'Group or Individual',
            'Sessions',
            'Remarks',
            'Local or Abroad',
            'Directorate',
            'Department Name',
            'Directorate Name',
            'Period End Date',
            'Reimbursible Interest',
            'Date of Travel',
            'Return Date',
            'Requires Flight',
            'Travel Documents Fees',
            'Per Diem Days',
            'Destination',
            'Requires LPO',
            'Language Code(Default)',
            'Attachment',
            'Finance Notified',
            'Procurement Notified',
        ],
    ]) ?>

</div>
