<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Imprestrequest */

$this->title = 'Create Imprest Request';
$this->params['breadcrumbs'][] = ['label' => 'Imprestrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imprestrequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2' =>$model2,
         'employeeDetails' => $employeeDetails,
         'nextImprestNo'=>$nextImprestNo,
         'json'=> $json,
        
        
        
        
    ]) ?>

</div>
