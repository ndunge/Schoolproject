<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Leaveapplication */

$this->title = 'Update Leave Application: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Leaveapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model['Application No']]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="leaveapplication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'Leavetypes' => $Leavetypes,
         'employeeDetails' => $employeeDetails,
         'nextLeaveNo' => $nextLeaveNo,
        
    ]) ?>

</div>
