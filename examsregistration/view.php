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
use common\models\Examregistration;?>


<?php
//print_r($model);exit;
//print_r($model['ProgrammeCourseID']);exit;

//$this->title = $model['Exam Type ID']. '-'.$model['ProgrammeCourseID'];

//print_r($model);exit;

/* @var $this yii\web\View */
/* @var $model frontend\models\Courseregistration */

//$this->title = $model['Exam Type ID']. '-'.$model['ProgrammeCourseID'];
// $ProgrammeID = $model['Programme ID'];
// $TermID =  $model['Term ID'];
// $StageID = $model['Stage ID'];
// $AcademicYear = $model['Academic Year'];
// $ExamTypeID = $model['Exam Type ID'];
// $ProgrammeCourseID = $model['ProgrammeCourseID'];

// $url = "view?ProgrammeID=$ProgrammeID&TermID=$TermID&StageID=$StageID&AcademicYear=$AcademicYear&ExamTypeID=$ExamTypeID&ProgrammeCourseID=$ProgrammeCourseID";
// print_r($model);exit;

$exam_types = [];
foreach ($model as $key => $value) {
	array_push($exam_types, $value['Exam Type ID']);
	//print_r($exam_types);exit;
}

$students_exams = [];
foreach ($model as $key => $value) {
	$name = $value['Student Name'];
	$exam = $value['Exam Type ID'];



	$students_exams[$name][$exam] = number_format($value['Actual Mark'], 2);
	//print_r($model);exit;
	// $students_exams[$name]['']
}
//print_r($model); exit;
//$ProgrammeID = $model['Programme ID'];
//print_r($ProgrammeID);exit;
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>

<table width="100%" border="0" cellspacing="0" cellpadding="3">

<tr>
		<td>
			<label>Programme</label>
			<div class="input-control text full-size">                  	
				<input type="text" value="<?= $model[0]['Programme ID'] ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Academic Year <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model[0]['Academic Year'] ?>" disabled>          
			</div>
		</td>
</tr>

<tr>
		<td>
			<label>Semester <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model[0]['Term ID'] ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Stage</label>
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model[0]['Stage ID'] ?>" disabled>          
			</div>
		</td>	
	</tr>
			
</table>		


<table width="100%" border="0" cellspacing="0" cellpadding="3" class="table striped hovered">
	<thead style="background: #d5d5d5">
		<tr >
			<td style="padding: .3rem">Student Name</td>
			<?php foreach ($exam_types as $key => $value): ?>
				<td> <?= $value ?></td>	
			<?php endforeach ?>
			<td style="padding: .3rem">Total</td>
			<td style="padding: .3rem">Grade</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($students_exams as $key => $value): ?>
			<tr>

				<td><?= $key ?></td>
				<?php foreach ($exam_types as $key => $exam): ?>
					<!-- <div class="text full-size" >  -->
					<td>
						<input type="text" class="text full-size combat"    value="30" >
					</td>

					<!-- <td>
						<input type="text" class="text full-size combat" value="30">
					</td> -->


					

					<!-- </div>	 -->
				<?php endforeach ?>
				<td class="total-combat">600</td>
				<td class="total-grade">A</td>
			</tr>			
		<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
    $("input").each(function() {
        var that = this; // fix a reference to the <input> element selected
        $(this).keyup(function(){
            newSum.call(that); // pass in a context for newsum():
                               // call() redefines what "this" means
                               // so newSum() sees 'this' as the <input> element
        });
    });
});
	function newSum() {
  $('tr').each(function () {
        //the value of sum needs to be reset for each row, so it has to be set inside the row loop
        var sum = 0
        var thisRow = $(this).closest('tr');

        //find the combat elements in the current row and sum it 
         thisRow.find('td:not(.combat) input:text').each( function(){
    sum += parseFloat(this.value); // or parseInt(this.value,10) if appropriate
  });

        //set the value of currents rows sum to the total-combat element in the current row
        $('.total-combat', this).html(sum);
    });
  // thisRow.find('td.total').val(sum); // It is an <input>, right?
}
</script>