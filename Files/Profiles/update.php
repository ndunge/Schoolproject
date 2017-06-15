<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */

$this->title = 'Manage User Profile';
// $this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->ProfileID, 'url' => ['view', 'id' => $model->ProfileID]];
// $this->params['breadcrumbs'][] = 'Update';
?>

<style media="screen">
  tr {
    display: flex;
    width: 90%;
    margin: 0 auto;
    justify-content: space-between;
  }
  tr td {
    flex: 1;
  }
  button {
    margin: 2rem auto !important;
  }
  button > a:visited,
  button > a {
    color: #fff;
  }

</style>
<div class="profiles-update block-shadow" style="padding: .5rem">

    <h3 style="border-bottom: 1px solid #d9d9d9; padding: 1rem 0">
      <?= Html::encode($this->title) ?>
    </h3>
    <br/>
    <?php
      $url = Yii::$app->request->baseUrl . '/profiles/update?id=' . $model->CustomerID;
    ?>
    <form class="" action="<?= $url ?>" method="post">
      <input type="hidden" name="ProfileID" value="<?= $model->CustomerID ?>" >
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
      <table width="100%" border="0" cellspacing="0" cellpadding="3">
           <tr>
              <td>
                  <label>Employee ID</label>
                  <div class="input-control text full-size">
                      <input type="text" value="<?= $model['CustomerID']; ?>" disabled>
                  </div>
              </td>
              <?php $names = $model['FirstName'] . ' ' . $model['MiddleName'] . ' ' . $model['LastName']  ?>
              <td>
                  <label>Names</label>
                  <div class="input-control text full-size">
                      <input type="text" value="<?= $names ?>" disabled>
                  </div>
              </td>
          </tr>
          <tr>
              <td>
                  <label>ID Number</label>
                  <div class="input-control text full-size">
                      <input type="text" value="<?= $model['IDNumber']; ?>" disabled>
                  </div>
              </td>
              <td>
                  <label>Email</label>
                  <div class="input-control text full-size">
                      <input name="Email" type="text" value="<?= $model['Email']; ?>" >
                  </div>
              </td>
          </tr>
          <tr>
              <td>
                  <label>Account Type<span style="color:#F00">*</span></label>
                  <div data-role="select">
                      <select name="AccountTypeID"  id="AccountTypeID" class="input-control full-size">
                          <option value="0" ></option>
                          <option value="1" <?= $model['AccountTypeID']==1?'selected':'' ?>>HR Admin</option>
                          <option value="2" <?= $model['AccountTypeID']==2?'selected':'' ?>>Employee</option>
                          <option value="3" <?= $model['AccountTypeID']==3?'selected':'' ?>>IT Staff</option>
                      </select>
                  </div>
              </td>
          </tr>
          <tr>
            <td>
              <button type="submit" class="button primary">Update Details</button>
            </td>
            <td>
              <button type="submit" class="button warning">
                <?= Html::a('Email Password', ['profiles/mail','id'=> $model->CustomerID]) ?>
              </button>
            </td>
          </tr>
      </table>
      <!-- <button type="button" class="button warning" onclick="sendmail()">Resend Email</button> -->
    </form>

</div>

<script type="text/javascript">
</script>
