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

    
<h1>Library Clearance</h1>
<?= Html::beginForm(['clearanceentries/approve']) ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>

        <td width="50%">
            <label>Library Clearance Card No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="StudentNo_" type="text" style="background-color: #D3D3D3"; id="StudentNo_" value="<?= $Clearances['Student ID'] ?>"  readonly>          
            </div>
        </td>


       <td width="50%">
            <label>Books Lost<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="BooksLost" type="text"  id="BooksLost"  >          
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Library Amount<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="LibraryAmount" type="text"  id="LibraryAmount" >          
            </div>
        </td>


        <td width="50%">
            <label> Library Other Charges <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="LibraryOtherCharges" type="text"  id="LibraryOtherCharges">          
            </div>
        </td>
        
    </tr>

    <tr>

         <td width="50%">
            <label>Library Clearance Remarks <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size"> 
            <input name="LibraryClearanceRemarks" type="text"  id="LibraryClearanceRemarks">
               
                                
                          
            </div>
        </td>

        
        <td>
            <input name="Clearance Level Code" type="hidden" id="ClearanceLevelCode" value="LIBRARY"  >
            <input name="StudentNo_" type="hidden" id="StudentNo_" value="<?= $model['Student ID'] ?>"  >
        </td>

</tr>



    

    </table>
    <div class="pure-u-1"></div>

    <button type="submit" value="APPROVED" name="Approval" class="button primary">Approve</button>
    <button type="submit" value="REJECTED" name="Approval" class="button danger">Reject</button>

   <!--  <?= Html::submitButton($model->isNewRecord ? 'Approve' : 'Approve', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Reject', ['index'], ['class' => 'button danger']) ?> -->
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>

     


    

 



    

</div>
