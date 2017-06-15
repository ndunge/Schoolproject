<?php

/* @var $this yii\web\View */

$baseUrl = Yii::$app->request->baseUrl;

$this->title = 'Registration';
$error = (isset($error)) ? $error : '';
$url = $baseUrl.'/site/register';
?>
<script type="text/javascript">
$(document).ready(function() {
	// body...
	//ajax alert("Yeeeees");
});
	function hideform2(){
		document.getElementById("file-form2").style.display = "none";
		document.getElementById("file-form").style.display = "block";
	}
	function hideform(){
		document.getElementById("file-form").style.display = "none";
		document.getElementById("file-form2").style.display = "block";
	}
    function myFunction() {
    	var x = document.getElementById('enterid').value;
    	//var y = document.forms[0];
    alert("Check whether your telephone number and Address matches. Entered"+x);

}



</script>
<ul class="breadcrumbs no-padding-top no-padding-bottom">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1">
	<input type="radio" name="accountypeid" value="new"  checked="checked" onclick="hideform2()"> New Student</t>
	<input type="radio" name="accountypeid" value="continuing" onclick="hideform()"> Continuing Student<br><br>
</div>
<div class="pure-g">

	<div class="pure-u-1 pure-u-md-1-3">
		<p style="color:#F00"><?= $error; ?></p>
	<form id="file-form" action="<?= $url; ?>" method="POST" onsubmit="return false;" enctype="multipart/form-data">
<div>
		
		</div>

		<label>First Name <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="FirstName" type="text" id="FirstName" value=""/>
		</div>
		<label>Last Name <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="LastName" type="text" id="LastName" value=""/>
		</div>
		<label>Email <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="Email" type="text" id="Email" value=""/>
		</div>
		<label>Your Username <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="UserName" type="text" id="UserName" value=""/>
		</div>		
		<label>Password <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="Password" type="password" id="Password"  value=""/>
		</div>	
		<label>Confirm Password <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="ConfirmPassword" type="password" id="ConfirmPassword"  value=""/>
		</div>			
		<button class="button large-button danger bg-hover-darkRed" onclick="regformhash(this.form)">
								<h5 class="align-left">
								<span class="mif-pencil place-left"></span>&nbsp;
								<span class="text-shadow">Register </span></h5>
		</button>	
	</form>


<?php

$form2url = $baseUrl.'/site/continuing';
?>

	<form style="display: none" id="file-form2" action="<?= $form2url; ?>" method="POST"  enctype="multipart/form-data">

		<label>Student No <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="StudentNo" type="text" id="StudentNo" value=""/>
		</div>

		<label>Email <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="Email" type="text" id="Email" value=""/>
		</div>
			
		<label>Password <span style="color:#F00">*</span></label>
		<div class="input-control text full-size">
			<input name="Password" type="password" id="Password"  value=""/>
		</div>	
				
		<button class="button large-button danger bg-hover-darkRed" onclick="reggformhash(this.form)">
								<h5 class="align-left">
								<span class="mif-pencil place-left"></span>&nbsp;
								<span class="text-shadow">Register </span></h5>
		</button>	
	</form>

	</div>


