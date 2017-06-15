<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\Studentunits;
use common\models\Dimensionvalue;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religions;
use common\models\Stream;
use common\models\Courses;
use common\models\Examregistration;
use common\models\Gradingsystemlines;
use frontend\assets\DatatablesAsset;

use yii\helpers\Url;

DatatablesAsset::register($this);
// print_r($model); exit;

/* @var $this yii\web\View */
/* @var $model frontend\models\Courseregistration */

$this->title = $model['Exam Type ID'];
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

<form id="data_form" method="POST" action="view?id=<?= $model['Exam Type ID']; ?>">
	<input name="Programme ID" type="hidden" id="Programme ID" value="<?= $model['Programme ID']; ?>" >
	<input name="Stage ID" type="hidden" id="Stage ID" value="<?= $model['Stage ID']; ?>" >
	<input name="Term ID" type="hidden" id="Term ID" value="<?= $model['Term ID']; ?>" >
	<input name="Student ID" type="hidden" id="Student ID" value="<?= $model['Student ID']; ?>" >
	<input name="Academic Year" type="hidden" id="Academic Year" value="<?= $model['Academic Year']; ?>" >
	<input name="Exam Type ID" type="hidden" id="Exam Type ID" value="<?= $model['Exam Type ID']; ?>" >
	
	
	<table width="80%" height="10%" border="0.5" cellspacing="0" cellpadding="0" id="example" class="table striped hovered">
		<thead>
		<tr>
			<th>Unit</th>
			<th>Marks</th>
			<th>Grade</th>
		</tr>
		</thead>
		<?php
		$gpa=0;
		$gpax=0;
		$sgpa=0;
		$result = Examregistration::find()->asArray()->where("[Programme ID] = '".$model['Programme ID']."' AND [Term ID] = '".$model['Term ID']. "' AND [Stage ID] = '".$model['Stage ID']."' AND [Student ID] = '".$model['Student ID']."' AND [Academic Year]='".$model['Academic Year']."' AND [Exam Type ID] ='".$model['Exam Type ID']."'" )->all();
		//$Marks=57;
		
		
		foreach ($result AS $key => $row)
		{
			$s_id = $row["ProgrammeCourseID"];
			$Marks = $row["Actual Mark"];
			$Grade=Yii::$app->runAction('/examregistration/grade', ['mark' => $Marks]);
			?>
			<tr>
				<td><?= $s_id ?></td>
				<td><?= number_format($Marks,2); ?></td>
				<td>
				<?php 
					
					//print_r(Yii::$app->runAction('/examregistration/grade', ['mark' => $Marks]));exit;
					echo $Grade['Description'];
					$gpa=$Grade['Points'];
					$sgpa+=$gpa;
					$gpax+=$gpa*$gpa;
					$gpas= $gpax / $sgpa;



				?>
				</td>
				<td>
						<?php
						echo number_format($Grade['Points'],2);
						?>
						</td> 
				</td>
			
			<?php 
				$sid =$model['Student ID']; 
				$pid=$model['Programme ID']; 
				$ay=$model['Academic Year'];

		// 		$rec = Gradingsystemlines::find()->where("[Programme] = '$pid'")->andwhere("[Academic Year] = '$ay'")->asArray()->all();
		// 		foreach ($rec AS $key => $roww)
		// 			// extract($roww);
		// 			// print_r($rec);
		// 		// print_r($roww);
		// 		// exit;
		// { 
		// 	    $g_id = $roww['Description'];
		// 		
		// }
		// //$result2=Studentunits::find()->all();
		// print_r($result2);exit;
		} 
		print_r($sgpa);
		echo '<br>';
		print_r($gpax);

					// echo nl2br("\t\n");

					// print_r($gpas); 
		?>
	</table>
	<div class="pure-u-1">
		<div style="display: flex; padding: 1rem; font-weight: bolder;">
			<div style="flex: 1">
				GPA Score:
			</div>
			<div style="flex: 1; text-align: right">
				<?= $gpas ?>
			</div>
		</div>
		<?php
			$gl = Gradingsystemlines::find()->where("Points = $gpas")->one();
			$grade = empty($gl) ? 'UnDef' : $gl['Description'];
		?>
		<div style="display: flex; font-weight: bolder;">
			<div style="flex: 1">
				GPA Grade:
			</div>
			<div style="flex: 1; text-align: right">
				<?= $grade ?>
			</div>
		</div>
	</div>
</form>
<div class="pure-u-1"></div>

<script type="text/javascript">
	// console.log('start ..', jsPDF)

	// You'll need to make your image into a Data URL
// Use http://dataurl.net/#dataurlmaker

var base_url = "<?= Yii::$app->request->baseUrl; ?>"
var url = base_url + '/images/ritman.png' ;


// var grade = 'MISSING';

var name = "<?= $model['Student Name'] ?>";
var id = "<?= $model['Student ID'] ?>";
var exam = "<?= $model['Exam Type ID'] ?>";
// $model['Student ID']
// $model['Exam Type ID']
console.log(grade)

function createPDF (base64Img) {
	var doc = new jsPDF();
	doc.setFontSize(30);
	doc.text(60, 20, "Student Academic Report");
	doc.addImage(base64Img, 'JPEG', 10, 10, 40, 30);

	doc.setFontSize(12);
	doc.setFontStyle('bold');
	doc.text(60, 30, "Student Name: ");
	doc.text(60, 35, "Student ID: ");
	doc.text(60, 40, "Exam: ");
	doc.text(60, 45, "Grade: ");

	doc.setFontSize(10);
	doc.setFontStyle('normal');
	doc.text(100, 30, name);
	doc.text(100, 35, id);
	doc.text(100, 40, exam);
	doc.text(100, 45, grade	);

	doc.line(50, 50, 160, 50)

	doc.fromHTML($('#data_form').html(), 30, 50, {
        'width': 170,
        'height': 200
    });


	doc.save('sample-file.pdf');
}


function convertImgToBase64(url, callback){
    var img = new Image();
    img.crossOrigin = 'Anonymous';
    img.onload = function(){
        var canvas = document.createElement('CANVAS');
        var ctx = canvas.getContext('2d');
        canvas.height = this.height;
        canvas.width = this.width;
        ctx.drawImage(this,0,0);
        var dataURL = canvas.toDataURL('image/png');
        callback(dataURL);
        canvas = null; 
    };
    img.src = url;
}

convertImgToBase64(url, createPDF);


	// var doc = new jsPDF();
	// doc.fromHTML($('#data_form').html(), 15, 15, {
 //        'width': 170
 //    });
    // doc.save('sample-file.pdf');
    // doc.addImage(img, 'png', 15, 15, 100, 200)

	// $('#cmd').click(function () {   
	//     doc.fromHTML($('#content').html(), 15, 15, {
	//         'width': 170,
	//             'elementHandlers': specialElementHandlers
	//     });
	//     doc.save('sample-file.pdf');
	// });

	// This code is collected but useful, click below to jsfiddle link.

</script>