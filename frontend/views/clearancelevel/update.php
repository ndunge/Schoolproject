<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Clearancelevel */

$this->title = 'Update Clearancelevel: ' . $model->Clearance Level Code;
$this->params['breadcrumbs'][] = ['label' => 'Clearancelevels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Clearance Level Code, 'url' => ['view', 'id' => $model->Clearance Level Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clearancelevel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
