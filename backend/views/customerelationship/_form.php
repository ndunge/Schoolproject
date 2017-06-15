<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customerelationship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customerelationship-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CaseID')->textInput() ?>

    <?= $form->field($model, 'CategoryID')->textInput() ?>

    <?= $form->field($model, 'Description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
