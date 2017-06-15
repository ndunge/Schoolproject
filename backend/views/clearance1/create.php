<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Clearance1 */

//$this->title = 'Create Clearance1';
$this->params['breadcrumbs'][] = ['label' => 'Clearance1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clearance1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
