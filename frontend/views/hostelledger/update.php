<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Hostelledger */

$this->title = 'Update Hostelledger: ' . $model->Hostel No;
$this->params['breadcrumbs'][] = ['label' => 'Hostelledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Hostel No, 'url' => ['view', 'Hostel No' => $model->Hostel No, 'Room No' => $model->Room No, 'Space No' => $model->Space No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hostelledger-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
