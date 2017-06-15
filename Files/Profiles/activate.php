<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Dimensionvalue;
use frontend\models\Academicyear;
use frontend\models\Country;
use frontend\models\Postcode;
use frontend\models\Religions;
use frontend\models\Stream;
use frontend\models\Studentprogramme;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;

// print_r($model); exit;
?>
<script>

</script>

<div class="container">
  <?php if ( Yii::$app->session->hasFlash('msg') ): ?>
    <div style="text-align: center; font-weight: bold; color: #f00; border: 1px solid #f00; padding: .5rem">
      <?= Yii::$app->session->getFlash('msg'); ?>
    </div>
  <?php endif; ?>

  <div class="login-form padding20 block-shadow" style="width: 70%; margin: 1rem auto">
      <div class="" style="">
        <p> Password must contain at least 6 characters, at least one number and at least one special character </p>
      </div>
      <div class="" id="msg" style="color: red;"> </div>
      <form action="<?= $baseUrl . '/profiles/activate' ?>" method="POST" onsubmit="return false;">
        <input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>"
          value="<?=Yii::$app->request->csrfToken?>"/>
          <input type="hidden" name="token" value="<?= $model['Salt'] ?>">
          <h1 class="text-light">Set Account Password </h1>
          <hr class="thin">
          <br>
          <div class="input-control password full-size" data-role="input">
              <label for="Password">Password:</label>
              <input type="password" name="NewPassword" id="NewPassword" style="padding-right: 39px;">
              <button class="button helper-button reveal" tabindex="-1" type="button"><span class="mif-looks"></span></button>
          </div>
          <br>
          <br>
          <div class="input-control password full-size" data-role="input">
              <label for="Password_Confirmation"> Password Confirmation:</label>
              <input type="password" name="ConfirmPassword" id="ConfirmPassword" style="padding-right: 39px;">
              <button class="button helper-button reveal" tabindex="-1" type="button"><span class="mif-looks"></span></button>
          </div>
          <br>
          <br>
          <div class="form-actions">
              <button type="button" class="button primary"
                onclick="resetphash(this.form, this.form.NewPassword, this.form.ConfirmPassword)">Submit</button>
              <button type="button" class="button link">Cancel</button>
          </div>
      </form>
  </div>

</div>

<script type="text/javascript">
</script>
