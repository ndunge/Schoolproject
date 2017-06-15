<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Trainingrequest */

$this->title = 'Create Trainingrequest';
$this->params['breadcrumbs'][] = ['label' => 'Trainingrequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingrequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
