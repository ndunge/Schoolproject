<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Eventsession */

$this->title = 'Create Eventsession';
$this->params['breadcrumbs'][] = ['label' => 'Eventsessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventsession-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
