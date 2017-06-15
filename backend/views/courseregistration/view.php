<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\Dimensionvalue;
use common\models\Additionalservices;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religions;
use common\models\Stream;
use common\models\Courses;
use common\models\Studentunits;

/* @var $this yii\web\View */
/* @var $model frontend\models\Courseregistration */

$this->title = $model['Reg_ Transacton ID'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pure-u-1"></div>
    <p>
		<?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
    </p>

    <table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td>
			<label>Programme <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Programme"  id="Programme" class="input-control full-size" disabled>
					<option value="0" selected="selected"></option>
					<?php 
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
				<select name="Academic Year"  id="Academic Year" class="input-control full-size" disabled>
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
				<select name="Semester"  id="Semester" class="input-control full-size" disabled>
					<option value="0" selected="selected"></option>
					<?php 
					$result = Dimensionvalue::find()->asArray()->where("[Student Term] = 1")->orderBy('Name')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Name"];
						if ($model->Semester==$s_id) 
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
			<label>Stage <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Stage"  id="Stage" class="input-control full-size" disabled>
					<option value="0" selected="selected"></option>
					<?php 
					$result = Dimensionvalue::find()->asArray()->where("[Student Programme Stage] = 1")->orderBy('Name')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Code"];
						$s_name = $row["Name"];
						if ($model->Stage==$s_id) 
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
		<td width="50%">
			<label>Stream <span style="color:#F00">*</span></label>
			<div data-role="select"> 
				<select name="Student Stream"  id="Student Stream" class="input-control full-size" disabled>
					<option value="0" selected="selected"></option>
					<?php 
					$result = Stream::find()->asArray()->orderBy('Stream Name')->all();                    
					foreach ($result AS $key => $row)
					{
						$s_id = $row["Stream Code"];
						$s_name = $row["Stream Name"];
						if ($model['Student Stream']==$s_id) 
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
		<td width="50%">

		</td>
	</tr>						
	</table>
	<div class="pure-u-1"></div>
	
<form id="data_form" method="POST" action="view?id=<?= $model['Reg_ Transacton ID']; ?>">
	<input name="Programme" type="hidden" id="Programme" value="<?= $model['Programme']; ?>" >
	<input name="Stage" type="hidden" id="Stage" value="<?= $model['Stage']; ?>" > 
	<input name="Semester" type="hidden" id="Semester" value="<?= $model['Semester']; ?>" >
	<input name="Student No_" type="hidden" id="Student No_" value="<?= $model['Student No_']; ?>" >
	<input name="AcademicYear" type="hidden" id="AcademicYear" value="<?= $model['Academic Year']; ?>" >	
	<input name="Stage" type="hidden" id="Stage" value="<?= $model['Stage']; ?>" >
	<input name="Reg_ Transacton ID" type="hidden" id="Reg_ Transacton ID" value="<?= $model['Reg_ Transacton ID']; ?>" >
	<input name="Unit Stage" type="hidden" id="Unit Stage" value="<?= $model['Stage']; ?>" >

	<table width="100%" border="0" cellspacing="0" cellpadding="3">
		<?php
		foreach ($Selected AS $key => $row)
		{
			$s_id = $row["Unit"];
			$s_name = $row["Description"];
			$Checked = '';
			if ($row['Taken'] == 1) { $Checked = 'checked';}
			?>
			<tr>		
				<td>
					<input name="<?= "CK_".$s_id; ?>" type="checkbox" value="1" <?= $Checked; ?> />
				</td>
				<td>
					<?= $s_name; ?>
				</td>	
			</tr>	
		<?php
		} ?>					
	</table><t>
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
	<h1>Optional Services</h1>
		<?php
		$result2 = Additionalservices::find()->asArray()->orderBy('Code')->all();  
		foreach ($Selected AS $key => $raw)
		{
			$s_id = $row["Unit"];
			$s_name = $row["Description"];
			$Checked = '';
			if ($row['Taken'] == 1) { $Checked = 'checked';}
			?>
			<tr>		
				<td>
					<input name="<?= "CK_".$s_id; ?>" type="checkbox" value="1" <?= $Checked; ?> />
				</td>
				<td>
					<?= $s_name; ?>
				</td>	
			</tr>	
		<?php
		} ?>	
						
	</table></t>
	<div class="pure-u-1"></div>
	<?= Html::submitButton('Save', ['class' => 'button primary']) ?>
	<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
</form>	
<div class="pure-u-1"></div>