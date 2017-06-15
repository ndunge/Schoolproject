<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Clearance;
use common\models\Dimensionvalue;
use common\models\Customers;
use common\models\Profiles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Clearance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clearance-form">

    
   <?= Html::beginForm(['clearance/insert']) ?> 

    <table width="100%" border="0" cellspacing="0" cellpadding="3">

     <tr>

      <td width="50%">
            <label>Student No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="StudentNo_" type="text" style="background-color: #D3D3D3"; id="StudentNo_" value="<?= $studentDetails['CustomerID'] ?>""  readonly>          
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
            <label>Balance<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Balance" type="text" style="background-color: #D3D3D3"; id="Balance"   readonly>          
            </div>
        </td> 

       <td width="50%">
            <label>ID No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="ID No." type="text" style="background-color: #D3D3D3"; id="IdNo:" value="<?= $studentDetails['IDNumber'] ?>""  readonly>          
            </div>
        </td> 

        
        
    </tr>

     <tr>

        <td width="50%">
            <label>Address<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Address" type="text" style="background-color: #D3D3D3"; id="Address"   readonly>          
            </div>
        </td> 

       <td width="50%">
            <label>Phone No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Phone No." type="text" style="background-color: #D3D3D3"; id="IdNo:"   readonly>          
            </div>
        </td> 

        
        
    </tr>

   



    <tr>
       


        <td width="50%">
            <label> Clearance Semester <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Semester " type="text"  id="Clearance Semester "  >          
            </div>
        </td>

         <td width="50%">
            <label> Clearance Academic Year <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Clearance Academic Year " type="text"  id="Clearance Academic Year "  >          
            </div>
        </td>
        
        
    </tr>

    <tr>

    <td width="50%">
            <label>Current Programme <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Current Programme" type="text"   id="Current Programme" >          
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
                <input name="Date of Completion" type="text"   id="Date of Completion" >          
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
                <input name="Clearance Initiated By " type="text" style="background-color: #D3D3D3"  id="Clearance Initiated By " readonly  >          
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
                <input name="Clearance Initiated Time " type="text" style="background-color: #D3D3D3"  id="Clearance Initiated Time " readonly >          
            </div>
        </td>


        
        
    </tr>

    <tr>
         <td width="50%">

            <label>Departments Code<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">
<?= Html::dropDownList('$model[Department Code]', null,
      ArrayHelper::map( Dimensionvalue::find()->all(), 'Code', 'Name' )) ?>
            <!-- <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>   --> 

                <!-- <input name="Country" type="text" id="Country" value="<?//= $model['Country'];  ?>"  />          -->
            </div>
        </td> 

    </tr>


    

    </table>

   <div class="pure-u-1"></div>

    <?= Html::submitButton($model->isNewRecord ? 'OK' : 'OK', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>
     
      
       

    


   
    
 

  




    

</div>
