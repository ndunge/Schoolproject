<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\Dimensionvalue;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religions;
use common\models\Stream;
use common\models\Courses;
use common\models\Examregistration;

/* @var $this yii\web\View */
/* @var $model frontend\models\Courseregistration */

$this->title = $model['Exam Type ID']. '-'.$model['ProgrammeCourseID'];
$ProgrammeID = $model['Programme ID'];
$TermID =  $model['Term ID'];
$StageID = $model['Stage ID'];
$AcademicYear = $model['Academic Year'];
$ExamTypeID = $model['Exam Type ID'];
$ProgrammeCourseID = $model['ProgrammeCourseID'];

$url = "view?ProgrammeID=$ProgrammeID&TermID=$TermID&StageID=$StageID&AcademicYear=$AcademicYear&ExamTypeID=$ExamTypeID&ProgrammeCourseID=$ProgrammeCourseID";
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>
    <p>
		<?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
    </p>

    <table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td>
			<label>Programme</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Programme ID']; ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Accademic Year <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Academic Year']; ?>" disabled>          
			</div>
		</td>	
	</tr>
	<tr>
		<td>
			<label>Semester <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Term ID']; ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Stage</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Stage ID']; ?>" disabled>          
			</div>
		</td>	
	</tr>	
	<tr>
		<td width="50%">
			<label>Exam</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Exam Type ID']; ?>" disabled>          
			</div>
		</td>
		</td>
		<td width="50%">

		</td>
	</tr>						
	</table>
	<div class="pure-u-1"></div>	
<form id="data_form" method="POST" action="<?= $url ?>">
	<input name="Programme ID" type="hidden" id="Programme ID" value="<?= $model['Programme ID']; ?>" >
	<input name="Stage ID" type="hidden" id="Stage ID" value="<?= $model['Stage ID']; ?>" > 
	<input name="Term ID" type="hidden" id="Term ID" value="<?= $model['Term ID']; ?>" >
	<input name="Student ID" type="hidden" id="Student ID" value="<?= $model['Student ID']; ?>" >
	<input name="Academic Year" type="hidden" id="Academic Year" value="<?= $model['Academic Year']; ?>" >	
	<input name="Exam Type ID" type="hidden" id="Exam Type ID" value="<?= $model['Exam Type ID']; ?>" >
	<h4>Achieved Marks</h4>
	<table width="100%" border="0" cellspacing="0" cellpadding="3" class="table striped hovered">
	<thead>
	<tr>		
		<th width="15%">Student ID</th>
		<th>Student Name</th>
		<th width="15%" align="right">Marks</th>	
	</tr>	
	</thead>	
		<?php
		$result = Examregistration::find()->asArray()->where("[Programme ID] = '".$model['Programme ID']."' AND [Term ID] = '".$model['Term ID']. "' AND [Stage ID] = '".$model['Stage ID']."' AND [ProgrammeCourseID] = '".$model['ProgrammeCourseID']."' AND [Academic Year]='".$model['Academic Year']."' AND [Exam Type ID] ='".$model['Exam Type ID']."'" )->all();                    
		foreach ($result AS $key => $row)
		{
			$StudentID = $row["Student ID"];
			$StudentName = $row["Student Name"];
			$Marks = $row["Actual Mark"];
			$ProgrammeID = $row['Programme ID'];
			$TermID =  $row['Term ID'];
			$StageID = $row['Stage ID'];
			$AcademicYear = $row['Academic Year'];
			$ExamTypeID = $row['Exam Type ID'];
			$ProgrammeCourseID = $row['ProgrammeCourseID'];

			$FieldName =  'EX|'.$ProgrammeID.'|'.$TermID.'|'.$StageID.'|'.$AcademicYear.'|'.$ExamTypeID.'|'.$ProgrammeCourseID.'|'.$StudentID;
			?>
			<tr>		
				<td><?= $StudentID ?></td>
				<td><?= $StudentName ?></td>
				<td align="right">
				<div class="text full-size">                   	
					<input name="<?= $FieldName; ?>" type="text" id="<?= $FieldName; ?>" value="<?= number_format($Marks,2); ?>" >          
				</div>
				</td>	
			</tr>	
		<?php
		} ?>					
	</table>
	<?= Html::submitButton('Save', ['class' => 'button primary']) ?>
	<div class="pure-u-1"></div>
</form>	
<div class="pure-u-1"></div>