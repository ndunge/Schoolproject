<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Clearance;
use common\models\Customers;
use common\models\Profiles;

/* @var $this yii\web\View */
/* @var $model common\models\Clearance */
/* @var $form yii\widgets\ActiveForm */

// print_r($model); exit;
?>

         
<h1>Finance Clearance</h1>
<?= Html::beginForm(['clearanceentries/approve']) ?>

       <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>
        <td width="50%">
            <label>Fees Balance<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Fees Amount" type="text" id="FeesAmount"  >          
            </div>
        </td>


       <td width="50%">
            <label>Finance Clearance Remarks<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Finance Clearance Remarks" type="text" id="FinanceClearanceRemarks"  >          
            </div>
        </td>

        <td>
            <input name="Clearance Level Code" type="hidden" id="ClearanceLevelCode" value="FINANCE"  >
            <input name="StudentNo_" type="hidden" id="StudentNo_" value="<?= $model['Student ID'] ?>"  >
        </td>
        
    </tr>

   

    

</table>

<div class="pure-u-1"></div>
<button type="submit" value="APPROVED" name="Approval" class="button primary">Approve</button>
<button type="submit" value="REJECTED" name="Approval" class="button danger">Reject</button>

    <!-- <?= Html::submitButton($model->isNewRecord ? 'Approve' : 'Approve', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Reject', ['index'], ['class' => 'button danger']) ?> -->
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>