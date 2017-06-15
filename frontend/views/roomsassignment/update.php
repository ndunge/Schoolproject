<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Roomsassignment */

$this->title = 'Update Roomsassignment: ' . $model->Code;
$this->params['breadcrumbs'][] = ['label' => 'Roomsassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Code, 'url' => ['view', 'id' => $model->Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="roomsassignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
