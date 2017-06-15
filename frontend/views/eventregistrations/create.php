<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Eventregistrations */

$this->title = 'Create Eventregistrations';
$this->params['breadcrumbs'][] = ['label' => 'Eventregistrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventregistrations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
