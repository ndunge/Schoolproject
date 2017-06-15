<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clearances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Initiate Clearance ', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'No_',
            'Date',
            'Date Completed',
            'Student No_',
            // 'Programme',
            // 'Remarks',
            // 'Library Clearance Remarks',
            // 'Library Clearance ID',
            // 'Library Clearance Date',
            // 'Library Clearance Time',
            // 'Sports Clearance Remarks',
            // 'Sports Clearance ID',
            // 'Sports Clearance Date',
            // 'Sports Clearance Time',
            // 'Finance Clearance Remarks',
            // 'Finance Clearance ID',
            // 'Finance Clearance Date',
            // 'Finance Clearance Time',
            // 'Faculty Clearance Remarks',
            // 'Faculty Clearance ID',
            // 'Faculty Clearance Date',
            // 'Faculty Clearance Time',
            // 'Status',
            // 'Student Signature',
            // 'Books Lost',
            // 'Library Amount',
            // 'Library Other Charges',
            // 'Fees Amount',
            // 'Library Cleared',
            // 'Sports Cleared',
            // 'Finance Cleared',
            // 'Faculty Cleared',
            // 'No_ Series',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
