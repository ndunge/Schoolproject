<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Hostelcard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hostelcard-form">

    <?php $form = ActiveForm::begin(); ?>

    <form id="data_form" method="POST">
    <div class="grid">
        <div class="row cells3">
            <div class="cell">
                <label for="Hostel No">Hostel No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Hostel No">
                </div>
            </div>

            <div class="cell">
                <label for="Description<">Description</label>
                <div class="input-control text full-size">
                    <input type="text" name="Description">
                </div>
            </div>

            <div class="cell">
                <label for="Asset No">Asset No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Asset No">
                </div>
            </div>


        </div>
        
         <div class="row cells3">
            <div class="cell">
                <label for="Space Per Room">Space Per Room</label>
                <div class="input-control text full-size">
                    <input type="text" name="Space Per Room">
                </div>
            </div>

            <div class="cell">
                <label for="Cost per Occupant">Cost per Occupant</label>
                <div class="input-control text full-size">
                    <input type="text" name="Cost per Occupant">
                </div>
            </div>

            <div class="cell">
                <label for="Gender">Gender</label>
                <div class="input-control text full-size">
                    <input type="text" name="Gender">
                </div>
            </div>

        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Location">Location</label>
                <div class="input-control text full-size">
                    <input type="text" name="Location">
                </div>
            </div>

            <div class="cell">
                <label for="Programme">Programme</label>
                <div class="input-control text full-size">
                    <input type="text" name="Programme">
                </div>
            </div>

            <div class="cell">
                <label for="Cost per Room">Cost per Room</label>
                <div class="input-control text full-size">
                    <input type="text" name="Cost per Room">
                </div>
            </div>

        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Room Prefix">Room Prefix</label>
                <div class="input-control text full-size">
                    <input type="text" name="Room Prefix">
                </div>
            </div>

            <div class="cell">
                <label for="Minimum Balance">Minimum Balance</label>
                <div class="input-control text full-size">
                    <input type="text" name="Minimum Balance">
                </div>
            </div>

            <div class="cell">
                <label for="Starting No">Starting No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Starting No">
                </div>
            </div>

        </div>


         <div class="row cells3">
            <div class="cell">
                <label for="Total Rooms">Total Rooms</label>
                <div class="input-control text full-size">
                    <input type="text" name="Total Rooms">
                </div>
            </div>

            <div class="cell">
                <label for="Building Contact">Building Contact</label>
                <div class="input-control text full-size">
                    <input type="text" name="Building Contact">
                </div>
            </div>

            <div class="cell">
                <label for="Contact Phone">Contact Phone</label>
                <div class="input-control text full-size">
                    <input type="text" name="Contact Phone">
                </div>
            </div>

        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Contact Email">Contact Email</label>
                <div class="input-control text full-size">
                    <input type="text" name="Contact Email">
                </div>
            </div>

            <div class="cell">
                <label for="Contact Extension">Contact Extension</label>
                <div class="input-control text full-size">
                    <input type="text" name="Contact Extension">
                </div>
            </div>

            <div class="cell">
                <label for="Contact Telephone">Contact Telephone</label>
                <div class="input-control text full-size">
                    <input type="text" name="Contact Telephone">
                </div>
            </div>

        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Ownership">Ownership</label>
                <div class="input-control text full-size">
                    <input type="text" name="Ownership">
                </div>
            </div>

            <div class="cell">
                <label for="Building Type">Building Type</label>
                <div class="input-control text full-size">
                    <input type="text" name="Building Type">
                </div>
            </div>

            <div class="cell">
                <label for="Hostel Status">Hostel Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Hostel Status">
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

