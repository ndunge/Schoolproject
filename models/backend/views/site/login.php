<?php

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$baseUrl = Yii::$app->request->baseUrl;


$this->title = 'Login';
$error = (isset($error)) ? $error : '';
$url = $baseUrl . '/site/login';
?>

<div class="pure-g">
	<div class="pure-u-1 pure-u-md-1-3">
		<h4>Login</h4>
		<p style="color:#F00"><?= $error; ?></p>
		<form id="file-form" action="<?= $url; ?>" method="POST" onsubmit="return false;" enctype="multipart/form-data">
			<label>Your Username <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">
				<input name="UserName" type="text" id="UserName" value=""/>
			</div>
			<label>Password <span style="color:#F00">*</span></label>
			<div class="input-control text full-size">
				<input name="Password" type="password" id="Password" value=""/>
			</div>
			<button class="button large-button primary bg-hover-darkRed" onclick="formhash(this.form)">
				<h5 class="align-left">
					<span class="mif-pencil place-left"></span>&nbsp;
					<span class="text-shadow">Login </span>
				</h5>
			</button>
			<br/>
			<br/>
			Not Registered?
			<?= Html::a('Register', ['register'], ['class' => 'button success']) ?>
			<br/>
			<br/>
			<?= Html::a('Forgot Password', ['register'], ['class' => 'button link']) ?>
		</form>
	</div>
</div>
