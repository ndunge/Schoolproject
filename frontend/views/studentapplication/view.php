<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\Dimensionvalue;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religion;
use common\models\Religions;
use common\models\Academicyearsessions;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index'); 
}
 
/* @var $this yii\web\View */
/* @var $model app\models\Institution */

$this->title = 'View Application : '. $model->ApplicantNo;
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div>
	<div>
		<?php 
			$full_path = Yii::$app->params['documentpath'] . $model->FileName;
			$relative_path = explode('htdocs', $full_path)[1];
			$path = explode('\\', $relative_path);
			$url = join('/', $path);
		?>
		<img align="right" src="<?= $url ?>" width="50" height="50">
	</div>
</div>
<div class="pure-u-1"> </div>
<p>		
        <?= Html::a('Edit', ['update', 'id' => $model->ApplicantNo], ['class' => 'button primary']) ?>
		
       
		<?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
		<?php
		if (($model['Offer Accepted']== 0) AND ($model['Offer Defered']== 0) AND $model['ApprovalStatus'] == 2)
		{ ?>
			<?= Html::a('Accept Offer', ['acceptoffer', 'id' => $model->ApplicantNo], ['class' => 'button success']) ?>
			<?= Html::a('Defer Offer', ['deferoffer', 'id' => $model->ApplicantNo], ['class' => 'button danger']) ?>
			<?php
		} ?>	
</p>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td width="50%">
			<label>Name <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Name']; ?>" disabled>          
			</div>
		</td>
		<td width="50%">
			<label>PASSPORT/ID NO<span style="color:#F00">*</span></label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['ID No']; ?>" disabled>          
			</div>
		</td>
	</tr>

	<tr>
		<td>
			<label>Date of Birth</label> 
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= date("d/m/Y", strtotime($model['Date Of Birth'])); ?>" disabled>          
			</div>
		</td>

		<td width="50%">
			<label>Address</label>    
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Address']; ?>" disabled>          
			</div>
		</td>

	</tr>

	<tr>
		<td width="50%">
			<label>Telephone/Mobile No</label>    
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Phone No_']; ?>" disabled>          
			</div>
		</td>


		<td width="50%">
			<label>Email</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['E-Mail']; ?>" disabled>          
			</div>
		</td>



	</tr>		
	<tr>
		<td>
			<label>Gender</label>
			<?php 
				$result = array('0'=>'Male', '1' => 'Female' ) ; 
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result[$model->Gender]; ?>" disabled>          
			</div>
		</td>

		<td>
			<label>Marital Status</label>
			<?php 
				$result = array('0'=>'MARRIED', '1' => 'SINGLE' ) ; 
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result[$model->MaritalStatus]; ?>" disabled>          
			</div>
		</td>
				
	</tr>
	<tr>

	<td>
			<label>Do you have any Disability</label>
			<?php 
				$result = array('0'=>'YES', '1' => 'NO' ) ; 
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result[$model->Disability]; ?>" disabled>          
			</div>
		</td>

		<td width="50%">
			<label>Citizenship/Country<span style="color:#F00">*</span></label>
			<?php
				$result = Country::find()->where("Code= '".$model->Country."'")->one(); 
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Name"]; ?>" disabled>          
			</div>
		</td>
		
	</tr>
	<tr>
	   <td width="50%">
			<label>RELIGIOUS AFFILIATION<span style="color:#F00">*</span></label>
			<?php
				$result = Religion::find()->where("ReligiousAffiliationID= '".$model->Religion."'")->one(); 
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["ReligiousAffiliationName"]; ?>" disabled>          
			</div>
		</td>
		
	</tr>
	<tr>
		<td>
			<label>Programme</label>
			<?php 
				$result = Dimensionvalue::find()->where("[Code] = '".$model->ProgrammeID."'")->one();
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Name"]; ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Accademic Year</label>
			<?php 
				$result = Academicyear::find()->where("Code = '".$model->AcademicYearID."'")->one();
				//print_r($result); exit;
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Description"]; ?>" disabled>          
			</div>
		</td>	
	</tr>
	<tr>
		<td>
			<label>Academic Year Session</label>
			<?php 
				$result = Academicyearsessions::find()->where("[Session Code] = '".$model['Academic Session']."'")->one();
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Session Code"]; ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Intake <span style="color:#F00">*</span></label>
			<?php 
				$result = Dimensionvalue::find()->where("[Code] = '".$model->StageID."'")->one();
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Name"]; ?>" disabled>          
			</div>
		</td>	
	</tr>	
	<tr>
		<td width="50%">
			<label>Denomination</label>
			<?php
				$result = Religions::find()->Where("Religion='".$model->Religion."'")->one();
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Religion"]; ?>" disabled>          
			</div>
		</td>
		<td width="50%">

		</td>
	</tr>	
	<tr>
		
		<td width="50%">
			<label>Country <span style="color:#F00">*</span></label>
			<?php
				$result = Country::find()->where("Code= '".$model->Country."'")->one(); 
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Name"]; ?>" disabled>          
			</div>
		</td>
	</tr>	
	<tr>
		
		<td width="50%">
			<label>Gardian or Sponsor Address</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Address 2']; ?>" disabled>          
			</div>
		</td>
	</tr>	
	<tr>
		<td width="50%">
			<label>Post Code <span style="color:#F00">*</span></label>    
			<?php
				$result = Postcode::find()->where("Code ='".$model['Post Code']."'")->one();
			?>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $result["Code"]; ?>" disabled>          
			</div>
		</td>
		<td width="50%">
			<label>City</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['City']; ?>" disabled>          
			</div>
		</td>
	</tr>
	
	
	
					
	</table>
<div class="pure-u-1"></div>