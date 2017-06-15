<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Clearance;
use common\models\Customers;
use common\models\Profiles;

/* @var $this yii\web\View */
/* @var $model common\models\Clearance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clearance-form">

     <div class="pure-u-1"></div>
     <h1>Registrar Clearance</h1>
     <?= Html::beginForm(['clearanceentries/approve']) ?>

       <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>
        <td width="50%">
            <label>Registrar Clearance Marks<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Registrar Clearance Remarks" type="text"  id="RegistrarClearanceRemarks"  >          
            </div>
        </td>

        <td>
            <input name="Clearance Level Code" type="hidden"  id="RegistrarClearanceRemarks" value=""  > 
        </td>


        
    </tr>

    
</table>

 <div class="pure-u-1"></div>

    <?= Html::submitButton($model->isNewRecord ? 'Approve' : 'Approve', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Reject', ['index'], ['class' => 'button danger']) ?>
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>





    

</div>
