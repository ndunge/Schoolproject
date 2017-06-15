<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Submission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="submission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'AssignmentSubmissionID')->textInput() ?>

    <?= $form->field($model, 'ProfileID')->textInput() ?>

    <?= $form->field($model, 'CreatedDate')->textInput() ?>

    <?= $form->field($model, 'SubmissionDate')->textInput() ?>

    <?= $form->field($model, 'AssignmentID')->textInput() ?>

    <?= $form->field($model, 'AssignmentStatusID')->textInput() ?>

    <?= $form->field($model, 'Submitted')->textInput() ?>

    <?= $form->field($model, 'Marks')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
