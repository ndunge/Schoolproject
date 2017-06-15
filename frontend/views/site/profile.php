<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */

$baseUrl = Yii::$app->request->baseUrl;

$this->title = 'Registration';
$error = (isset($error)) ? $error : '';
$url = $baseUrl.'/site/profile';
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>
<div class="pure-g">
	<div class="pure-u-1 pure-u-md-1-3">
		<p style="color:#F00"><?= $error; ?></p>
	<form id="file-form" action="<?= $url; ?>" method="POST" enctype="multipart/form-data">	
		<label>First Name <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="FirstName" type="text" id="FirstName" value="<?= $model['FirstName'];?>"/>
		</div>
		<label>Last Name <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="LastName" type="text" id="LastName" value="<?= $model['LastName'];?>"/>
		</div>
		<label>Email <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="Email" type="text" id="Email" value="<?= $model['Email'];?>"/>
		</div>
		<label>Your Username <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="UserName" type="text" id="UserName" value="<?= $model['UserName'];?>" disabled/>
		</div>				
	<?= Html::submitButton('Save', ['class' => 'button primary']) ?>
	<?= Html::a('Cancel', ['/studentapplication'], ['class' => 'button']) ?>	
	</form>
	</div>
</div>