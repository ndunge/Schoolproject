<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hostelcard */

$this->title = 'Create Hostelcard';
$this->params['breadcrumbs'][] = ['label' => 'Hostelcards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hostelcard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
