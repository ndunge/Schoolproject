<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model common\models\Leaveapplication */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Leaveapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="leaveapplication-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model['Application No']], ['class' => 'button primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['Application No']], [
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
            <label>Leave Application No</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Application No']; ?>" disabled>          
            </div>
        </td>
        <td>
            <label>Leave Type</label>
            <div class="input-control text full-size"> 
            <?php 
            $message='';
            if($model['Leave Code']=='001')
            {
                $message='Annual';
            }
             if($model['Leave Code']=='002')
            {
                $message='Maternity';
            }
               if($model['Leave Code']=='003')
            {
                $message='Partenity';
            }
               if($model['Leave Code']=='004')
            {
                $message='Sick';
            }
            ?>                     
                <input type="text" value="<?php echo $message ?>"  disabled>          
            </div>
        </td>   
    </tr>

   
  <tr>
        <td>
            <label>Employee No</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Employee No']; ?>" disabled>          
            </div>
        </td>
        <td>
            <label>Employee Name</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Employee Name']; ?>" disabled>          
            </div>
        </td>   
    </tr>

     <tr>
        <td>
            <label>Days Applied</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Days Applied']; ?>" disabled>          
            </div>
        </td>
        <td>
            <label>Start Date</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Start Date']; ?>" disabled>          
            </div>
        </td>   
    </tr>

    <tr>
        <td>
            <label>End Date</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['End Date']; ?>" disabled>          
            </div>
        </td>
        <td>
            <label>Application Date</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Application Date']; ?>" disabled>          
            </div>
        </td>   
    </tr>
    <tr>
        <td>
            <label>Resumption Date</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Resumption Date']; ?>" disabled>          
            </div>
        </td>
        <td>
            <label>Leave balance</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Leave balance']; ?>" disabled>          
            </div>
        </td>   
    </tr>
    <tr>
        <td>
            <label>Leave Entitlement</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Leave Entitlment']; ?>" disabled>          
            </div>
        </td>
        <td>
            <label>Department Name</label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Department Name']; ?>" disabled>          
            </div>
        </td>   
    </tr>
    </table>

    

</div>
