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

$this->title = 'Resolve RM Case';
$this->params['breadcrumbs'][] = ['label' => 'Customerelationships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
//print_r($identity); exit;
if (empty($identity))	Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
$ProfileID = $identity->ProfileID;

if (!isset($msg)) { $msg = '';}
?>


<div class="customerelationship-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div id="msg" style="color:#F00"><?php echo $msg; ?></div>
    <?php $cid = $case['CaseID']; $action = "customerelationship/respond/?id=$cid"; ?>
	<?= Html::beginForm([ $action ]) ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="3">

			<input type="hidden" name="CustomerID" value="<?= $ProfileID ?>" >

			
			
			<tr>
				<td>
					<label>Case ID <span style="color:#F00">*</span></label>
					<div class="input-control text full-size">  
					<input type="text" name="CaseID" value="<?= $case['CaseID'] ?>" >
					</div>
				</td>
			</tr>

			<tr>
				
				<td >
		            <label>Resolution <span style="color:#F00">*</span></label>    
					<div class="input-control text full-size">                    	
						<input name="Description"  type="text" id="Description" width="100%" value="<?=$resolution['Description'] ?>"/>           
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<?= Html::submitButton($resolution->isNewRecord ? 'Resolve' : 'Save', ['class' => $resolution->isNewRecord ? 'button primary' : 'button primary']) ?>
					<?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
		
				</td>
			</tr>
			
		</table>
		
	</form>
	<div class="pure-u-1"></div>
	<?php Html::endForm(); ?>

</div>
