<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Loanapplications */

$this->title = 'Update Loanapplications: ' . $model->Loan No;
$this->params['breadcrumbs'][] = ['label' => 'Loanapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Loan No, 'url' => ['view', 'Loan No' => $model->Loan No, 'Loan Product Type' => $model->Loan Product Type]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loanapplications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
