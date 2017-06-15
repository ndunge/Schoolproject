<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->request->baseUrl;

/* @var $this yii\web\View */
/* @var $model app\models\Messagetemplates */
/* @var $form yii\widgets\ActiveForm */

if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['Message Template ID'];
?>
<script src="<?php echo $baseUrl; ?>/ckeditor/ckeditor.js"></script>
<form id="data_form" method="POST" action="<?= $url; ?>">
<input type="hidden" name="Message_Template_ID" value="<?= $model['Message Template ID'] ?>">
	<table width="100%" border="0" cellspacing="0" cellpadding="3">
			<tr>
			  <td colspan="2" align="center" style="color:#F00"><div id="msg"><?php echo $msg; ?></div></td>
	</tr>
			<tr>
                <td width="50%">
                	<label>Code</label>
                	<div class="input-control text full-size">
                    	<input name="Template Code" type="text" id="Template Code" value="<?= $model['Template Code']; ?>" placeholder="">
                        
                    </div>
                </td>
                <td width="50%"><label>Template Name</label>
                	<div class="input-control text full-size">
                    	<input name="Template Name" type="text" id="Template Name" value="<?= $model['Template Name']; ?>" placeholder="">
                        
                    </div></td>
          	</tr>
            <tr>
               <td><label>Subject</label>
                	<div class="input-control text full-size">
                    	<input name="Template Subject" type="text" id="Template Subject" value="<?= $model['Template Subject']; ?>" placeholder="">
                        
                    </div></td>
               <td></td>
            </tr>
			<tr>
                <td colspan="2">
                <label>Email Message</label> 
                <div class="input-control textarea full-size">   
                    <textarea name="editorText" id="editorText" rows="10" cols="80"><?= $model['Template Text']; ?></textarea>
            </div>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                var editor = CKEDITOR.replace( 'editorText' );
            </script></td>
            </tr>                       
            <tr>
               <td><label>SMS Message</label>
                	<div class="input-control textarea full-size"> 
                        <textarea name="SMS" id="SMS" rows="4" cols="80"><?= $model['SMS']; ?></textarea>
                    </div></td>
               <td></td>
            </tr>   
            <tr>
               <td><label class="input-control checkbox">
                <input type="checkbox" name="Allow SMS" id="Allow SMS" <?php if ($model['Allow SMS'] == 1) { echo 'checked="checked"'; } ?>/>
                <span class="check"></span>
                <span class="caption">Allow SMS</span>
            </label></td>
               <td></td>
            </tr>
            <tr>
               <td><label class="input-control checkbox">
                <input type="checkbox" name="Allow Email" id="Allow Email" <?php if ($model['Allow Email'] == 1) { echo 'checked="checked"'; } ?>/>
                <span class="check"></span>
                <span class="caption">Allow Email</span>
            </label></td>
               <td></td>
            </tr>                        
                              
        </table>
        <input name="save" type="button" id="save" onclick="updatepage('<?= $baseUrl; ?>/messagetemplates/save', '<?= $baseUrl; ?>/messagetemplates', 'data_form');" value="Save">
        <input type="reset" value="Cancel" onClick="location.href = '<?= $baseUrl; ?>/messagetemplates'">
        <span class="table_text">
        <input name="Message Template ID" type="hidden" id="MessageTemplateID" value="<?= $model['Message Template ID'];?>" />
        		</span>
</form>    
<div class="pure-u-1"></div>