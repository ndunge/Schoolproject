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
                <input name="Library Amount" type="text" style="background-color: #D3D3D3"; id="LibraryAmount"  readonly>          
            </div>
        </td>


        <td width="50%">
            <label> Library Other Charges <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Other Charges" type="text" style="background-color: #D3D3D3"; id="LibraryOtherCharges"  readonly>          
            </div>
        </td>
        
    </tr>

    <tr>

         <td width="50%">
            <label>Library Clearance Remarks <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Clearance Remarks" type="text" style="background-color: #D3D3D3"; id="LibraryClearanceRemarks"  readonly>          
            </div>
        </td>

        <td width="50%">
            <label>Library Clearance ID <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Library Clearance ID" type="text" style="background-color: #D3D3D3"; id="LibraryClearanceID"  readonly>          
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


    

 



    

</div>
