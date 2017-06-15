<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Roomsassignment */

$this->title = 'Create Roomsassignment';
$this->params['breadcrumbs'][] = ['label' => 'Roomsassignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roomsassignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
