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
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['AssignmentID'];

?>
<script>
	var serverurl = 'http://localhost:8080/ritman/frontend/web';
	function populate_option(ElementName, Value, obj)
	{ 
		var x = document.getElementById(ElementName);
		for (i = 1; i < obj.length; i++) 
		{	
			xid = obj[i].sID;
			xname = obj[i].sName;
			var option = document.createElement('option');
			option.text = xname;
			option.value = xid;
			
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
		var Programme = document.getElementById('ProgrammeID').value;
		if (Programme != '') 
		{
			var url = '/courseregistration/getsemester?Programme='+Programme;
			fetch_data(url,function(response) 
			{
				populate_option("TermID", "0", response);
				var url = '/courseregistration/getstage?Programme='+Programme;
				fetch_data(url,function(response1) 
				{
					populate_option("StageID", "0", response1);
				});
			});
		}
	}
	
	function loadstream()
	{
		var Programme = document.getElementById('ProgrammeID').value;
		var AcademicYear = document.getElementById('AcademicYear').value;
		var Semester = document.getElementById('TermID').value;
		var Stage = document.getElementById('StageID').value;

		if ((Programme != '') && (AcademicYear != '') && (Semester != '') && (Stage != ''))
		{
			var url = '/courseregistration/getstream?Programme='+Programme+'&AcademicYear='+AcademicYear+'&Semester='+Semester+'&Stage='+Stage;
			fetch_data(url,function(response) 
			{
				populate_option("Student Stream", "0", response);
			});
		}
	}
    
    function loadcourse()
	{
		var Programme = document.getElementById('ProgrammeID').value;
		var AcademicYear = document.getElementById('AcademicYear').value;
		var Semester = document.getElementById('TermID').value;
		var Stage = document.getElementById('StageID').value;

		if ((Programme != '') && (AcademicYear != '') && (Semester != '') && (Stage != ''))
		{
			var url = '/courseregistration/getcourse?Programme='+Programme+'&AcademicYear='+AcademicYear+'&Semester='+Semester+'&Stage='+Stage;
			fetch_data(url,function(response) 
			{
				populate_option("CourseCode", "0", response);
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
				<select name="ProgrammeID"  id="ProgrammeID" class="input-control full-size" onchange="loadsemester()">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Dimensionvalue::find()->asArray()->where("[Student Programme] = 1")->orderBy('Name')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Name"];
						if ($model->ProgrammeID==$s_id) 
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
				<select name="AcademicYear"  id="AcademicYear" class="input-control full-size" onchange="loadcourse()">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Academicyear::find()->asArray()->orderBy('Description')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Description"];
						if ($model['AcademicYear']==$s_id) 
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
				<select name="TermID"  id="TermID" class="input-control full-size" onchange="loadcourse()">
					<option value="0" selected="selected"></option>                       
				</select>
			</div>
		</td>
		<td>
			<label>Stage <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="StageID"  id="StageID" class="input-control full-size" onchange="loadcourse()">
					<option value="0" selected="selected"></option>                        
				</select>
			</div>
		</td>	
	</tr>	
	<tr>
		<td width="50%">
			<label>Unit <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="CourseCode"  id="CourseCode" class="input-control full-size">
					<option value="0" selected="selected"></option>
				</select>
			</div>
		</td>
		<td width="50%">

        </td>
	</tr>
	<tr>
		<td width="50%">
            <label>Assignment Title <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Title" type="text" id="Title" value="<?= $model['Title']; ?>" >          
			</div>
		</td>
		<td width="50%">
            <label>Due Date <span style="color:#F00">*</span></label><br/>    
			<div class="input-control text" data-role="datepicker" data-preset="<?= $model['DueDate']; ?>" style="width:200px">
				<input name="DueDate" type="text" id="DueDate">
				<button class="button"><span class="mif-calendar"></span></button>
			</div>
        </td>
	</tr>    
	<tr>
		<td colspan="2">
			<label>Description <span style="color:#F00">*</span></label>
			<div class="input-control textarea full-size">
				<textarea name="Description" rows="7" id="Description" placeholder=""><?= $model['Description']; ?></textarea>
			</div>
		</td>
	</tr>							
	</table>
	<input name="AssignmentID" type="hidden" id="AssignmentID">
	<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
</form>
<div class="pure-u-1"></div>