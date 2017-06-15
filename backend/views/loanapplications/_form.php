<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Customers;
use common\models\Deductions;
/* @var $this yii\web\View */
/* @var $model common\models\Loanapplications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loanapplications-form">

    <?php $form = ActiveForm::begin(); ?>
     <?= Html::beginForm(['loanapplications/create']) ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="3">

    <tr>
        <td width="50%">
            <label>Loan No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Loan No" type="text" style="background-color: #D3D3D3"; id="LoanNo" style="background-color: #D3D3D3"; value="LOAN<?= $nextLoanNo ?>" readonly>          
            </div>
        </td>
        <td width="50%">
            <label>Employee No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee No" style="background-color: #D3D3D3; type="text" id="EmployeeNo" style="background-color: #D3D3D3"; value="<?= $employeeDetails['No_'] ?>" readonly>          
            </div>
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>Employee Name  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee Name" type="text" style="background-color: #D3D3D3"; id="EmployeeName" style="background-color: #D3D3D3"; value="<?= $employeeDetails['No_'] ?>"  readonly>          
            </div>
        </td>
        <td width="50%">
            <label>Description <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="description"  type="text" id="description" >          
            </div>
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>Loan Status  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Loan Status" type="text"  id="LoanStatus" >          
            </div>
        </td>
        <td width="50%">
            <label>Application Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Application Date" type="text" id="ApplicationDate" style="background-color: #D3D3D3"; >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        
        
    </tr>

    <tr>
        <td width="50%">
            <label>Issued Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Issued Date" type="text" id="IssuedDate" style="background-color: #D3D3D3"; >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        <td width="50%">
            <label>Instalment  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Instalment" type="text"  id="Instalment" >          
            </div>
        </td>
        
        
    </tr>

    <tr>
         <td width="50%">
            <label>Repayment  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Repayment" type="text"  id="Repayment" >          
            </div>
        </td>
        <td width="50%">
            <label>Approved Amount  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Approved Amount" type="text"  id="ApprovedAmount" >          
            </div>
        </td>
        
        
    </tr>

    <tr>
         <td width="50%">
            <label>Interest Rate <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Interest Rate" type="text"  id="InterestRate" >          
            </div>
        </td>
       <td width="50%">
            <label>Stopage period <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Stopage period" type="text" id="StopagePeriod"  >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        
        
    </tr>

     <tr>
        <td width="50%">
            <label>Flat Rate Principal  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Flat Rate Principal" type="text"  id="FlatRatePrincipal" >          
            </div>
        </td>
        <td width="50%">
            <label>Flat Rate Interest <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Flat Rate Interest"  type="text" id="FlatRateInterest">          
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Debtors Code  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
              <?= Html::dropDownList('$model[Country]', null,
      ArrayHelper::map( Customers::find()->all(), 'No_', 'Name' )) ?>         
            </div>
        </td>
        <td width="50%">
            <label>Policy No./Loan No./Helb No. <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Helb No_"  type="text" id="HelbNo" >          
            </div>
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>University Name  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
              <input name="University Name"  type="text" id="UniversityName" >          
            </div>
        </td>
        <td width="50%">
            <label>Deduction Code  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
              <?= Html::dropDownList('$model[Deduction Code]', null,
      ArrayHelper::map( Deductions::find()->all(), 'Code', 'Description' )) ?>   
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>Total Loan  <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Total Loan" type="text"  id="TotalLoan" >          
            </div>
        </td>
        <td width="50%">
            <label>Loan Balance <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Loan Balance"  type="text" id="LoanBalance" >          
            </div>
        </td>
        
    </tr>



     
   </table>
   <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>

    

   

    

</div>
