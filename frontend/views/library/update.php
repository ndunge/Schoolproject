<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Library */

$this->title = 'Update Library: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'id' => $model->Subject]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
