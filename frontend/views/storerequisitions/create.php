<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Storerequisitions */

$this->title = 'Create Storerequisitions';
$this->params['breadcrumbs'][] = ['label' => 'Storerequisitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storerequisitions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
