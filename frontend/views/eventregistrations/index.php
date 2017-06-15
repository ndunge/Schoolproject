<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Registrations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventregistrations-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event Registrations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Partcipant No',
            'Participant Name',
            'Event Registration No',
            'Event ID',
            'SessionID',
            'Description',

            // 'Attended',
            // 'Participant Type',
            // 'Partcipant No',
            // 'Participant Name',
            // 'Registration Date',
            // 'No_ Series',

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
