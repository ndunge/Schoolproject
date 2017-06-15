<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Dimensionvalue;
use common\models\Leaveapplication;
use common\models\LeaveTypes;
use common\models\Employees;
use yii\helpers\Url;



$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}
//$ProfileID = $identity->ProfileID;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */
/* @var $form yii\widgets\ActiveForm */
if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['Application No'];

$jsCalcLeaveBalance = <<<JS
	var result =   document.getElementById("LeaveEntitlment").value -  document.getElementById("DaysApplied").value;
 	document.getElementById("Leavebalance").value = result;
JS;
?>
<script>

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function calcvalues()
{
	if (!document.getElementById("DaysApplied").value)
	{
		alert("You must enter the days applied");
		return;
	}

if (!isNumeric(document.getElementById("DaysApplied").value))
	{
		alert("Invalid days applied");
		return;
	}
	var result =   document.getElementById("LeaveEntitlment").value -  document.getElementById("DaysApplied").value;
 	document.getElementById("Leavebalance").value = result;
}	


</script>

<script>

function calcDate()
{
	
var result2 =   new Date(document.getElementById("StartDate").value);
var result3 =   new Date(document.getElementById("ResumptionDate").value);
var result1=result2.addDays(parseInt(document.getElementById("DaysApplied").value));
// var result1 = result2 + parseInt(document.getElementById("DaysApplied").value);
	alert(result1);
 var result4=	document.getElementById("EndDate").value = result1.format("yyyy-mm-dd");;
 var result5=	document.getElementById("ResumptionDate").value = result1.format("yyyy-mm-dd");;

}
Date.prototype.addDays = function(days)
 {
 	alert(days);
    this.setDate(this.getDate() + parseInt(days));
    return this;
};
</script>
<!-- <script>

        $this->registerJs("$('#Leavetype').on('change',function(){
    $.ajax({
        url: '".yii\helpers\Url::toRoute("Leaveapplication/Leave")."',
        dataType: 'json',
        method: 'GET',
        data: {id: $(this).val()},
        success: function (data, textStatus, jqXHR) {
            $('#LeaveEntitlment').val(data.Days);
            
        },
        beforeSend: function (xhr) {
            alert('loading!');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('An error occured!');
            alert('Error in ajax request');
        }
    });
});"); 

      </script>
</head>
</head>

<script>
	var serverurl = 'http://localhost:90/ritman/frontend/web';
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
	
	
	
	
    
    
</script> -->
<div id="msg" style="color:#F00"><?php echo $msg; ?></div>
<?= Html::beginForm(['leaveapplication/create']) ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="3">

	<tr>

	    <tr>
	    <td width="50%">
            <label>Application No <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Application No" type="text" style="background-color: #D3D3D3; id="ApplicationNo" style="background-color: #D3D3D3; value="LEAVE<?= $nextLeaveNo ?>" readonly>          
			</div>
		</td>
		<td width="50%">
            <label>Employee No <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Employee No" style="background-color: #D3D3D3; type="text" id="EmployeeNo" style="background-color: #D3D3D3; value="<?= $employeeDetails['No_'] ?>" readonly>          
			</div>
		</td>
		
	</tr>
	<tr>
		<td width="50%">
            <label>Employee Name <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Employee Name" type="text" style="background-color: #D3D3D3; id="EmployeeName" value="<?= $employeeDetails['First Name'].' '.$employeeDetails['Middle Name'].' '.$employeeDetails['Last Name'] ?>" readonly>          
			</div>
		</td>

		<td>
			<label>Leave Type <span style="color:#F00">*</span></label>		 
<?= Html::dropDownList('Leave Code', ' ', $Leavetypes , [
                    'class' => 'input-control full-size',
                    'id' => 'Leavetype',
                    'prompt' => '',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('leaveapplication/leave').'", { code: $(this).val() } )
                            .done(function(data) {
                                $("#LeaveEntitlment").val(parseInt( $.parseJSON(data).Days ));
                            }
                        );
                    '
                ]) ?>
                      
		</td>
		
	</tr>

	<tr>
	    <td width="50%">
            <label>Days Applied <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Days Applied" type="text" id="DaysApplied" value="<?= $model['Days Applied'];  ?>" onchange="calcvalues()"/>         
			</div>
		</td>
		<td width="50%">
            <label>Application Date <span style="color:#F00">*</span></label><br/>    
			<div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
				<input name="Application Date" type="text" id="ApplicationDate" style="background-color: #D3D3D3; >
				<button class="button"> <span class="mif-calendar"></span></button>
			</div>
        </td>
		
	</tr>
	
	<tr>
		
		<td width="50%">
            <label>Start Date <span style="color:#F00">*</span></label><br/>    
			<div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
				<input name="Start Date" type="text" id="StartDate" onchange="calcDate()">
				<button class="button"> <span class="mif-calendar"></span></button>
			</div>
        </td>

        <td width="50%">
            <label>End Date <span style="color:#F00">*</span></label><br/>    
			<div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
				<input name="End Date" type="text" id="EndDate">
				<button class="button"> <span class="mif-calendar"></span></button>
			</div>
        </td>
	</tr> 
	<tr>
		<td width="50%">
            <label>Leave Status <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Leave Status" type="text" style="background-color: #D3D3D3; readonly="readonly" id="LeaveStatus" value="<?=  $model['Leave Status']; ?>" >  
			

			</div>
		</td>

		<td width="50%">
            <label>Leave balance <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Leave balance" type="text" id="Leavebalance" value="<?= $model['Leave balance']; ?>"  >          
			</div>
		</td>
		
	</tr>

	<tr>
		<td width="50%">
            <label>Resumption Date <span style="color:#F00">*</span></label><br/>    
			<div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
				<input name="Resumption Date" type="text" id="ResumptionDate" style="background-color: #D3D3D3; >
				<button class="button"> <span class="mif-calendar"></span></button>
			</div>
        </td>

		<td width="50%">
            <label>Leave Entitlement <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Leave Entitlment"  type="text" id="LeaveEntitlment" value="<?= $model['Leave Entitlment']; ?>">          
			</div>
		</td>
		
	</tr>  	

	<tr>
		<td>
			<label>Duties Taken Over By <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="No_"  id="No" class="input-control full-size" onchange="loadsemester()">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Employees::find()->asArray()->orderBy('First Name')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["No_"];
						$s_name = $row["First Name"];
						$s_name2 = $row["Middle Name"];
						$s_name3 = $row["Last Name"];
						if ($model['Application No']==$s_id) 
						{
							$selected = 'selected="selected"';
						} else
						{
							$selected = '';
						}												
						?>
						<option value="<?php echo $s_id; ?>" <?php echo $selected; ?>><?php echo $s_id ."  ".  $s_name."  ".$s_name3; ?></option>
						<?php 
					}  ?>                        
				</select>
			</div>
		</td>

		<td>
		<label>Department Name <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Department Name" type="text" id="DepartmentName" value="<?= $employeeDetails['Department Name'] ?>">          
			</div>
		</td>

		
		
	</tr> 

	
	
	   
								
	</table>
	<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
	<div class="pure-u-1"></div>
<?php Html::endForm(); ?>

