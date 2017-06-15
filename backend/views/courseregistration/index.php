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

$this->title = 'Student';
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
$(function()
{
	var dataSet = <?php echo $json; ?>;
	$('#dataTables-1').dataTable(
		{
			"bProcessing": true,
			"data": dataSet,

		}
	);
	$('#dataTables-1 tbody').on( 'click', 'tr', function ()
	{
		var data = $('#dataTables-1').DataTable().row(this).data();
		var No = data[0];

		location.href = '<?= $baseUrl; ?>/courseregistration/view?id='+No;
	}
);
});
</script>
<div class="pure-u-1"></div>
<table class="table striped hovered" id="dataTables-1">
	<thead>
		<tr>
			<th class="text-left" width="10%">Ref. No.</th>
			<th class="text-left" >Programme</th>
			<th class="text-left" width="15%">Stage</th>
			<th class="text-left" width="15%">Semester</th>
			<th class="text-left" width="15%">Academic Year</th>
			<th class="text-left" width="10%">Stream</th>
			<th class="text-left" width="15%">Date Registered</th>
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
