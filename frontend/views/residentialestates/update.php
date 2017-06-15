<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Residentialestates */

$this->title = 'Update Residentialestates: ' . $model->Code;
$this->params['breadcrumbs'][] = ['label' => 'Residentialestates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Code, 'url' => ['view', 'id' => $model->Code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="residentialestates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
