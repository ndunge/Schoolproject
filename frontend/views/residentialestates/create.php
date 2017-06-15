<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Residentialestates */

$this->title = 'Create Residentialestates';
$this->params['breadcrumbs'][] = ['label' => 'Residentialestates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residentialestates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
