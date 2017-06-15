<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Loanapplications */

$this->title = 'Create Loan Applications';
$this->params['breadcrumbs'][] = ['label' => 'Loanapplications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loanapplications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'employeeDetails' => $employeeDetails,
        'nextLaonNo' => $nextLoanNo,
    ]) ?>

</div>
