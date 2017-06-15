<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Dimensionvalue;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religions;
use common\models\Stream;
use common\models\Studentprogramme;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}
$ProfileID = $identity->ProfileID;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */
/* @var $form yii\widgets\ActiveForm */
if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['Reg_ Transacton ID'];

?>
<script>
	var serverurl = 'http://localhost/ritman/frontend/web/';
	function populate_option(ElementName, Value, obj)
	{ 
		var x = document.getElementById(ElementName);
		for (i = 1; i < obj.length; i++) 
		{	
			xid = obj[i].sID;
			xname = obj[i].sName;
			var option = document.createElement('option');
			option.text = obj[i].sName;
			option.value = obj[i].sID;
			
			if (Value == obj[i].sID)
			{
				option.selected = true;
			}
			x.add(option);
		}		
	}
	
	function fetch_data(url,mydata)
	{	
		access_token = '';
		UserID = localStorage.getItem("UserID");
		var obj = [];
		jQuery.ajax( {
			url: serverurl+url,
			type: 'GET',
			dataType: "json",
			data: { 'UserID': UserID },
			beforeSend : function( xhr ) 
			{
				xhr.setRequestHeader( "Authorization", access_token );
			},
			success: function( response ) 
			{
				// response
				mydata(response);		
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) 
			{ 
				var rest = '{ "name": "Success", "message" : "Validated", "code": "00", "status": 200}';			
				obj = JSON.parse(rest);
				//mydata(obj);
			} 
		});	
	}
	
	function loadsemester()
	{
		var Programme = document.getElementById('Programme').value;
		var AcademicYear = document.getElementById('Academic Year').value;
		var Semester = document.getElementById('Semester').value;
		if (Programme != '') 
		{
			var url = '/courseregistration/getsemester?Programme='+Programme;
			fetch_data(url,function(response) 
			{
				populate_option("Semester", "0", response);
				var url = '/courseregistration/getstage?Programme='+Programme;
				fetch_data(url,function(response1) 
				{
					populate_option("Stage", "0", response1);
				});
			});
		}
	}
	
	function loadstream()
	{
		var Programme = document.getElementById('Programme').value;
		var AcademicYear = document.getElementById('Academic Year').value;
		var Semester = document.getElementById('Semester').value;
		var Stage = document.getElementById('Stage').value;

		if ((Programme != '') && (AcademicYear != '') && (Semester != '') && (Stage != ''))
		{
			var url = '/courseregistration/getstream?Programme='+Programme+'&AcademicYear='+AcademicYear+'&Semester='+Semester+'&Stage='+Stage;
			fetch_data(url,function(response) 
			{
				populate_option("Student Stream", "0", response);
			});
		}
	}
</script>
<div id="msg" style="color:#F00"><?php echo $msg; ?></div>
<form id="data_form" method="POST" action="<?= $url; ?>">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td>
			<label>Programme <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Programme"  id="Programme" class="input-control full-size" onchange="loadsemester()">
					<option value="0" selected="selected"></option>
					<?php 
					//$result = Studentprogramme::find()->asArray()->where("[ProfileID] = '$ProfileID'")->orderBy('Name')->all(); 
					$result = Dimensionvalue::find()->asArray()->where("[Student Programme] = 1")->orderBy('Name')->all();                   
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Name"];
						if ($model->Programme==$s_id) 
						{
							$selected = 'selected="selected"';
						} else
						{
							$selected = '';
						}												
						?>
						<option value="<?php echo $s_id; ?>" <?php echo $selected; ?>><?php echo $s_name; ?></option>
						<?php 
					}  ?>                        
				</select>
			</div>
		</td>
		<td>
			<label>Accademic Year <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Academic Year"  id="Academic Year" class="input-control full-size" onchange="loadstream()">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Academicyear::find()->asArray()->orderBy('Description')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Description"];
						if ($model['Academic Year']==$s_id) 
						{
							$selected = 'selected="selected"';
						} else
						{
							$selected = '';
						}												
						?>
						<option value="<?php echo $s_id; ?>" <?php echo $selected; ?>><?php echo $s_name; ?></option>
						<?php 
					}  ?>                        
				</select>
			</div>
		</td>	
	</tr>
	<tr>
		<td>
			<label>Semester <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Semester"  id="Semester" class="input-control full-size" onchange="loadstream()">
					<option value="0" selected="selected"></option>                       
				</select>
			</div>
		</td>
		<td>
			<label>Stage <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Stage"  id="Stage" class="input-control full-size" onchange="loadstream()">
					<option value="0" selected="selected"></option>                        
				</select>
			</div>
		</td>	
	</tr>	
	<tr>
		<td width="50%">
			<label>Steam <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Student Stream"  id="Student Stream" class="input-control full-size">
					<option value="0" selected="selected"></option>
				</select>
			</div>
		</td>
		<td width="50%"></td>
	</tr>						
	</table>
	<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
</form>
<div class="pure-u-1"></div>