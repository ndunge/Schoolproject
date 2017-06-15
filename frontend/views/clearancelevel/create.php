<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Clearancelevel */

$this->title = 'Create Clearancelevel';
$this->params['breadcrumbs'][] = ['label' => 'Clearancelevels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearancelevel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
