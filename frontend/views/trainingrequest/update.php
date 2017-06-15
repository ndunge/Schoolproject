<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trainingrequest */

$this->title = 'Update Trainingrequest: ' . $model->Request No_;
$this->params['breadcrumbs'][] = ['label' => 'Trainingrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Request No_, 'url' => ['view', 'id' => $model->Request No_]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trainingrequest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
