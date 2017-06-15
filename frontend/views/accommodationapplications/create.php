<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Accommodationapplications */

$this->title = 'Create Accommodation Applications';
$this->params['breadcrumbs'][] = ['label' => 'Accommodationapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accommodationapplications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
