<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Clearance1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clearance1-form">

    
       

    <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>
        <td width="50%">
            <label>Library Clearance Card No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Student No_" type="text" style="background-color: #D3D3D3"; id="StudentNo_"  readonly>          
            </div>
        </td>


       <td width="50%">
            <label>Books Lost<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Books Lost" type="text"  id="BooksLost"  >          
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Library Amount<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Amount" type="text"  id="LibraryAmount"  readonly>          
            </div>
        </td>


        <td width="50%">
            <label> Library Other Charges <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Other Charges" type="text"  id="LibraryOtherCharges"  readonly>          
            </div>
        </td>
        
    </tr>

    <tr>

         <td width="50%">
            <label>Library Clearance Remarks <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Clearance Remarks" type="text"  id="LibraryClearanceRemarks"  readonly>          
            </div>
        </td>

        <td width="50%">
            <label>Library Clearance ID <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Clearance ID" type="text" style="background-color: #D3D3D3";  id="LibraryClearanceID"  readonly>          
            </div>
        </td>

</tr>

 <tr>

         <td width="50%">
            <label>Library Clearance Date <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Clearance Date" type="text" style="background-color: #D3D3D3"; id="LibraryClearanceDate"  readonly>          
            </div>
        </td>

        <td width="50%">
            <label>Library Clearance Time <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Clearance Time" type="text" style="background-color: #D3D3D3"; id="LibraryClearanceTime"  readonly>          
            </div>
        </td>


        
        
    </tr>

    

    </table>
    <div class="pure-u-1"></div>

    <div class="form-group">
        
        
    <p>
        <?= Html::a('Approve', ['update', 'id' => $model['Library Clearance ID']], ['class' => 'button primary']) ?>
        <?= Html::a('Reject', ['delete', 'id' => $model['Library Clearance ID']], [
            'class' => 'button danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
    </p>

    </div>

    <div class="pure-u-1"></div>

</div>
