<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Employees;
use common\models\Requisitionlines;

/* @var $this yii\web\View */
/* @var $model common\models\Purchaserequisition */
// print_r( $model);
//         exit;
//$this->title = $model['No_'];
$this->params['breadcrumbs'][] = ['label' => 'Purchaserequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one();
?>


<div class="purchaserequisition-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model['No_']], ['class' => 'button primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['No_']], [
            'class' => 'button danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
    </p>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
     <tr>
          <td>
            <label>No</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['No_']; ?>" disabled>          
            </div>
           
           </td>

            <td>
            <label>Employee No</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $employeeDetails['No_'] ?>" disabled>           
            </div>
            </td>

     </tr> 

     <tr>
          <td>
            <label>Employee Name</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $employeeDetails['First Name'].' '.$employeeDetails['Middle Name'].' '.$employeeDetails['Last Name'] ?>" disabled>          
            </div>
        </td>  

            <td>
            <label>Reason</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Reason']; ?>" disabled>          
            </div>
            </td>

     </tr>

      <tr>
          <td>
            <label>Requisition Date</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Requisition Date']; ?>" disabled>          
            </div>
        </td>  

            <td>
            <label>Status</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Status']; ?>" disabled>          
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
                    <th class="text-left" width="50%">Description</th>
                    <th class="text-left" width="10%">Quantity</th>               
                    <th class="text-left" width="10%" >Unit Price</th>
                    <th class="text-left" width="20%">Amount</th>
                </tr>

                </thead>

                <tbody>
                <?php 
                foreach ($model['requisitionlines'] as $key => $value) {
                  extract($value);
                  ?>
<tr>
          <td>
            
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $Type; ?>" disabled>          
            </div>
           
           </td>

            <td>
            
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $No; ?>" disabled>           
            </div>
            </td>
            <td>
            
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $Description; ?>" disabled>           
            </div>
            </td>
            <td>
            
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $Quantity; ?>" disabled>           
            </div>
            </td>
            <td>
            
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $Amount; ?>" disabled>           
            </div>
            </td>

     </tr> 
                  <?php 
                }
                ?>
                
                </tbody>

                <tfoot>
                <tr>
                    <th colspan="4">&nbsp;</th>
                </tr>
                </tfoot>
                  
            </table>  

   

</div>
