<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Dimensionvalue;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religions;
use common\models\Academicyearsessions;
use common\models\CatholicClergy;
use common\models\Religion;
use common\models\ModeOfStudy;
use common\models\SponsorDetails;
use common\models\Miscellaneous;
use common\models\Months;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}

/* @var $this yii\web\View */
/* @var $model app\models\Institution */
/* @var $form yii\widgets\ActiveForm */
if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model->ApplicantNo;
$serverpath = Yii::$app->params['serverpath'];

?>

<script>

    
    //console.log()

    $(function() 
    {
        var dataSet = <?php echo $json1; ?>;
        $('#dataTables-1').dataTable( 
            {
                "bProcessing": true,
                "data": dataSet,
                "searching": false,
                "paging":false,
                "ordering": false,
                "info": false,
                "filter": false,
                
            

            } 
        );                                  
    })
    ;
</script>
<script>

    
    //console.log()

    $(function() 
    {
        var dataSet = <?php echo $json2; ?>;
        $('#dataTables-2').dataTable( 
            {
                "bProcessing": true,
                "data": dataSet,
                "searching": false,
                "paging":false,
                "ordering": false,
                "info": false,
                "filter": false,
                
            

            } 
        );                                  
    })
    ;
</script>
<script>
	//var serverurl = 'http://localhost:8080/ritman/frontend/web';
	var serverurl="<?= $serverpath;  ?>";
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
	function clear_option(ElementName)
{
 var select = document.getElementById(ElementName);
 var length = select.options.length;
 for (i = 0; i < length; i++) 
 {
  select.options[i] = null;
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
	
	function loadsemester1()
	{
		var Programme = document.getElementById('ProgrammeID').value;
		if (Programme != '') 
		{
			var url = '/courseregistration/getsemester?Programme='+Programme;
			fetch_data(url,function(response) 
			{
				populate_option("IntakeID", "0", response);
				var url = '/courseregistration/getstage?Programme='+Programme;
				fetch_data(url,function(response1) 
				{
					clear_option("StageID");
					populate_option("StageID", "0", response1);
				});
			});
		}
	}

	function loadsemester()
	{
		var Programme = document.getElementById('ProgrammeID').value;
		if (Programme != '') 
		{
			var url = '/courseregistration/getstage?Programme='+Programme;
			fetch_data(url,function(response1) 
			{
				clear_option("StageID");
				populate_option("StageID", "0", response1);
			});
		}
	}

	function loadsession()
	{
		var AcademicYearID = document.getElementById('AcademicYearID').value;
		if (AcademicYearID != '') 
		{
			var url = '/courseregistration/getsession?AcademicYear='+AcademicYearID;
			fetch_data(url,function(response1) 
			{
				populate_option("Academic Session", "0", response1);
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
<form id="data_form" method="POST" action="<?= $url; ?>" enctype="multipart/form-data">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
<input type="hidden" name="ApplicantNo" value="$profileID" />

	<tr>
	<h5><b>SECTION 1: PERSONAL DATA</b></h5>
	<hr class="thin bg-grayLighter">
		<td width="50%">
			<label>Name<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Name" type="text" id="Name" value="<?= $model['Name']; ?>" >          
			</div>
		</td>

		
		<td width="50%">
			<label>PASSPORT/ID NO <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">                   	
				<input name="ID No" type="text" id="ID No" value="<?= $model['ID No']; ?>" >          
			</div>
		</td>
	</tr>	
	
	<tr>
		<td width="50%">
            <label>Date Of Birth <span style="color:#F00">*</span></label><br/>    
			<div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
				<input name="Date Of Birth " type="text" id="DateOfBirth " onchange="calcDate()">
				<button class="button"> <span class="mif-calendar"></span></button>
			</div>
        </td>

        <td width="50%">
			<label>Address <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Address" type="text" id="Address" value="<?= $model['Address']; ?>" >          
			</div>
		</td>

	</tr>
	<tr>

	

	<td width="50%">
			<label>Telephone/Mobile No <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Phone No_" type="text" id="Phone No_" value="<?= $model['Phone No_']; ?>" >          
			</div>
		</td>

		<td width="50%">
			<label>Email <span style="color:#F00">*</span></label>
			
			<div class="input-control text full-size">                   	
				<input name="E-Mail" type="text" id="E-Mail" value="<?= $model['E-Mail']; ?>" >          
			</div>
		</td>	


</tr>
<tr>
	
    
		<td>
			<label>Gender <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Gender"  id="Gender" class="input-control full-size">
					<option value="0" selected="selected"></option>
					<?php 
					$result = array('0'=>'Male', '1' => 'Female' ) ;                   
					foreach ($result AS $key => $value)
					{
						$s_id = $key;
						$s_name = $value;
						if ($model->Gender==$s_id) 
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
			<label>Marital Status <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="maritalstatus"  id="maritalstatus" class="input-control full-size">
					<option value="0" selected="selected"></option>
					<?php 
					$result = array('0'=>'MARRIED', '1' => 'SINGLE' ) ;                   
					foreach ($result AS $key => $value)
					{
						$s_id = $key;
						$s_name = $value;
						if ($model['MaritalStatus']==$s_id) 
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
			<label>Do you have any Disability <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="disability"  id="disability" class="input-control full-size">
					<option value="0" selected="selected"></option>
					<?php 
					$result = array('0'=>'YES', '1' => 'NO' ) ;                   
					foreach ($result AS $key => $value)
					{
						$s_id = $key;
						$s_name = $value;
						if ($model->Disability==$s_id) 
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
				
			<label>if YES state nature of disability<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="nature" type="text" id="nature" value="<?= $model['Name']; ?>" >          
			</div>
		
			</div>
		</td>

		<td width="50%">
			<label>Citizenship/Country <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Country"  id="Country" class="input-control full-size">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Country::find()->asArray()->orderBy('Name')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Name"];
						if ($model->Country==$s_id) 
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
			<label>RELIGIOUS AFFILIATION <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="ReligiousAffiliationID"  id="ReligiousAffiliationID" class="input-control full-size">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Religion::find()->asArray()->orderBy('ReligiousAffiliationName')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["ReligiousAffiliationID"];
						$s_name = $row["ReligiousAffiliationName"];
						if ($model->ReligiousAffiliationID==$s_id) 
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
			<label>FOR CATHOLIC CLERGY ONLY <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="CatholicClergyID"  id="CatholicClergyID" class="input-control full-size">
					<option value="0" selected="selected"></option>
					<?php 
					$result = CatholicClergy::find()->asArray()->orderBy('CatholicClergyName')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["CatholicClergyID"];
						$s_name = $row["CatholicClergyName"];
						if ($model->CatholicClergyID==$s_id) 
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

</table>

	<h5><b>SECTION 2: ACADEMIC DATA</b></h5>
	<hr class="thin bg-grayLighter">

	<table class="table striped hovered" id="dataTables-1" style="tbody td {
    padding: 0.1rem;
}">
                <thead>
                <tr>
                <div class="pure-u-1"></div>
                <div class="pure-u-1"></div>
                  
                  <p3>LIST ALL HIGH/SECONDARY SCHOOLS ATTENDED</P3>  

                    

                    <th class="text-left" width="30%">Name</th>

                    <th class="text-left" width="10%">Address</th>  
 
                    

                    <th class="text-left" width="10%" >Month-Year</th>
                    <!-- <th class="text-left" width="50%">Description</th> -->
                    
                    <th class="text-left" width="10%">Month-Year</th>              
                    
                   
                    

                    


                </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>
                    <th colspan="4">&nbsp;</th>
                </tr>
                </tfoot>
            </table>

            <table class="table striped hovered" id="dataTables-2">
                <thead> 
                <tr>
                  
                  <p3>LIST ALL COLLEGES/UNIVERSITIES ATTENDED</P3>  

                    

                    <th class="text-left" width="30%">Name</th>

                    <th class="text-left" width="10%">Year</th>  
 
                    

                    <th class="text-left" width="10%" >Year</th>
                    <!-- <th class="text-left" width="50%">Description</th> -->
                    
                    <th class="text-left" width="10%">Degree or Diploma earned</th>              
                    
                   
                    

                    


                </tr>
                 </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>
                    <th colspan="4">&nbsp;</th>
                </tr>
                </tfoot>
            </table>

    <h5><b>SECTION 3: PROGRAMME e.g B.COM; LL.B; B.Ed(ENG/LIT); M.Ed; M.BA; Ph.D.Ed</b></h5>
	<hr class="thin bg-grayLighter">

    <table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
	
	<td width="33%">
			<label>1st Choice <span style="color:#F00">*</span></label>
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
		<td width="33%">
			<label>2nd Choice <span style="color:#F00">*</span></label>
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
	
		<td width="33%">
			<label>3rd Choice <span style="color:#F00">*</span></label>
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
</tr>
</table>
 <table width="100%" border="0" cellspacing="0" cellpadding="3">

<tr>
		<td width="50%">
			<label>Specify Programme <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="ProgrammeID"  id="ProgrammeID" class="input-control full-size" onchange="loadsemester()">
					<option value="0" selected="selected"></option>
					<?php 
					$result = ModeOfStudy::find()->asArray()->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Name"];
						if ($model->Code==$s_id) 
						{
							$selected = 'selected="selected"';
						}
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
		</td >
		
		<td width="50%">
			<label>When would you like to commence your studies?</label>
			<div data-role="select"> 
			<select name="Month"  id="Month" class="input-control " >
					<option value="0" selected="selected"></option>
					<?php 
					$result = Months::find()->asArray()->orderBy('Month')->all(); 

					foreach ($result AS $key => $row)
					{
						$s_id = $row["Month"];
						$s_name = $row["Month"];
						if ($model->Month==$s_id) 
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


				<select name="Year"  id="Year" class="input-control ">
					
					<?php 
					// $result = Months::find()->asArray()->orderBy('Month','Year')->all(); 
                    $startYear=date('Y');
                    $EndYear=$startYear+2;
                    // print_r($EndYear);exit;
					for($i=$startYear; $i<=$EndYear; $i++) 
					{
						$s_id = $i;
						$s_name = $i;
						if ($model->Year==$s_id) 
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
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="3">

			 <tr>

			<td>
		<label>INDICATE (IF ANY) COURSE PREVIOUSLY ATTENDED AT THE CATHOLIC UNIVERSITY OF EASTERN AFRICA <span style="color:#F00">*</span></label>
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


		</tr>
		<tr>
		<td>
		<label>WHO WILL SPONSOR YOUR EDUCATION AT CUEA <span style="color:#F00">*</span></label><br>
			<div data-role="select"> 
				<input type="radio" name="sponsor" value="self" checked> SELF
                <input type="radio" name="sponsor" value="parent"> PARENTS
                <input type="radio" name="sponsor" value="other"> OTHER  
			</div>
		</td>

		

		</tr>
		<tr>
		<td width="50%">
			<label>Sponsor(Print name in full)<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="name" type="text" id="name" value="<?= $model['Name']; ?>" >          
			</div>
		</td>
		<td width="50%">
			<label>Address<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="address" type="text" id="address" value="<?= $model['Address']; ?>" >          
			</div>
		</td>
		</tr>

		<tr>
		<td width="50%">
			<label>Telephone<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="telephone" type="text" id="telephone" value="" >          
			</div>
		</td>
		<td width="50%">
			<label>Email<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="email" type="text" id="email" value="" >          
			</div>
		</td>
		</tr>
		<tr>
		<td>
		<label>NEXT OF KIN <span style="color:#F00">*</span></label><br>
			
		</td>
       </tr>

       <tr>
		<td width="50%">
			<label>Print name in full<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="name" type="text" id="name" value="<?= $model['Name']; ?>" >          
			</div>
		</td>
		<td width="50%">
			<label>Address<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="address" type="text" id="address" value="<?= $model['Address']; ?>" >          
			</div>
		</td>
		</tr>

		<tr>
		<td width="50%">
			<label>Telephone<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="telephone" type="text" id="telephone" value="" >          
			</div>
		</td>
		<td width="50%">
			<label>Email<span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="email" type="text" id="email" value="" >          
			</div>
		</td>
		</tr>


		<tr>
			<td>
			<div class="pure-u-1"></div>
                <div class="pure-u-1"></div>
			
		<label>How did you learn about the Catholic University of Eastern Africa?<span style="color:#F00">*</span></label>
			
		</td>
		</tr>
		<td>
			
			<div data-role="select"> 
				<select name="Miscellaneous"  id="Miscellaneous" class="input-control full-size" onchange="loadsession()">
					<option value="0" selected="selected"></option>
					<?php 
					$result = Miscellaneous::find()->asArray()->orderBy('Description')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["MiscellaneousID"];
						$s_name = $row["Description"];
						if ($model->MiscellaneousID==$s_id) 
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
		
		
		
	
	
	
	
	</form>	

	<form id="file-form" action="upload" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
 
</table>
</form>	
 
	</table>
	<div class="pure-u-1"></div>
	<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
</form>
<div class="pure-u-1"></div>
<div class="pure-u-1"></div>