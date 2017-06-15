<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Trainingrequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trainingrequest-form">

    <?php $form = ActiveForm::begin(); ?>
     <form id="data_form" method="POST">
    <div class="grid">
     <div class="row cells3">
            <div class="cell">
                <label for="Request No_">Request No_</label>
                <div class="input-control text full-size">
                    <input type="text" name="Request No_">
                </div>
            </div>

            <div class="cell">
                <label for="Request Date">Request Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Request Date">
                </div>
            </div>

            <div class="cell">
                <label for="Employee No">Employee No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee No">
                </div>
            </div>


        </div>


     <div class="row cells3">
            <div class="cell">
                <label for="Employee Name">Employee Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee Name">
                </div>
            </div>

            <div class="cell">
                <label for="No_ Series">No_ Series</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_ Series">
                </div>
            </div>

            <div class="cell">
                <label for="Department Code">Department Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Department Code">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Status">Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Status">
                </div>
            </div>

            <div class="cell">
                <label for="No_ Series">No_ Series</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_ Series">
                </div>
            </div>

            <div class="cell">
                <label for="Designation">Designation</label>
                <div class="input-control text full-size">
                    <input type="text" name="Designation">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Period">Period</label>
                <div class="input-control text full-size">
                    <input type="text" name="Period">
                </div>
            </div>

            <div class="cell">
                <label for="No_ Of Days">No_ Of Days</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_ Of Days">
                </div>
            </div>

            <div class="cell">
                <label for="Training Insitution">Training Insitution</label>
                <div class="input-control text full-size">
                    <input type="text" name="Training Insitution">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Venue">Venue</label>
                <div class="input-control text full-size">
                    <input type="text" name="Venue">
                </div>
            </div>

            <div class="cell">
                <label for="Tuition Fee">Tuition Fee</label>
                <div class="input-control text full-size">
                    <input type="text" name="Tuition Fee">
                </div>
            </div>

            <div class="cell">
                <label for="Per Diem">Per Diem</label>
                <div class="input-control text full-size">
                    <input type="text" name="Per Diem">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Air Ticket">Air Ticket</label>
                <div class="input-control text full-size">
                    <input type="text" name="Air Ticket">
                </div>
            </div>

            <div class="cell">
                <label for="Total Cost">Total Cost</label>
                <div class="input-control text full-size">
                    <input type="text" name="Total Cost">
                </div>
            </div>

            <div class="cell">
                <label for="Course Title">Course Title</label>
                <div class="input-control text full-size">
                    <input type="text" name="Course Title">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Description">Description</label>
                <div class="input-control text full-size">
                    <input type="text" name="Description">
                </div>
            </div>

            <div class="cell">
                <label for="Planned Start Date">Planned Start Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Planned Start Date">
                </div>
            </div>

            <div class="cell">
                <label for="Planned End Date">Planned End Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Planned End Date">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Country Code">Country Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Country Code">
                </div>
            </div>

            <div class="cell">
                <label for="CBK Website Address">CBK Website Address</label>
                <div class="input-control text full-size">
                    <input type="text" name="CBK Website Address">
                </div>
            </div>

            <div class="cell">
                <label for="Exchange Rate">Exchange Rate</label>
                <div class="input-control text full-size">
                    <input type="text" name="Exchange Rate">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Total Cost (LCY)">Total Cost (LCY)</label>
                <div class="input-control text full-size">
                    <input type="text" name="Total Cost (LCY)">
                </div>
            </div>

            <div class="cell">
                <label for="Currency">Currency</label>
                <div class="input-control text full-size">
                    <input type="text" name="Currency">
                </div>
            </div>

            <div class="cell">
                <label for="GL Account">GL Account</label>
                <div class="input-control text full-size">
                    <input type="text" name="GL Account">
                </div>
            </div>


        </div>


        <div class="row cells3">
            <div class="cell">
                <label for="Budget Name">Budget Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Budget Name">
                </div>
            </div>

            <div class="cell">
                <label for="Available Funds">Available Funds</label>
                <div class="input-control text full-size">
                    <input type="text" name="Available Funds">
                </div>
            </div>

            <div class="cell">
                <label for="Need Source">Need Source</label>
                <div class="input-control text full-size">
                    <input type="text" name="Need Source">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Training Objective">Training Objective</label>
                <div class="input-control text full-size">
                    <input type="text" name="Training Objective">
                </div>
            </div>

            <div class="cell">
                <label for="User ID">User ID</label>
                <div class="input-control text full-size">
                    <input type="text" name="User ID">
                </div>
            </div>

            <div class="cell">
                <label for="Commisioner No">Commisioner No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Commisioner No">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Commissioner Name">Commissioner Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Commissioner Name">
                </div>
            </div>

            <div class="cell">
                <label for="Commissioner">Commissioner</label>
                <div class="input-control text full-size">
                    <input type="text" name="Commissioner">
                </div>
            </div>

            <div class="cell">
                <label for="Source of Funding">Source of Funding</label>
                <div class="input-control text full-size">
                    <input type="text" name="Source of Funding">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Variance">Variance</label>
                <div class="input-control text full-size">
                    <input type="text" name="Variance">
                </div>
            </div>

            <div class="cell">
                <label for="Group or Individual">Group or Individual</label>
                <div class="input-control text full-size">
                    <input type="text" name="Group or Individual">
                </div>
            </div>

            <div class="cell">
                <label for="Sessions">Sessions</label>
                <div class="input-control text full-size">
                    <input type="text" name="Sessions">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Remarks">Remarks</label>
                <div class="input-control text full-size">
                    <input type="text" name="Remarks">
                </div>
            </div>

            <div class="cell">
                <label for="Local or Abroad">Local or Abroad</label>
                <div class="input-control text full-size">
                    <input type="text" name="Local or Abroad">
                </div>
            </div>

            <div class="cell">
                <label for="Directorate">Directorate</label>
                <div class="input-control text full-size">
                    <input type="text" name="Directorate">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Department Name">Department Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Department Name">
                </div>
            </div>

            <div class="cell">
                <label for="Directorate Name">Directorate Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Directorate Name">
                </div>
            </div>

            <div class="cell">
                <label for="Period End Date">Period End Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Period End Date">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Reimbursible Interest">Reimbursible Interest</label>
                <div class="input-control text full-size">
                    <input type="text" name="Reimbursible Interest">
                </div>
            </div>

            <div class="cell">
                <label for="Date of Travel">Date of Travel</label>
                <div class="input-control text full-size">
                    <input type="text" name="Date of Travel">
                </div>
            </div>

            <div class="cell">
                <label for="Return Date">Return Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Return Date">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Requires Flight">Requires Flight</label>
                <div class="input-control text full-size">
                    <input type="text" name="Requires Flight">
                </div>
            </div>

            <div class="cell">
                <label for="Travel Documents Fees">Travel Documents Fees</label>
                <div class="input-control text full-size">
                    <input type="text" name="Travel Documents Fees">
                </div>
            </div>

            <div class="cell">
                <label for="Per Diem Days">Per Diem Days</label>
                <div class="input-control text full-size">
                    <input type="text" name="Per Diem Days">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Destination">Destination</label>
                <div class="input-control text full-size">
                    <input type="text" name="Destination">
                </div>
            </div>

            <div class="cell">
                <label for="Requires LPO">Requires LPO</label>
                <div class="input-control text full-size">
                    <input type="text" name="Requires LPO">
                </div>
            </div>

            <div class="cell">
                <label for="Language Code(Default)">Language Code(Default)</label>
                <div class="input-control text full-size">
                    <input type="text" name="Language Code(Default)">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Attachment">Attachment</label>
                <div class="input-control text full-size">
                    <input type="text" name="Attachment">
                </div>
            </div>

            <div class="cell">
                <label for="Finance Notified">Finance Notified</label>
                <div class="input-control text full-size">
                    <input type="text" name="Requires LPO">
                </div>
            </div>

            <div class="cell">
                <label for="Procurement Notified">Procurement Notified</label>
                <div class="input-control text full-size">
                    <input type="text" name="Procurement Notified">
                </div>
            </div>


        </div>



<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
 </form>   

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    


    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    



    
