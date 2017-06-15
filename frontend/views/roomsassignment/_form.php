<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Roomsassignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roomsassignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <form id="data_form" method="POST">
    <div class="grid">

    <div class="row cells3">
            <div class="cell">
                <label for="Code">Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Code">
                </div>
            </div>

            <div class="cell">
                <label for="Room No">Room No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Room No">
                </div>
            </div>

            <div class="cell">
                <label for="Remarks">Remarks</label>
                <div class="input-control text full-size">
                    <input type="text" name="Remarks">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Customer">Customer</label>
                <div class="input-control text full-size">
                    <input type="text" name="Customer">
                </div>
            </div>

            <div class="cell">
                <label for="Room Type">Room Type</label>
                <div class="input-control text full-size">
                    <input type="text" name="Room Type">
                </div>
            </div>

            <div class="cell">
                <label for="Rate">Rate</label>
                <div class="input-control text full-size">
                    <input type="text" name="Rate">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Billed">Billed</label>
                <div class="input-control text full-size">
                    <input type="text" name="Billed">
                </div>
            </div>

            <div class="cell">
                <label for="Billed Date">Billed Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Billed Date">
                </div>
            </div>

            <div class="cell">
                <label for="Room Status">Room Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Room Status">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Booked Date">Booked Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Booked Date">
                </div>
            </div>

            <div class="cell">
                <label for="Check Out Date">Check Out Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Check Out Date">
                </div>
            </div>

            <div class="cell">
                <label for="Pax">Pax</label>
                <div class="input-control text full-size">
                    <input type="text" name="Pax">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Total Amount">Total Amount</label>
                <div class="input-control text full-size">
                    <input type="text" name="Total Amount">
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


    

    

    

    

    

    

    

    

    

    

    

    

   