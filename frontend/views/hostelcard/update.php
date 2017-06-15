<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hostelcard */

$this->title = 'Update Hostelcard: ' . $model->Hostel No;
$this->params['breadcrumbs'][] = ['label' => 'Hostelcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Hostel No, 'url' => ['view', 'id' => $model->Hostel No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hostelcard-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
