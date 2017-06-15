<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Residentialestates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residentialestates-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Residentialestates', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'timestamp',
            'Code',
            'Description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'class' => 'dataTable striped border hovered bordered',
            'data-role' => 'datatable',
            'data-searching' => 'false',
            'data-paging' => 'false',
            'data-ordering' => 'false',
            'data-info' => 'false'
        ],
        'pager' => [
            'maxButtonCount' => 10,

            // Customzing options for pager container tag
            'options' => [
                'class' => 'pagination'
            ],

            // Customzing CSS class for pager link
            'activePageCssClass' => 'item current',
            'disabledPageCssClass' => 'item disabled',
            'pageCssClass' => 'item',

            // Customzing CSS class for navigating link
            'prevPageCssClass' => 'item',
            'nextPageCssClass' => 'item',
            'firstPageCssClass' => 'item',
            'lastPageCssClass' => 'item'
        ],
    ]); ?>
</div>
