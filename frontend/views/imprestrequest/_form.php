<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Imprestrequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imprestrequest-form">

    <?php $form = ActiveForm::begin(); ?>
    <form id="data_form" method="POST">
    <div class="grid">
     <div class="row cells3">
            <div class="cell">
                <label for="No_">No_</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_">
                </div>
            </div>

            <div class="cell">
    
                <label for="Request Date">Request Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Request Date">
                </div>
            </div>

            <div class="cell">
                <label for="Trip No">Trip No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Trip No">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Employee No">Employee No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee No">
                </div>
            </div>

            <div class="cell">
    
                <label for="Employee Name">Employee Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee Name">
                </div>
            </div>

            <div class="cell">
                <label for="Trip Start Date">Trip Start Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Trip Start Date">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Trip Expected End Date">Trip Expected End Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Trip Expected End Date">
                </div>
            </div>

            <div class="cell">
    
                <label for="No_ of Days">No_ of Days</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_ of Days">
                </div>
            </div>

            <div class="cell">
                <label for="Global Dimension 1 Code">Global Dimension 1 Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Global Dimension 1 Code">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Deadline for Imprest Return">Deadline for Imprest Return</label>
                <div class="input-control text full-size">
                    <input type="text" name="Deadline for Imprest Return">
                </div>
            </div>

            <div class="cell">
    
                <label for="Status">Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Status">
                </div>
            </div>

            <div class="cell">
                <label for="Type">Type</label>
                <div class="input-control text full-size">
                    <input type="text" name="Type">
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
    <?//= $form->field($model, 'No_ Series')->textInput() ?>

    

    

    <?//= $form->field($model, 'Type')->textInput() ?>

    <?//= $form->field($model, 'User ID')->textInput() ?>

    <?//= $form->field($model, 'Bank Account')->textInput() ?>

    <?//= $form->field($model, 'Global Dimension 2 Code')->textInput() ?>

    <?//= $form->field($model, 'Transaction Type')->textInput() ?>

    <?//= $form->field($model, 'Customer A_C')->textInput() ?>

    <?//= $form->field($model, 'Country')->textInput() ?>

    <?//= $form->field($model, 'City')->textInput() ?>

    <?//= $form->field($model, 'Job Group')->textInput() ?>

    <?//= $form->field($model, 'Imprest_Advance No')->textInput() ?>

    <?//= $form->field($model, 'Posted')->textInput() ?>

    <?//= $form->field($model, 'Applies-to Doc_ No_')->textInput() ?>

    <?//= $form->field($model, 'Imprest Amount')->textInput() ?>

    <?//= $form->field($model, 'CBK Website Address')->textInput() ?>

    <?//= $form->field($model, 'Surrendered')->textInput() ?>

    <?//= $form->field($model, 'Receipt Created')->textInput() ?>

    <?//= $form->field($model, 'Cheque No')->textInput() ?>

    <?//= $form->field($model, 'Language Code (Default)')->textInput() ?>

    <?//= $form->field($model, 'Attachement')->textInput() ?>

    <?//= $form->field($model, 'External Application')->textInput() ?>

    <?//= $form->field($model, 'Employee_Commissioner')->textInput() ?>

    <?//= $form->field($model, 'Archived')->textInput() ?>

    <?//= $form->field($model, 'Select')->textInput() ?>

    <?//= $form->field($model, 'Recover from Payroll')->textInput() ?>

    <?//= $form->field($model, 'Transferred to Payroll')->textInput() ?>

    <?//= $form->field($model, 'Request Type')->textInput() ?>

    <?//= $form->field($model, 'Request No')->textInput() ?>

    -->

    
