<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Clearance */

//$this->title = 'HOD Clearance';
$this->params['breadcrumbs'][] = ['label' => 'Clearances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'nextClearanceNo' => $nextClearanceNo,
        'studentDetails' => $studentDetails,

        

    ]) ?>

</div>
