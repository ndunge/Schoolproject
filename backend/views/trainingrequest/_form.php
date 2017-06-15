<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Employees;
use common\models\Countries;
use common\models\Currencies;
use yii\helpers\ArrayHelper;
$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity))
{
    Yii::$app->getResponse()->redirect($baseUrl.'/site/index');
}

/* @var $this yii\web\View */
/* @var $model common\models\Trainingrequest */
/* @var $form yii\widgets\ActiveForm */

if (!isset($msg)) { $msg = '';}
$url = $model->isNewRecord ? 'create' : 'update?id='.$model['Request No_'];

// echo ($json); exit;
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
<div id="msg" style="color:#F00"><?php echo $msg; ?></div>

    

    <?= Html::beginForm(['trainingrequest/create']) ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="3">

    <tr>
        <td width="50%">
            <label>Request No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Request No_" type="text" style="background-color: #D3D3D3"; id="RequestNo" value="TRN<?= $nextRequestNo ?>" readonly>            
            </div>
        </td>
        <td width="50%">
            <label>Request Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Request Date" type="text" id="RequestDate" ">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Requested by No <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee No" type="text" id="EmployeeNo" style="background-color: #D3D3D3"; value="<?= $employeeDetails['No_'] ?>" readonly>          
            </div>
        </td>
        <td width="50%">
            <label>Requested by Name <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Employee Name" type="text" style="background-color: #D3D3D3"; id="RequestDate" value="<?= $employeeDetails['First Name'].' '.$employeeDetails['Middle Name'].' '.$employeeDetails['Last Name'] ?>"  readonly>          
            </div>
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>Status <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Status" type="text" style="background-color": #D3D3D3; id="Status" value="<?= $model['Status'];  ?>" readonly>          
            </div>
        </td>
        <td width="50%">
            <label>Department Name <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Department Name" type="text" style="background-color: #D3D3D3"; id="RequestDate" value="<?= $model['Department Name'];  ?>">          
            </div>
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>Training Need/Objective <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Training Objective" type="text"  id="Training Objective" value="<?= $model['Training Objective'];  ?>" >          
            </div>
        </td>
        <td>
                <label>Specific Course in Mind <span style="color:#F00">*</span></label>
                <div data-role="select">
                    <select name="Specific Course in Mind"  id="Specific Course in Mind" class="input-control full-size" >
                        <option value="0" selected="selected" >Select </option>
                        <option value="1" > Yes </option>
                        <option value="2" > No </option>
                        
                    </select>
                </div>
            </td>
        
    </tr>

    <tr>
        <td width="50%">
            <label>Course Title <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Course Title" type="text"  id="Course Title" value="<?= $model['Course Title'];  ?>" >          
            </div>
        </td>
        <td>
                <label>Local or Abroad <span style="color:#F00">*</span></label>
                <div data-role="select">
                    <select name="Local or Abroad"  id="Local or Abroad" class="input-control full-size" >
                        <option value="0" selected="selected" >Select </option>
                        <option value="1" > Local </option>
                        <option value="2" > Abroad </option>
                        
                    </select>
                </div>
            </td>
        
    </tr>


    <tr>
        
        <td>
                <label>Source of Funding <span style="color:#F00">*</span></label>
                <div data-role="select">
                    <select name="Source of Funding"  id="Source of Funding" class="input-control full-size" >
                        <option value="0" selected="selected" >Select </option>
                        <option value="1" > Company Funded </option>
                        <option value="2" > Partner Funded </option>
                        <option value="2" > Self Funded </option>
                    </select>
                </div>
            </td>

            <td width="50%">
            <label>No_ Of Days <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="No_ Of Days" type="text"  id="No_ Of Days" value="<?= $model['No_ Of Days'];  ?>" >          
            </div>
        </td>
        
    </tr>


   
    <tr>
        
        <td width="50%">
            <label>Planned Start Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Planned Start Date" type="text" id="PlannedStartDate" ">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>

        <td width="50%">
            <label>Planned End Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Planned End Date" type="text" id="PlannedEndDate">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
    </tr> 

 <tr>
        
        <td width="50%">
            <label>Date of Travel <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Date of Travel" type="text" id="Date of Travel" ">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>

        <td width="50%">
            <label>Return Date <span style="color:#F00">*</span></label><br/>    
            <div class="input-control text" data-role="datepicker" data-preset="<?= date('Y-m-d') ?>" data-format="yyyy-mm-dd" style="width:200px">
                <input name="Return Date" type="text" id="Return Date">
                <button class="button"> <span class="mif-calendar"></span></button>
            </div>
        </td>
    </tr>

    <tr>
        <td width="50%">
            <label>Training Insitution <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Training Insitution" type="text"  id="Training Insitution" value="<?= $model['Training Insitution'];  ?>" >          
            </div>
        </td>
        <td width="50%">
            <label>Venue<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Venue" type="text"  id="Venue" value="<?= $model['Venue'];  ?>">          
            </div>
        </td>
        
    </tr>


    <tr>
        
        <td>
                <label>Requires Flight <span style="color:#F00">*</span></label>
                <div data-role="select">
                    <select name="Requires Flight"  id="Requires Flight" class="input-control full-size" >
                        <option value="0" selected="selected" >Select </option>
                        <option value="1" > No </option>
                        <option value="2" > Yes </option>
                        
                    </select>
                </div>
            </td>

            <td width="50%">
            <label>No_ Of Days <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="No_ Of Days" type="text"  id="No_ Of Days" value="<?= $model['No_ Of Days'];  ?>" >          
            </div>
        </td>
        
    </tr>

     <tr>
        <td width="50%">
            <label>Total Cost <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Total Cost" type="text"  id="Total Cost" value="<?= $model['Total Cost'];  ?>" >          
            </div>
        </td>
       <td width="50%">

            <label>Country Code<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">
<?= Html::dropDownList('$model[Country Code]', null,
      ArrayHelper::map( Countries::find()->all(), 'Code', 'Name' )) ?>
            <!-- <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>   --> 

                       
            </div>
        </td> 
        
    </tr>

    <tr>

    <td width="50%">

            <label>Currency<span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">
<?= Html::dropDownList('$model[Currency]', null,
      ArrayHelper::map( Currencies::find()->all(), 'Code', 'Description' )) ?>
            <!-- <select style="width:100%" name="External Application">.
                                <option value="" selected disabled>  </option>.
                                <option value="1"> No</option>.
                                <option value="2"> Yes </option>.
                                
                           </select>   --> 

                       
            </div>
        </td> 
       <td width="50%">
            <label>Status <span style="color:#F00">*</span></label>    
            <div class="input-control text full-size">                      
                <input name="Status" type="text" style="background-color: #D3D3D3"; readonly id="Status" value="<?=  $model['Status']; ?>" >  
            

            </div>
        </td>
       
        
    </tr>

    </table>

     <table class="table striped hovered" id="dataTables-1">
                <thead>
                <tr>
                    <th class="text-left" width="30%">Participant Name</th>

                    <th class="text-left" width="30%">Designation</th>

                    <th class="text-left" width="30%">Need Source</th>
                    <!-- <th class="text-left" width="50%">Description</th> -->

                </tr>
                </thead>

                <tbody>
                </tbody>
            </table>

<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    <?= Html::a('Cancel', ['index'], ['class' => 'button']) ?>
    <div class="pure-u-1"></div>
<?php Html::endForm(); ?>
<div class="pure-u-1"></div>
    
    

    

    

    

    

    