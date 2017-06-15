<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customerelationship */

$this->title = $model->CategoryID;
$this->params['breadcrumbs'][] = ['label' => 'Customerelationships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customerelationship-review">

   

    <p>
        
       
         <?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
    </p>

     <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
        <td>
            <label><b>Reference</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['CaseID']; ?>" disabled>          
            </div>
        </td>      

        
    </tr>

    <tr>
         <td>
            <label><b>Category</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model->category->Label; ?>" disabled>          
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <label><b>Case Description</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Description']; ?>" disabled>          
            </div>
        </td>
    </tr>

     <tr>
        <td>
            <label><b>Suggestion</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Suggestion']; ?>" disabled>          
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <table>
                <thead>
                    <tr>
                        <td> 

                         <label><b>Resolution</b></label>   

                        </td>
                    </tr>
                </thead>
                <?php foreach ($model->resolutions as $key => $value): ?>
                    <tr>
                        
                        <td> <div class="input-control text full-size"> <input value=" <?= $value['Description']; ?>" disabled> </div> </td>
                    </tr>  
                <?php endforeach ?>
            </table>
        </td>
    </tr>
    

</table>

   

</div>
