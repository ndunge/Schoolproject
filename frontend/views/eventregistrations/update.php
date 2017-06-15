<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Eventregistrations */

$this->title = 'Update Eventregistrations: ' . $model->Event Registration No;
$this->params['breadcrumbs'][] = ['label' => 'Eventregistrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Event Registration No, 'url' => ['view', 'id' => $model->Event Registration No]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventregistrations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
