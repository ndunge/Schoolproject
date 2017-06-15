<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Loanapplications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loanapplications-form">

    
    <?php $form = ActiveForm::begin(); ?>

    <form id="data_form" method="POST">
    <div class="grid">

    <div class="row cells3">
            <div class="cell">
                <label for="Loan No">Loan No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Loan No">
                </div>
            </div>

            <div class="cell">
                <label for="Loan Product Type">Loan Product Type</label>
                <div class="input-control text full-size">
                    <input type="text" name="Loan Product Type">
                </div>
            </div>

            <div class="cell">
                <label for="Application Date">Application Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Application Date">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Amount Requested">Amount Requested</label>
                <div class="input-control text full-size">
                    <input type="text" name="Amount Requested">
                </div>
            </div>

            <div class="cell">
                <label for="Approved Amount">Approved Amount</label>
                <div class="input-control text full-size">
                    <input type="text" name="Approved Amount">
                </div>
            </div>

            <div class="cell">
                <label for="Loan Status">Loan Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Loan Status">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Issued Date">Issued Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Issued Date">
                </div>
            </div>

            <div class="cell">
                <label for="Instalment">Instalment</label>
                <div class="input-control text full-size">
                    <input type="text" name="Instalment">
                </div>
            </div>

            <div class="cell">
                <label for="Repayment">Repayment</label>
                <div class="input-control text full-size">
                    <input type="text" name="Repayment">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Flat Rate Principal">Flat Rate Principal</label>
                <div class="input-control text full-size">
                    <input type="text" name="Flat Rate Principal">
                </div>
            </div>

            <div class="cell">
                <label for="Flat Rate Interest">Flat Rate Interest</label>
                <div class="input-control text full-size">
                    <input type="text" name="Flat Rate Interest">
                </div>
            </div>

            <div class="cell">
                <label for="Interest Rate">Interest Rate</label>
                <div class="input-control text full-size">
                    <input type="text" name="Interest Rate">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Interest Calculation Method">Interest Calculation Method</label>
                <div class="input-control text full-size">
                    <input type="text" name="Interest Calculation Method">
                </div>
            </div>

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


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Interest Calculation Method">Interest Calculation Method</label>
                <div class="input-control text full-size">
                    <input type="text" name="Interest Calculation Method">
                </div>
            </div>

            <div class="cell">
                <label for="Payroll Group">Payroll Group</label>
                <div class="input-control text full-size">
                    <input type="text" name="Payroll Group">
                </div>
            </div>

            <div class="cell">
                <label for="Description">Description</label>
                <div class="input-control text full-size">
                    <input type="text" name="Description">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Opening Loan">Opening Loan</label>
                <div class="input-control text full-size">
                    <input type="text" name="Opening Loan">
                </div>
            </div>

            <div class="cell">
                <label for="Interest">Interest</label>
                <div class="input-control text full-size">
                    <input type="text" name="Interest">
                </div>
            </div>

            <div class="cell">
                <label for="Interest Imported">Interest Imported</label>
                <div class="input-control text full-size">
                    <input type="text" name="Interest Imported">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="principal imported">principal imported</label>
                <div class="input-control text full-size">
                    <input type="text" name="principal imported">
                </div>
            </div>

            <div class="cell">
                <label for="Interest Rate Per">Interest Rate Per</label>
                <div class="input-control text full-size">
                    <input type="text" name="Interest Rate Per">
                </div>
            </div>

            <div class="cell">
                <label for="Reference No">Reference No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Reference No">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="principal imported">principal imported</label>
                <div class="input-control text full-size">
                    <input type="text" name="principal imported">
                </div>
            </div>

            <div class="cell">
                <label for="HELB No_ ">HELB No_</label>
                <div class="input-control text full-size">
                    <input type="text" name="HELB No_">
                </div>
            </div>

            <div class="cell">
                <label for="University Name">University Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="University Name">
                </div>
            </div>


        </div>

</div>
</form>

 
       <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    

    

    

    

    

    

    

    

    


    

    

    

    

    

    

    

    

    

    

    

    

    

    

