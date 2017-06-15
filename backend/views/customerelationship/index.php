<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer Relationships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customerelationship-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CaseID',
            

            [
                'label' => 'CategoryID',
                'format' => 'raw',                
                'value' => function ($dataProvider) {
                    // print_r($dataProvider);
                    return $dataProvider->category->Label;
                 },
            ],

            'Description:ntext',
            'Suggestion',

[
                
                'format' => 'raw',                
                'value' => function ($dataProvider)     {
                    $CaseID = $dataProvider['CaseID'];
                     return Html::a('view', "customerelationship/view?id=$CaseID");
                 },
            ],

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
