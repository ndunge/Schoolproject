<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'No_')->textInput() ?>

    <?= $form->field($model, 'Name')->textInput() ?>

    <?= $form->field($model, 'Search Name')->textInput() ?>

    <?= $form->field($model, 'Name 2')->textInput() ?>

    <?= $form->field($model, 'Address')->textInput() ?>

    <?= $form->field($model, 'Address 2')->textInput() ?>

    <?= $form->field($model, 'City')->textInput() ?>

    <?= $form->field($model, 'Contact')->textInput() ?>

    <?= $form->field($model, 'Phone No_')->textInput() ?>

    <?= $form->field($model, 'Telex No_')->textInput() ?>

    <?= $form->field($model, 'Our Account No_')->textInput() ?>

    <?= $form->field($model, 'Territory Code')->textInput() ?>

    <?= $form->field($model, 'Global Dimension 1 Code')->textInput() ?>

    <?= $form->field($model, 'Global Dimension 2 Code')->textInput() ?>

    <?= $form->field($model, 'Chain Name')->textInput() ?>

    <?= $form->field($model, 'Budgeted Amount')->textInput() ?>

    <?= $form->field($model, 'Credit Limit (LCY)')->textInput() ?>

    <?= $form->field($model, 'Customer Posting Group')->textInput() ?>

    <?= $form->field($model, 'Currency Code')->textInput() ?>

    <?= $form->field($model, 'Customer Price Group')->textInput() ?>

    <?= $form->field($model, 'Language Code')->textInput() ?>

    <?= $form->field($model, 'Statistics Group')->textInput() ?>

    <?= $form->field($model, 'Payment Terms Code')->textInput() ?>

    <?= $form->field($model, 'Fin_ Charge Terms Code')->textInput() ?>

    <?= $form->field($model, 'Salesperson Code')->textInput() ?>

    <?= $form->field($model, 'Shipment Method Code')->textInput() ?>

    <?= $form->field($model, 'Shipping Agent Code')->textInput() ?>

    <?= $form->field($model, 'Place of Export')->textInput() ?>

    <?= $form->field($model, 'Invoice Disc_ Code')->textInput() ?>

    <?= $form->field($model, 'Customer Disc_ Group')->textInput() ?>

    <?= $form->field($model, 'Country_Region Code')->textInput() ?>

    <?= $form->field($model, 'Collection Method')->textInput() ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'Blocked')->textInput() ?>

    <?= $form->field($model, 'Invoice Copies')->textInput() ?>

    <?= $form->field($model, 'Last Statement No_')->textInput() ?>

    <?= $form->field($model, 'Print Statements')->textInput() ?>

    <?= $form->field($model, 'Bill-to Customer No_')->textInput() ?>

    <?= $form->field($model, 'Priority')->textInput() ?>

    <?= $form->field($model, 'Payment Method Code')->textInput() ?>

    <?= $form->field($model, 'Last Date Modified')->textInput() ?>

    <?= $form->field($model, 'Application Method')->textInput() ?>

    <?= $form->field($model, 'Prices Including VAT')->textInput() ?>

    <?= $form->field($model, 'Location Code')->textInput() ?>

    <?= $form->field($model, 'Fax No_')->textInput() ?>

    <?= $form->field($model, 'Telex Answer Back')->textInput() ?>

    <?= $form->field($model, 'VAT Registration No_')->textInput() ?>

    <?= $form->field($model, 'Combine Shipments')->textInput() ?>

    <?= $form->field($model, 'Gen_ Bus_ Posting Group')->textInput() ?>

    <?= $form->field($model, 'Picture')->textInput() ?>

    <?= $form->field($model, 'Post Code')->textInput() ?>

    <?= $form->field($model, 'County')->textInput() ?>

    <?= $form->field($model, 'E-Mail')->textInput() ?>

    <?= $form->field($model, 'Home Page')->textInput() ?>

    <?= $form->field($model, 'Reminder Terms Code')->textInput() ?>

    <?= $form->field($model, 'No_ Series')->textInput() ?>

    <?= $form->field($model, 'Tax Area Code')->textInput() ?>

    <?= $form->field($model, 'Tax Liable')->textInput() ?>

    <?= $form->field($model, 'VAT Bus_ Posting Group')->textInput() ?>

    <?= $form->field($model, 'Reserve')->textInput() ?>

    <?= $form->field($model, 'Block Payment Tolerance')->textInput() ?>

    <?= $form->field($model, 'IC Partner Code')->textInput() ?>

    <?= $form->field($model, 'Prepayment _')->textInput() ?>

    <?= $form->field($model, 'Partner Type')->textInput() ?>

    <?= $form->field($model, 'Preferred Bank Account')->textInput() ?>

    <?= $form->field($model, 'Cash Flow Payment Terms Code')->textInput() ?>

    <?= $form->field($model, 'Primary Contact No_')->textInput() ?>

    <?= $form->field($model, 'Responsibility Center')->textInput() ?>

    <?= $form->field($model, 'Shipping Advice')->textInput() ?>

    <?= $form->field($model, 'Shipping Time')->textInput() ?>

    <?= $form->field($model, 'Shipping Agent Service Code')->textInput() ?>

    <?= $form->field($model, 'Service Zone Code')->textInput() ?>

    <?= $form->field($model, 'Allow Line Disc_')->textInput() ?>

    <?= $form->field($model, 'Base Calendar Code')->textInput() ?>

    <?= $form->field($model, 'Copy Sell-to Addr_ to Qte From')->textInput() ?>

    <?= $form->field($model, 'ParentID')->textInput() ?>

    <?= $form->field($model, 'SponsorID')->textInput() ?>

    <?= $form->field($model, 'Withholding Tax Code')->textInput() ?>

    <?= $form->field($model, 'PIN No_')->textInput() ?>

    <?= $form->field($model, 'DateOfIncorporation')->textInput() ?>

    <?= $form->field($model, 'CountyID')->textInput() ?>

    <?= $form->field($model, 'UserID')->textInput() ?>

    <?= $form->field($model, 'RegistrationDate')->textInput() ?>

    <?= $form->field($model, 'Mobile 1')->textInput() ?>

    <?= $form->field($model, 'Mobile 2')->textInput() ?>

    <?= $form->field($model, 'Gender')->textInput() ?>

    <?= $form->field($model, 'Date Of Birth')->textInput() ?>

    <?= $form->field($model, 'Age')->textInput() ?>

    <?= $form->field($model, 'Marital Status')->textInput() ?>

    <?= $form->field($model, 'Weight')->textInput() ?>

    <?= $form->field($model, 'Height')->textInput() ?>

    <?= $form->field($model, 'Religion')->textInput() ?>

    <?= $form->field($model, 'Citizenship')->textInput() ?>

    <?= $form->field($model, 'Student Type')->textInput() ?>

    <?= $form->field($model, 'ID No')->textInput() ?>

    <?= $form->field($model, 'Sponsor Type')->textInput() ?>

    <?= $form->field($model, 'Customer Type')->textInput() ?>

    <?= $form->field($model, 'Birth Cert')->textInput() ?>

    <?= $form->field($model, 'remove 2')->textInput() ?>

    <?= $form->field($model, 'test to remove later')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Library Code')->textInput() ?>

    <?= $form->field($model, 'KNEC No')->textInput() ?>

    <?= $form->field($model, 'Passport No')->textInput() ?>

    <?= $form->field($model, 'Confirmed Ok')->textInput() ?>

    <?= $form->field($model, 'Library Membership')->textInput() ?>

    <?= $form->field($model, 'libsecurity')->textInput() ?>

    <?= $form->field($model, 'Can Use Library')->textInput() ?>

    <?= $form->field($model, 'Lib Membership')->textInput() ?>

    <?= $form->field($model, 'Staff No_')->textInput() ?>

    <?= $form->field($model, 'Programme Category')->textInput() ?>

    <?= $form->field($model, 'Application No_')->textInput() ?>

    <?= $form->field($model, 'Accredited Centre no_')->textInput() ?>

    <?= $form->field($model, 'Adults')->textInput() ?>

    <?= $form->field($model, 'Vehicle No_')->textInput() ?>

    <?= $form->field($model, 'Children Under 12')->textInput() ?>

    <?= $form->field($model, 'Group_Company')->textInput() ?>

    <?= $form->field($model, 'Departure Date')->textInput() ?>

    <?= $form->field($model, 'Arrival Date')->textInput() ?>

    <?= $form->field($model, 'Nationality')->textInput() ?>

    <?= $form->field($model, 'Room no')->textInput() ?>

    <?= $form->field($model, 'Room Type')->textInput() ?>

    <?= $form->field($model, 'Receipt No')->textInput() ?>

    <?= $form->field($model, 'Rate')->textInput() ?>

    <?= $form->field($model, 'Cashier')->textInput() ?>

    <?= $form->field($model, 'Deposit')->textInput() ?>

    <?= $form->field($model, 'Payment Date')->textInput() ?>

    <?= $form->field($model, 'Remarks')->textInput() ?>

    <?= $form->field($model, 'Guest Agent Code')->textInput() ?>

    <?= $form->field($model, 'Taken By')->textInput() ?>

    <?= $form->field($model, 'Checked By')->textInput() ?>

    <?= $form->field($model, 'HTL Status')->textInput() ?>

    <?= $form->field($model, 'HELB No_')->textInput() ?>

    <?= $form->field($model, 'Deferement Period')->textInput() ?>

    <?= $form->field($model, 'Status Change Date')->textInput() ?>

    <?= $form->field($model, 'Revenue Cash Account')->textInput() ?>

    <?= $form->field($model, 'Certificate Status')->textInput() ?>

    <?= $form->field($model, 'Date Collected')->textInput() ?>

    <?= $form->field($model, 'Confirmed')->textInput() ?>

    <?= $form->field($model, 'Confirmed Remarks')->textInput() ?>

    <?= $form->field($model, 'Special Requrements')->textInput() ?>

    <?= $form->field($model, 'Certificate No_')->textInput() ?>

    <?= $form->field($model, 'District')->textInput() ?>

    <?= $form->field($model, 'Transfer to No_')->textInput() ?>

    <?= $form->field($model, 'Transfer to')->textInput() ?>

    <?= $form->field($model, 'Current Programme')->textInput() ?>

    <?= $form->field($model, 'Paid PartTime')->textInput() ?>

    <?= $form->field($model, 'Hostel Black Listed')->textInput() ?>

    <?= $form->field($model, 'Black Listed Reason')->textInput() ?>

    <?= $form->field($model, 'Black Listed By')->textInput() ?>

    <?= $form->field($model, 'Audit Issue')->textInput() ?>

    <?= $form->field($model, 'Not Billed')->textInput() ?>

    <?= $form->field($model, 'New Stud')->textInput() ?>

    <?= $form->field($model, 'Lock Online Application')->textInput() ?>

    <?= $form->field($model, 'Entry Semester')->textInput() ?>

    <?= $form->field($model, 'Intake')->textInput() ?>

    <?= $form->field($model, 'Date Registered')->textInput() ?>

    <?= $form->field($model, 'StudentOrMember')->textInput() ?>

    <?= $form->field($model, 'Salutation')->textInput() ?>

    <?= $form->field($model, 'Select')->textInput() ?>

    <?= $form->field($model, 'SentForCommittee')->textInput() ?>

    <?= $form->field($model, 'DateSentForCommittee')->textInput() ?>

    <?= $form->field($model, 'CommitteeApprovalStatus')->textInput() ?>

    <?= $form->field($model, 'CommitteeApprovalDate')->textInput() ?>

    <?= $form->field($model, 'CommitteeMinuteNo')->textInput() ?>

    <?= $form->field($model, 'Mode of Study')->textInput() ?>

    <?= $form->field($model, 'State')->textInput() ?>

    <?= $form->field($model, 'Local Government Authority')->textInput() ?>

    <?= $form->field($model, 'Clearance Status')->textInput() ?>

    <?= $form->field($model, 'Clearance Initiated by')->textInput() ?>

    <?= $form->field($model, 'Clearance Initiated Date')->textInput() ?>

    <?= $form->field($model, 'Clearance Initiated Time')->textInput() ?>

    <?= $form->field($model, 'Clearance Semester')->textInput() ?>

    <?= $form->field($model, 'Clearance Academic Year')->textInput() ?>

    <?= $form->field($model, 'Intake Code')->textInput() ?>

    <?= $form->field($model, 'Programme End Date')->textInput() ?>

    <?= $form->field($model, 'Applied for Clearance')->textInput() ?>

    <?= $form->field($model, 'Clearance Reason')->textInput() ?>

    <?= $form->field($model, 'Barcode Picture')->textInput() ?>

    <?= $form->field($model, 'ID Card Expiry Year')->textInput() ?>

    <?= $form->field($model, 'Graduated')->textInput() ?>

    <?= $form->field($model, 'Graduation Date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
