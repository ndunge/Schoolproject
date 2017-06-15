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

$this->title = 'Submission';
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
					"targets": [ 0 ],
					"visible": false,
					"searchable": false
				},
				]
                                           
			} 
		);	
		$('#dataTables-1 tbody').on( 'click', 'tr', function () 
			{
				var data = $('#dataTables-1').DataTable().row(this).data();
				var AssignmentID = data[0];
						
				location.href = '<?= $baseUrl; ?>/submission/view?'+ encodeURI('id='+AssignmentID);
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
                    <th class="text-left" width="0%">&nbsp;</th>
					<th class="text-left" width="15%">Unit</th>
					<th class="text-left" >Title</th>					
					<th class="text-left" width="20%">Due Date</th>
                    <th class="text-left" width="15%">Status</th>
                    <th class="text-left" width="20%">Submission Date</th>
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