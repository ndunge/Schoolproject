<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Storerequisitions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="storerequisitions-form">

    <?php $form = ActiveForm::begin(); ?>
    <form id="data_form" method="POST">
    <div class="grid">
    <div class="row cells3">
            <div class="cell">
                <label for="No">No_</label>
                <div class="input-control text full-size">
                    <input type="text" name="No">
                </div>
            </div>

            <div class="cell">
                <label for="Employee Code">Employee Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee Code">
                </div>
            </div>

            <div class="cell">
                <label for="Employee Name">Employee Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee Name">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Reason">Reason</label>
                <div class="input-control text full-size">
                    <input type="text" name="Reason">
                </div>
            </div>

            <div class="cell">
                <label for="Requisition Date">Requisition Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Requisition Date">
                </div>
            </div>

            <div class="cell">
                <label for="Status">Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Status">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Raised by">Raised by</label>
                <div class="input-control text full-size">
                    <input type="text" name="Raised by">
                </div>
            </div>

            <div class="cell">
                <label for="Requisition Date">Requisition Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Requisition Date">
                </div>
            </div>

            <div class="cell">
                <label for="Status">Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Status">
                </div>
            </div>


        </div>


</div>
<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</form>

    

   <!--
    <?//= $form->field($model, 'Purchase?')->textInput() ?>

    <?//= $form->field($model, 'MA Approval')->textInput() ?>

    <?//= $form->field($model, 'Rejected')->textInput() ?>

    <?//= $form->field($model, 'Process Type')->textInput() ?>

    <?//= $form->field($model, 'Global Dimension 1 Code')->textInput() ?>

    <?//= $form->field($model, 'Ordered')->textInput() ?>

    <?//= $form->field($model, 'User')->textInput() ?>

    <?//= $form->field($model, 'Global Dimension 2 Code')->textInput() ?>

    <?//= $form->field($model, 'Global Dimension 3 Code')->textInput() ?>

    <?//= $form->field($model, 'Procurement Plan')->textInput() ?>

    <?//= $form->field($model, 'Purchaser Code')->textInput() ?>

    <?//= $form->field($model, 'Document Type')->textInput() ?>

    <?//= $form->field($model, 'Currency Code')->textInput() ?>

    <?//= $form->field($model, 'Date of Use')->textInput() ?>

    <?//= $form->field($model, 'Requisition Type')->textInput() ?>

    <?//= $form->field($model, 'Posted')->textInput() ?>

    <?//= $form->field($model, 'Global Dimension 4 Code')->textInput() ?>

    <?//= $form->field($model, 'Purchase Type')->textInput() ?>

    <?//= $form->field($model, 'Language Code (Default)')->textInput() ?>

    <?//= $form->field($model, 'Attachment')->textInput() ?>

    <?//= $form->field($model, 'Posted By')->textInput() ?>

    <?//= $form->field($model, 'Date Posted')->textInput() ?>

    <?//= $form->field($model, 'Issued')->textInput() ?>

    <?//= $form->field($model, 'Issued By')->textInput() ?>

    <?//= $form->field($model, 'Received')->textInput() ?>

    <?//= $form->field($model, 'Received By')->textInput() ?>

    <?//= $form->field($model, 'Date Issued')->textInput() ?>

    <?//= $form->field($model, 'Date Received')->textInput() ?>

