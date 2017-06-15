<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Timetable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'Programme')->textInput() ?>

    <?= $form->field($model, 'Stage')->textInput() ?>

    <?= $form->field($model, 'Unit')->textInput() ?>

    <?= $form->field($model, 'Semester')->textInput() ?>

    <?= $form->field($model, 'Period')->textInput() ?>

    <?= $form->field($model, 'Day of Week')->textInput() ?>

    <?= $form->field($model, 'Lecture Room')->textInput() ?>

    <?= $form->field($model, 'Class')->textInput() ?>

    <?= $form->field($model, 'Unit Class')->textInput() ?>

    <?= $form->field($model, 'Exam')->textInput() ?>

    <?= $form->field($model, 'Released')->textInput() ?>

    <?= $form->field($model, 'No_ Of Hours')->textInput() ?>

    <?= $form->field($model, 'Lecturer')->textInput() ?>

    <?= $form->field($model, 'Exam Date')->textInput() ?>

    <?= $form->field($model, 'Full Time_Part Time')->textInput() ?>

    <?= $form->field($model, 'Department')->textInput() ?>

    <?= $form->field($model, 'Programme Option')->textInput() ?>

    <?= $form->field($model, 'Room Type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
