<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Countries;
use common\models\Profiles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Appointments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointments-form">

<?= Html::beginForm(['appointments/create']) ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="3">

        <input type="hidden" name="CustomerID" value="$profileID">
        <tr>

         <td width="50%">
            <label>Student No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="StudentNo_" type="text" style="background-color: #D3D3D3"; id="StudentNo_" value="<?= $studentDetails['CustomerID'] ?>""  readonly>          
            </div>
        </td>
           
           <td width="50%">
            <label>Student Name <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Student_Name" type="text"  id="StudentName" value="<?= $studentDetails['FirstName'].' '.$studentDetails['MiddleName'].' '.$studentDetails['LastName'] ?>" style="background-color: #D3D3D3"; readonly >          
            </div>
        </td>

        <tr>

        <td width="50%">

            <label>Staff<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">
            
<?= Html::dropDownList('Staff_ID', null,
      ArrayHelper::map( Profiles::find()->all(), 'CustomerID', 'FirstName' )) ?>
            <!-- <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>   --> 

               
            </div>
        </td> 

       

        <td width="50%">
            <label>Appointment Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Appointment Date" type="text" id="AppointmentDate"  >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        
        </tr>

        <tr>


         <td>
        <label>Appointment Time <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Appointment_Time" type="text" id="AppointmentTime" value="<?= $model['Appointment_Time'] ?>">          
            </div>
        </td>
        
        <td width="50%">
            <label>Creation Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Creation Date" type="text" id="CreationDate" style="background-color: #D3D3D3"; onchange="calcDate()">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>

       

        </tr>>
        
  
<tr>
    
        <td>
        <label>Subject <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Subject" type="text" id="Subject" value="<?= $model['Subject'] ?>">          
            </div>
        </td>

 <td>
        <label>Comments <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Comments" type="text" id="Comments" value="<?= $model['Comments'] ?>">          
            </div>
        </td>

</tr>
        

        
    </table>
    

<div class="pure-u-1"></div>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>

   

</div>
