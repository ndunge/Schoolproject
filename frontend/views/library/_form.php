<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Library */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'Subject')->textInput() ?>

    <?= $form->field($model, 'Title')->textInput() ?>

    <?= $form->field($model, 'ISBN')->textInput() ?>

    <?= $form->field($model, 'Author')->textInput() ?>

    <?= $form->field($model, 'Call Number')->textInput() ?>

    <?= $form->field($model, 'Publisher')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
