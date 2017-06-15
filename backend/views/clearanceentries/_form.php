<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Clearanceentries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clearanceentries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'Clearance Level Code')->textInput() ?>

    <?= $form->field($model, 'Department')->textInput() ?>

    <?= $form->field($model, 'Student ID')->textInput() ?>

    <?= $form->field($model, 'Clear By ID')->textInput() ?>

    <?= $form->field($model, 'Initiated By')->textInput() ?>

    <?= $form->field($model, 'Initiated Date')->textInput() ?>

    <?= $form->field($model, 'Initiated Time')->textInput() ?>

    <?= $form->field($model, 'Last Date Modified')->textInput() ?>

    <?= $form->field($model, 'Last Time Modified')->textInput() ?>

    <?= $form->field($model, 'Student Intake')->textInput() ?>

    <?= $form->field($model, 'Cleared')->textInput() ?>

    <?= $form->field($model, 'Priority Level')->textInput() ?>

    <?= $form->field($model, 'Academic Year')->textInput() ?>

    <?= $form->field($model, 'Semester')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
