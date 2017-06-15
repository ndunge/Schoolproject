<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Hostelledger */

$this->title = 'Create Hostelledger';
$this->params['breadcrumbs'][] = ['label' => 'Hostelledgers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hostelledger-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
