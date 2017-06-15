<?php

use common\models\Examregistration;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use frontend\assets\DatatablesAsset;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Examregistration */
/* @var $listAcademicYear common\models\Examregistration */
/* @var $listSemester common\models\Examregistration */

DatatablesAsset::register($this);

$this->title = 'Transcript';
$this->params['breadcrumbs'][] = $this->title;
$csrfToken = Yii::$app->request->getCsrfToken();
$urlActionResult = Url::to(['/examregistration/result']);

print_r()

$jsRenderResult = <<<JS

    $('#session-dropdown').change(function () {
        $.ajax({
            url: '$urlActionResult',
            type: 'post',
            data: {
                academicYear: $("#academic-dropdown").val(),
                semester: $("#session-dropdown").val(),
                _csrf: '$csrfToken'
            },
           beforeSend: function () {
               $('#transcript-grid').empty();
               $('#render-image').show(
                   "<img src='images/ajax-loader.gif' align='center'  style='height: 100px;width: 100px;'/> loading..."
               );
           },
            complete: function (data) {
                $('#render-image').hide();
                console.log(data.responseText)
            },
            success: function (data) {
                $('#transcript-grid').append(data);
                
            }
        });
    });
JS;

$this->registerJs($jsRenderResult, View::POS_READY);
?>
<script type="text/javascript">
    $(document).ready(function() {
     $('#DataTables_Table_1').DataTable( {
            dom: 'Bfrtip',
            paging:false,
            bFilter: false,
            bSort: false,
            bSearchable:false,
            bInfo:false,
            buttons: [
                {
                    extend: 'csv',
                    text: 'Save CSV',
                    
                },
                {
                    extend: 'excel',
                    text: 'Save Excel',
                    orientation: 'landscape',
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 9; //<-- set fontsize to 16 instead of 10
                    }
                },
                {
                    extend: 'pdf',
                    text: 'Save PDF',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    },
                    header: true,
                    orientation: 'landscape',
                    customize: function(doc) {
                        doc.defaultStyle.fontSize = 9; //<-- set fontsize to 16 instead of 10
                    }
                },
                {
                    extend: 'print',
                    text: 'Print License',
                    orientation: 'landscape',
                },
                'copy',
            ],
            "oLanguage": {
                "sEmptyTable": "No Clearances are required for your selection."

            },
        } );

} );
</script>
<?php $form = ActiveForm::begin(['id' => 'transcript-form']); ?>
<h4>Please select an Academic Year followed by Semester</h4>

<table width="100%" border="0" cellspacing="0" cellpadding="3" >
    <tbody>
    <tr>
        <td width="50%">
            <label>Academic Year<span style="color:#F00">*</span></label>

            <?= Html::dropDownList(null, null, $listAcademicYear,
                [
                    'id' => 'academic-dropdown',
                    'prompt' => 'Academic Year',
                    'class' => 'input-control text full-size button',
										'placeholder' => 'Select an Academic Year'
                ]) ?>
        </td>
        <td width="50%">
            <label>Semester<span style="color:#F00">*</span></label>
            <?= $form->field($model, 'Remarks')
                ->widget(DepDrop::classname(), [
                    'options' => [
                        'id' => 'session-dropdown',
                        'class' => 'input-control text full-size button',
                        'placeholder' => 'Select a Session ...'
                    ],
                    'pluginOptions' => [
                        'depends' => ['academic-dropdown'],
                        'url' => Url::to(['/examregistration/depsemester'])
                    ]
                ])->label(''); ?>
        </td>
    </tr>
    </tbody>
</table>
<?php ActiveForm::end(); ?>
<hr style="margin-top: 0;">
<section id="transcript-grid" >
    <div id="render-image">

    </div>
</section>


