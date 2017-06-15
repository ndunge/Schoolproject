<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Eventsession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventsession-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'Event ID')->textInput() ?>

    <?= $form->field($model, 'Line No_')->textInput() ?>

    <?= $form->field($model, 'StartTime')->textInput() ?>

    <?= $form->field($model, 'EndTime')->textInput() ?>

    <?= $form->field($model, 'Venue')->textInput() ?>

    <?= $form->field($model, 'FacilitatorType')->textInput() ?>

    <?= $form->field($model, 'Facilitator')->textInput() ?>

    <?= $form->field($model, 'No_ Series')->textInput() ?>

    <?= $form->field($model, 'Base Calendar')->textInput() ?>

    <?= $form->field($model, 'Date')->textInput() ?>

    <?= $form->field($model, 'Description')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
