<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Assignmentdocs;
$baseUrl = Yii::$app->request->baseUrl;

/* @var $this yii\web\View */
/* @var $model app\models\Assignments */

$this->title = $model->Title;
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->AssignmentID], ['class' => 'button primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->AssignmentID], [
            'class' => 'button danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
    </p>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
	<tr>
		<td>
			<label>Programme</label>
            <div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['ProgrammeID']; ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Accademic Year</label>
            <div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['AcademicYear']; ?>" disabled>          
			</div>
		</td>	
	</tr>
	<tr>
		<td>
			<label>Semester</label>
            <div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['TermID']; ?>" disabled>          
			</div>
		</td>
		<td>
			<label>Stage</label>
            <div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['StageID']; ?>" disabled>          
			</div>
		</td>	
	</tr>	
	<tr>
		<td width="50%">
			<label>Unit</label>
            <div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['CourseCode']; ?>" disabled>          
			</div>
		</td>
		<td width="50%">

        </td>
	</tr>
	<tr>
		<td>
            <label>Assignment Title <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['Title']; ?>" disabled>          
			</div>
		</td>
		<td>
            <label>Due Date</label>
            <div class="input-control text full-size">                   	
				<input type="text" value="<?= $model['DueDate']; ?>" disabled>          
			</div>
        </td>
	</tr>    
	<tr>
		<td colspan="2">
			<label>Description <span style="color:#F00">*</span></label>
			<div class="input-control textarea full-size">
				<textarea rows="7" disabled><?= $model['Description']; ?></textarea>
			</div>
		</td>
	</tr>							
	</table>
<div class="pure-u-1"></div>
<h4>Documents</h4>
<hr class="thin bg-grayLighter">
<div id="docmsg" style="color:#F00"></div>
<table class="table striped hovered dataTable" width="100%">
	<thead>
	<tr>
    	<th width="12%" class="text-left">Date</th>
        <th class="text-left">Document</th>         
    </tr>
    </thead>
    <?php
	$result = Assignmentdocs::find()->where("AssignmentID = '".$model['AssignmentID']."'")->asArray()->all();                 
    foreach ($result AS $key => $row)
    {    
		extract($row);
		$CreatedDate 	= date('d/m/Y',strtotime($CreatedDate));
		?>
    <tr>
    	<td class="text-left"><?php echo $CreatedDate; ?></td>
        <td class="text-left"><a href="<?= $baseUrl; ?>/assignments/download_docs?filename=<?= $Filename; ?>"><?= $Description; ?></a></td>    
	 </tr>
     <?php
	} 
    if (empty($result))
	{
		?>
        <tr>
            <td colspan="2" class="text-left">No records to display</td>
         </tr>
		<?php
	} ?> 
</table>
<form id="file-form" action="upload" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr> 
    <td width="50%"><label> Document Description <span style="color:#F00">*</span></label>
      <div class="input-control text full-size">
        <input name="Description" type="text" id="Description" value="" placeholder="" />        
        <input name="AssignmentID" type="hidden" id="AssignmentID" value="<?= $model['AssignmentID']; ?>" />
      </div></td>
    <td width="30%"><label>File Description</label>
       <div class="input-control file full-size" data-role="input">
                    <input type="file" id="myfile" name="myfile"/>
                    <button class="button"><span class="mif-folder"></span></button>
                  </div></td>
    <td width="20%">
    <div>&nbsp;</div>
    <?= Html::submitButton('Upload', ['class' => 'button primary']) ?></td>
  </tr>
</table>
</form>
<div class="pure-u-1"></div>