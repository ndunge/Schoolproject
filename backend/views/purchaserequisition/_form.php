
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Employees;
use common\models\Requisitionlines;
use yii\helpers\VarDumper;


/* @var $this yii\web\View */
/* @var $model common\models\Purchaserequisition */
/* @var $form yii\widgets\ActiveForm */
if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['No_'];
?>

<script>

    var items = <?= json_encode($items); ?> ;
    var accounts = <?= json_encode($accounts); ?> ;
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
<div id="msg" style="color:#F00"><?php echo $msg; ?></div>



<div class="purchaserequisition-form">



<?= Html::beginForm(['purchaserequisition/create']) ?>

<table width="100%" border="0" cellspacing="0" cellpadding="3">

<tr>

        
        <td width="50%">
            <label>Requisition No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="No" style="background-color: #D3D3D3;"  type="text" id="RequisitionNo" value="PR<?=$nextRequisitionNo  ?>" readonly>          
            </div>
        </td>
        <td width="50%">
            <label>Employee No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee Code" style="background-color: #D3D3D3;" type="text" id="EmployeeNo" value="<?= $employeeDetails['No_'] ?>" readonly>          
            </div>
        </td>
        
    </tr> 

    <tr>

        
        <td width="50%">
            <label>Employee Name <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee Name" style="background-color: #D3D3D3;" type="text" id="EmployeeName" value="<?= $employeeDetails['First Name'].' '.$employeeDetails['Middle Name'].' '.$employeeDetails['Last Name'] ?>" readonly>          
            </div>
        </td>
        
        <td width="50%">
            <label>Reason <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Reason" type="text" id="Reason" value="<?= $model['Reason'];  ?>">          
            </div>
        </td>
        
    
    </tr>

    <tr>
        <td width="50%">
            <label>Requisition Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Requisition Date" type="text" id="RequisitionDate" style="background-color: #D3D3D3;" readonly >
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        <td width="50%">
            <label>Status <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Status" style="background-color: #D3D3D3;" type="text" id="Status" value="<?= $model['Status'];  ?>" readonly>          
            </div>
        </td>
        
    </tr>

    

    
    
   

    
    </table>

    <div class="pure-u-1"></div>
            <table class="table striped hovered" id="dataTables-1">
                <thead>
                <tr>
                    <th class="text-left" width="30%">Type</th>

                    <th class="text-left" width="30%">No</th>

                    <th class="text-left" width="30%">Unit of Measure</th>
                    <!-- <th class="text-left" width="50%">Description</th> -->
                    <th class="text-left" width="10%">Quantity</th>               
                    <th class="text-left" width="10%" >Unit Price</th>
                    <th class="text-left" width="20%">Amount</th>
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
