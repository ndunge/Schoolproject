<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Messagetemplates;
$baseUrl = Yii::$app->request->baseUrl;
$msg ='';

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notification Templates';
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
				var MessageTemplateID = data[0]; 
						
				location.href = '<?= $baseUrl; ?>/messagetemplates/view?id='+MessageTemplateID;
			} 
		);									
	});
</script>
<ul class="breadcrumbs no-padding-top no-padding-bottom">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>  
<?= Html::a('New', ['create'], ['class' => 'button primary']) ?>
            <table class="table striped hovered" id="dataTables-1">
                <thead>
                <tr>
					<th class="text-left" width="6%">&nbsp;</th>
					<th class="text-left" width="15%">Code</th>
                    <th class="text-left">Notification Name</th>
					<th class="text-left" width="6%">Allow Email</th>
					<th class="text-left" width="6%">Allow SMS</th>
                </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>
					<th class="text-left">&nbsp;</th>
					<th class="text-left">&nbsp;</th>
                    <th class="text-left">Notification Name</th>
					<th class="text-left">&nbsp;</th>
					<th class="text-left">&nbsp;</th>
                </tr>
                </tfoot>
            </table>
<div class="pure-u-1"></div> 
