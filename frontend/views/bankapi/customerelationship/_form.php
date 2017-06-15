<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Dimensionvalue;
use common\models\Academicyear;
use common\models\Country;
use common\models\Postcode;
use common\models\Religions;
use common\models\Stream;
use common\models\Studentprogramme;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}
$ProfileID = $identity->ProfileID;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */
/* @var $form yii\widgets\ActiveForm */
if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['CaseID'];
// print_r($model); exit;
?>

<div id="msg" style="color:#F00"><?php echo $msg; ?></div>
<?= Html::beginForm(['customerelationship/create']) ?>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">

		<input type="hidden" name="CustomerID" value="$profileID" />
		<tr>
			<td>
				<label>Category <span style="color:#F00">*</span></label>
				<div data-role="select">
					<select name="CategoryID"  id="Category" class="input-control full-size" >
						<option value="0" selected="selected" >Select </option>
						<option value="1" > Complaint </option>
						<option value="2" > Request </option>
						<option value="3" > Suggestion </option>
					</select>
				</div>
			</td>
		</tr>

		<tr>
			
			<td width="50%">
            <label>Description <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Description" type="text"  id="Description"  >          
			</div>
		</td>

			<tr>
			
			<td width="50%">
            <label>Suggestion <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Suggestion" type="text"  id="Suggestion"  >          
			</div>
		</td>
		</tr>

		<td width="50%">
            <label>Status <span style="color:#F00">*</span></label>    
			<div class="input-control text full-size">                   	
				<input name="Status" type="text" style="background-color: #D3D3D3; readonly="readonly" id="LeaveStatus" value="<?=  $model['Status']; ?>" >  
			

			</div>
		</td>

		<tr>
			<td>
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
				<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
	
			</td>
		</tr>
		
	</table>
	
</form>
<div class="pure-u-1"></div>
<?php Html::endForm(); ?>
