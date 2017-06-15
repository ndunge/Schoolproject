<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Clearanceentries */

$this->title = 'Create Clearance Entries';
$this->params['breadcrumbs'][] = ['label' => 'Clearanceentries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearanceentries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
