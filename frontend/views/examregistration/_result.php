<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 10/08/2016
 * Time: 16:53
 */

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Examregistration */

//DatatablesAsset::register($this);

$this->title = 'Transcript';
$this->params['breadcrumbs'][] = $this->title;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="3">
    <tr>
        <td>
            <label>Student Name</label>
            <div class="input-control text full-size">
                <input type="text" value="<?= $model['Student Name']; ?>" disabled>
            </div>
        </td>
        <td>
            <label>Academic Year</label>
            <div class="input-control text full-size">
                <input type="text" value="<?= $model['Academic Year']; ?>" disabled>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <label>Semester</label>
            <div class="input-control text full-size">
                <input type="text" value="<?= $model['Term ID']; ?>" disabled>
            </div>
        </td>
        <td>
            <label>Stage</label>
            <div class="input-control text full-size">
                <input type="text" value="<?= $model['Stage ID']; ?>" disabled>
            </div>
        </td>
    </tr>
</table>
<section class="transcript-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
				'showOnEmpty' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'width:3%']
            ],
            [
                'label' => 'Programme Course',
                'attribute' => 'ProgrammeCourseID',
            ],
            [
                'header' => '<div style="text-align: right">Class Work</div>',
                'attribute' => 'Cat Marks',
                'format' => ['decimal', 2],
                'contentOptions' => ['style' => 'text-align: right; width:15%'],
            ],
            [
                'header' => '<div style="text-align: right">Term Exam</div>',
                'attribute' => 'Exam Marks',
                'format' => ['decimal', 2],
                'contentOptions' => ['style' => 'text-align: right; width:15%']
            ],
            [
                'header' => '<div style="text-align: right">Total Score</div>',
                'attribute' => 'Total',
                'format' => ['decimal', 2],
                'contentOptions' => ['style' => 'text-align: right; width:15%']
            ],
            [
                'header' => '<div style="text-align: right">Grade</div>',
                'attribute' => 'Grade',
                'format' => ['decimal', 2],
                'contentOptions' => ['style' => 'text-align: right; width:15%']
            ]
           
        ],
        'tableOptions' => [
            'class' => 'dataTable striped border hovered bordered',
            'data-role' => 'datatable',
            'data-searching' => 'false',
            'data-paging' => 'false',
            'data-ordering' => 'false',
            'data-info' => 'false'
        ]


       
    ]); ?>
    <br>
    <br>
    <br>

    <div>
        <p> GPA is <?= $GPA ?> </p>
    </div>
</section>
