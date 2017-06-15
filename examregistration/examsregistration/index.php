<?php

use yii\helpers\Html;
use yii\grid\GridView;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}

if (!isset($msg)) { $msg = '';}

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Exams';
?> 
<script>
	$(function() 
	{
		var dataSet = <?php echo $json; ?>;
		$('#dataTables-1').dataTable( 
			{
				"bProcessing": true,
				"data": dataSet,
				"columnDefs": [
					{
						"targets": [ 0, 1],
						"visible": false,
						"searchable": false
					},
				]
                                           
			} 
		);	
		$('#dataTables-1 tbody').on( 'click', 'tr', function () 
			{
				var data = $('#dataTables-1').DataTable().row(this).data();
				//console.log(data)
				var ProgrammeID = data[0];
				var TermID		= data[1];
				var ProgrammeCourseID		= data[2];
				var StageID		= data[3];
				//var AcademicYear= data[3];
				//var ExamTypeID	= data[4];
						
				location.href = '<?= $baseUrl; ?>/examregistration/view?'+ encodeURI('ProgrammeID='+ProgrammeID+
								'&TermID='+TermID+
								'&ProgrammeCourseID='+ProgrammeCourseID+
																		'&StageID='+StageID);
																		//'&AcademicYear='+AcademicYear+
																		//'&ExamTypeID='+ExamTypeID);
			} 
		);									
	});
</script>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>
            <table class="table striped hovered" id="dataTables-1">
                <thead>
                  <tr>
					  <th class="text-left"><a href="<?= $baseUrl;?>/courseregistration/create">New</a></th>
                    <th colspan="5" class="text-center" style="color:#F00"><?php echo $msg; ?></th>
                  </tr>
                <tr>					
					<th class="text-left" width="0%">&nbsp;</th>
					<th class="text-left" width="10%">&nbsp;</th>
					<th class="text-left" width="10%">Unit</th>					
					<th class="text-left" >Stage</th>
					<th class="text-left" width="20%">Programme</th>
					<th class="text-left" width="20%">Unit Name</th>
                </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>
					<th colspan="6">&nbsp;</th>
                </tr>
                </tfoot>
            </table>
<div class="pure-u-1"></div>
<div class="pure-u-1"></div>
