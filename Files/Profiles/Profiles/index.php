<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
        <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
        <li><a href="../">Home</a></li>
        <li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>

<div class="profiles-index">
    <p>
        <?= Html::a('Add User', ['create'], ['class' => 'button success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'timestamp',
            //'ProfileID',
            //'AccountTypeID',
            //'CustomerID',
            'Employee No',
             'names',
            // 'UserName',
            // 'Password',
            // 'Status',
            // 'IDNumber',
            // 'Locked',
            // 'FailedAttempts',
            // 'Reset',
            // 'CreatedDate',
            // 'ChangeLogUserID',
            // 'ChangeLogDateTime',
            // 'ReferenceNo',
            // 'Salt',
            'Email',
            [
                    'attribute'=>'Task_Title',
                    'format'=>'raw',
                    'value' => function($data)
                    {
                        return
                        Html::a('Update', ['profiles/update','id'=> $data['Employee No']], ['title' => 'View','class'=>'']);
                    }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<div class="profiles-index">
<div class="pure-u-1"></div>
