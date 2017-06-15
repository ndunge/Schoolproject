<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clearancelevels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearancelevel-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clearancelevel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'Clearance Level Code',
            'Sequence',
            'Status',
            'Standard',
            // 'Priority Level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
