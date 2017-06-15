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

    
    

    <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>

      <td width="50%">
            <label>Student No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Student No_" type="text" style="background-color: #D3D3D3"; id="StudentNo_" value="<?= $studentDetails['CustomerID'] ?>""  readonly>          
            </div>
        </td>

        <td width="50%">
            <label>Student Name<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Student Name" type="text" style="background-color: #D3D3D3"; id="StudentName" value="<?= $studentDetails['FirstName'].' '.$studentDetails['MiddleName'].' '.$studentDetails['LastName'] ?>" readonly>          
            </div>
        </td> 

       <tr>

       <td width="50%">
            <label>ID No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="ID No." type="text" style="background-color: #D3D3D3"; id="IdNo:" value="<?= $studentDetails['IDNumber'] ?>""  readonly>          
            </div>
        </td> 

        
        
    </tr>

   



    <tr>
       


        <td width="50%">
            <label> Clearance Semester <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Semester " type="text" style="background-color: #D3D3D3"; id="Clearance Semester "  readonly>          
            </div>
        </td>

         <td width="50%">
            <label> Clearance Academic Year <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Academic Year " type="text" style="background-color: #D3D3D3"; id="Clearance Academic Year "  readonly>          
            </div>
        </td>
        
        
    </tr>

    <tr>

    <td width="50%">
            <label>Current Programme <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Current Programme" type="text" style="background-color: #D3D3D3"  id="Current Programme" readonly>          
            </div>
        </td>

       

        <td width="50%">
            <label>Intake Code <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Intake Code" type="text"  id="Intake Code"  >          
            </div>
        </td>


        
        
    </tr>

     <tr>

    <td width="50%">
            <label>Date of Completion <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Date of Completion" type="text" style="background-color: #D3D3D3"  id="Date of Completion" readonly>          
            </div>
        </td>

       

        <td width="50%">
            <label>Clearance Reason <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Reason " type="text"  id="Clearance Reason "  >          
            </div>
        </td>


        
        
    </tr>

    <tr>

    <td width="50%">
            <label>Clearance Status <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Status " type="text" style="background-color: #D3D3D3"  id="Clearance Status " readonly>          
            </div>
        </td>

       

        <td width="50%">
            <label>Clearance Initiated By <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Initiated By " type="text"  id="Clearance Initiated By "  >          
            </div>
        </td>


        
        
    </tr>

     <tr>

    <td width="50%">
            <label>Clearance Initiated Date <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Initiated Date" type="text" style="background-color: #D3D3D3"  id="Clearance Initiated Date " readonly>          
            </div>
        </td>

       

        <td width="50%">
            <label>Clearance Initiated Time <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Initiated Time " type="text"  id="Clearance Initiated Time "  >          
            </div>
        </td>


        
        
    </tr>


    

    </table>

    <div class="pure-u-1"></div>
     
      
       

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


    <div class="pure-u-1"></div>
     <h1>Registrar Clearance</h1>

       <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>
        <td width="50%">
            <label>Registrar Clearance Marks<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Registrar Clearance Remarks" type="text" style="background-color: #D3D3D3"; id="RegistrarClearanceRemarks"  readonly>          
            </div>
        </td>


       <td width="50%">
            <label>Registrar Clearance Date<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Registrar Clearance Date" type="text" style="background-color: #D3D3D3"; id="RegistrarClearanceDate"  readonly>          
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Registrar Clearance Time<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Registrar Clearance Time" type="text" style="background-color: #D3D3D3"; id="RegistrarClearanceTime"  readonly>          
            </div>
        </td>


        
        
    </tr>

</table>

 <div class="pure-u-1"></div>
     <h1>Finance Clearance</h1>

       <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>
        <td width="50%">
            <label>Fees Details<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Fees Amount" type="text" style="background-color: #D3D3D3"; id="FeesAmount"  readonly>          
            </div>
        </td>


       <td width="50%">
            <label>Finance Clearance Remarks<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Finance Clearance Remarks" type="text" style="background-color: #D3D3D3"; id="FinanceClearanceRemarks"  readonly>          
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Finance Clearance ID<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Finance Clearance ID" type="text" style="background-color: #D3D3D3"; id="FinanceClearanceID"  readonly>          
            </div>
        </td>

         <td width="50%">
            <label>Finance Clearance Date<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Finance Clearance Date" type="text" style="background-color: #D3D3D3"; id="FinanceClearanceDate"  readonly>          
            </div>
        </td>


 </tr>


    <tr>
        <td width="50%">
            <label>Finance Clearance Time<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Finance Clearance Time" type="text" style="background-color: #D3D3D3"; id="FinanceClearanceTime"  readonly>          
            </div>
        </td>

         


 </tr>

</table>

<div class="pure-u-1"></div>
     <h1>Faculty Clearance</h1>

       <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>
        <td width="50%">
            <label>Faculty Clearance Remarks<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Faculty Clearance Remarks" type="text" style="background-color: #D3D3D3"; id="FacultyClearanceRemarks"  readonly>          
            </div>
        </td>


       <td width="50%">
            <label>Faculty Clearance ID<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Faculty Clearance ID" type="text" style="background-color: #D3D3D3"; id="FacultyClearanceID"  readonly>          
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Faculty Clearance Date<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Faculty Clearance Date" type="text" style="background-color: #D3D3D3"; id="FacultyClearanceDate"  readonly>          
            </div>
        </td>

         <td width="50%">
            <label>Faculty Clearance Time<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Faculty Clearance Time" type="text" style="background-color: #D3D3D3"; id="FacultyClearanceTime"  readonly>          
            </div>
        </td>


 </tr>


   

</table>

    

</div>
