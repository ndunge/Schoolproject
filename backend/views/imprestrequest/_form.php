<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Employees;
use common\models\Countries;
use common\models\Transportrequest;
use yii\helpers\VarDumper;


if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['No_'];
?>

<script>

    
    //console.log()

    $(function() 
    {
        var dataSet = <?php echo $json; ?>;
        $('#dataTables-1').dataTable( 
            {
                "bProcessing": true,
                "data": dataSet,
                "searching": false,
                "paging":false,
                "ordering": false,
                "info": false,
                "filter": false,
                
            

            } 
        );                                  
    })
    ;
</script>

<script>

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

function calcvalues2()
{
    if (!document.getElementById("No_of Days").value)
    {
        alert("You must enter the No Of Days");
        return;
    }

if (!isNumeric(document.getElementById("No_of Days").value))
    {
        alert("Invalid No of Days entered");
        return;
    }
    var result =   document.getElementById("LeaveEntitlment").value -  document.getElementById("DaysApplied").value;
    document.getElementById("Leavebalance").value = result;
}   


</script>

<script>

function calcDate()
{
    
var result2 =   new Date(document.getElementById("TripStartDate").value);
var result3 =   new Date(document.getElementById("TripExpectedEndDate").value);
var result1=result2.addDays(parseInt(document.getElementById("No_of Days").value));
// var result1 = result2 + parseInt(document.getElementById("DaysApplied").value);
    alert(result1);
 var result4=   document.getElementById("TripExpectedEndDate").value = result1.format("yyyy-mm-dd");;
 var result5=   document.getElementById("Deadline for Imprest Return").value = result1.format("yyyy-mm-dd");;

}
Date.prototype.addDays = function(days)
 {

    this.setDate(this.getDate() + parseInt(days));
    return this;
};
</script>

<div class="imprestrequest-form">

<?= Html::beginForm(['imprestrequest/create']) ?>

<table width="100%" border="0" cellspacing="0" cellpadding="3">

<tr>

        
        <td width="50%">
            <label>Imprest No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="No" style="background-color: #D3D3D3;" type="text" id="ImprestNo" value="IMPR<?=$nextImprestNo;?>" readonly>          
            </div>
        </td>

        <td width="50%">
            <label>Request Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Request Date" style="background-color: #D3D3D3;" type="text" id="RequestDate" >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>

</tr>


<tr> 

 <td width="50%">

            <label>Trip No<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">
<?= Html::dropDownList('$model[Country]', null,
      ArrayHelper::map( Transportrequest::find()->all(), 'Request No_', 'Request ID' )) ?>
            <!-- <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>   --> 

                <!-- <input name="Country" type="text" id="Country" value="<?= $model['Country'];  ?>"  />          -->
            </div>
        </td> 


        <td width="50%">
            <label>Employee No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee Code" style="background-color: #D3D3D3;" type="text" id="EmployeeNo" value="<?=$employeeDetails['No_']?>" readonly>          
            </div>
        </td>
        
    </tr> 

    <tr>


        <td width="50%">
            <label>Employee Name <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee Name" type="text" style="background-color: #D3D3D3;" id="EmployeeName" value="<?= $employeeDetails['First Name'].' '.$employeeDetails['Middle Name'].' '.$employeeDetails['Last Name'] ?>" readonly>          
            </div>
        </td>

        <td width="50%">
            <label>Trip Start Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Trip Start Date" type="text" id="TripStartDate" >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>

        </tr> 

    <tr>

         <td width="50%">
            <label>Trip Expected End Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Trip Expected End Date" type="text" id="TripExpectedEndDate" readonly="readonly">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        
        

        <td width="50%">
            <label>No_ of Days <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="No_ of Days" type="text" id="No_of Days" value="<?= $model['No_ of Days'];  ?>" onchange="calcDate()" />         
            </div>
        </td>
        
        
        
        
    </tr> 

    <tr>
        <td width="50%">
            <label>Department Code <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Global Dimension 1 Code" type="text" style="background-color: #D3D3D3;" id="No_of Days" value="<?= $model['Global Dimension 1 Code'];  ?>"  />         
            </div>
        </td> 

       <td width="50%">
            <label>Deadline for Imprest Return <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Deadline for Imprest Return" type="text" id="Deadline for Imprest Return" >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>

        </tr>

         <tr>
         

      <td width="50%">
            <label>Status <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Status" type="text" style="background-color: #D3D3D3;" readonly="readonly" id="Status" value="<?=  $model['Status']; ?>" >  
            

            </div>
        </td>

         <td width="50%">
            <label>Transaction Type <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size"> 
            <select style="width:100%" name="Transaction Type">.
                                <option value="" selected disabled> Type </option>.
                                <option value="1"> Cash</option>.
                                <option value="2"> Cheque </option>.
                                
                           </select>              
                 
            

            </div>
        </td>



    </tr>

   

    <tr>
         
        

        <td width="50%">
            <label>External Application<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size"> 
            <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>              
                 
            

            </div>
        </td>

        


    </tr>

    <tr>
         
         <td width="50%">
            <label>City<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="City" type="text" id="City" value="<?= $model['City'];  ?>"  />         
            </div>
        </td> 

        <td width="50%">

            <label>Country<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">
<?= Html::dropDownList('$model[Country]', null,
      ArrayHelper::map( Countries::find()->all(), 'Code', 'Name' )) ?>
            <!-- <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>   --> 

                <!-- <input name="Country" type="text" id="Country" value="<?= $model['Country'];  ?>"  />          -->
            </div>
        </td> 


    </tr>

</table>

<div class="pure-u-1"></div>

 <table class="table striped hovered" id="dataTables-1">
                <thead>
                <tr>
                    <th class="text-left" width="30%">Type</th>
                    
                    <th class="text-left" width="20%">Account Type</th>

                    <th class="text-left" width="20%">Account No</th>

                    <th class="text-left" width="30%">Unit of Measure</th>

                    

                    <th class="text-left" width="30%">Description</th>

                    <th class="text-left" width="10%">Quantity</th>  
 
                    

                    <th class="text-left" width="10%" >Unit Price</th>
                    <!-- <th class="text-left" width="50%">Description</th> -->
                    
                    <th class="text-left" width="10%">Total Amount</th>              
                    
                   
                    

                    


                </tr>
                </thead>

                <tbody>
                </tbody>

                <tfoot>
                <tr>
                    <th colspan="4">&nbsp;</th>
                </tr>
                </tfoot>
            </table>

    

   

     <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>
