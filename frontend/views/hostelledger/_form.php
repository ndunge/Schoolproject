<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hostelledger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hostelledger-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'Space No')->textInput() ?>

    <?= $form->field($model, 'Room No')->textInput() ?>

    <?= $form->field($model, 'Hostel No')->textInput() ?>

    <?= $form->field($model, 'No')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Room Cost')->textInput() ?>

    <?= $form->field($model, 'Student No')->textInput() ?>

    <?= $form->field($model, 'Receipt No')->textInput() ?>

    <?= $form->field($model, 'Booked')->textInput() ?>

    <?= $form->field($model, 'Items Assigned')->textInput() ?>

    <?= $form->field($model, 'Date Assigned')->textInput() ?>

    <?= $form->field($model, 'Items Returned')->textInput() ?>

    <?= $form->field($model, 'Date Returned')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
