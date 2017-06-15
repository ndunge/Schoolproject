<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customerelationship */

//$this->title = $model->CaseID;
$this->params['breadcrumbs'][] = ['label' => 'Customerelationships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customerelationship-view">

   

    <p>
        <?= Html::a('Respond', ['respond', 'id' => $model->CaseID], ['class' => 'button primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CaseID], [
            'class' => 'button danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table width="100%" border="0" cellspacing="0" cellpadding="3">
        <tr>
        <td>
            <label><b>Description</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Description']; ?>" disabled>          
            </div>
        </td>

        <td>
            <label><b>Suggestion</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Suggestion']; ?>" disabled>          
            </div>
        </td>
    </tr>

    <tr>
        

        <td>
            <label><b>Status</b></label>
            <div class="input-control text full-size">                      
                <input type="text" value="<?= $model['Status']; ?>" disabled>          
            </div>
        </td>
    </tr>

</table>

   
</div>
