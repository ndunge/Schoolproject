<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Eventsession */

$this->title = 'Update Eventsession: ' . $model->Event ID;
$this->params['breadcrumbs'][] = ['label' => 'Eventsessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Event ID, 'url' => ['view', 'Event ID' => $model->Event ID, 'Line No_' => $model->Line No_]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventsession-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
