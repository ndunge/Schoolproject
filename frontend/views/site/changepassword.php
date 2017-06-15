<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\Query;
use app\models\Business; 
$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}
$this->title = 'Change Password';
if (!isset($msg)) { $msg = '';}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pure-u-1"></div>
		<div id="msg" style="color:#F00; height:20px"><?= $msg; ?></div>
		<form id="data_form" action="changepassword" method="POST" onsubmit="return false;">
	  	<table width="100%" border="0" cellspacing="0" cellpadding="3">
		<tr>
			<td width="50%">
				
					<label>Old Password <span style="color:#F00">*</span></label>
					<div class="input-control textarea full-size">
					<input name="OldPassword" type="password" id="OldPassword" placeholder="" />
              	</div>
			</td>
			<td></td>
		</tr>      
		<tr>
			<td width="50%">
				
				  	<label>New Password <span style="color:#F00">*</span></label>
					  <div class="input-control textarea full-size">
                  	<input  name="NewPassword" type="password" id="NewPassword" placeholder="" />
              	</div>
			</td>
			<td></td>
		</tr>  
			<td>
				
					<label>Confirm Password <span style="color:#F00">*</span></label>
					<div class="input-control textarea full-size">
					<input name="ConfirmPassword" type="password" id="ConfirmPassword" placeholder="" />
				</div>
			</td>
			<td></td>
	    </tr>                                         
      	</table>
        <input name="save" class="button primary" type="button" id="save" onclick="changephash(this.form, this.form.OldPassword, this.form.NewPassword, this.form.ConfirmPassword)" value="Change Password">
        <input type="reset" value="Cancel" onClick="location.href = '../'"> 
		</form>
<div class="pure-u-1"></div>