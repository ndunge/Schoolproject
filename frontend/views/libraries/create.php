<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Libraries */

$this->title = 'Create Libraries';
$this->params['breadcrumbs'][] = ['label' => 'Libraries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libraries-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
