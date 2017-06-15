<?php

// $Name = $CustomerDetailsArray['Name'];
$BankName = "union";
$Name = "Union Bank";
$cust_name = "Union Bank";

$cust_name_desc = "Union Bank";
$BankAccountNo = "1040744707";


// $CustomerDetailsArray = getApplicantDetails($db,$ApplicantNo,$ProgrammeID,$DatabaseCompanyName);


$cust_id_desc = '103';

$cust_id = 2500;
$CustomerID = 1000;


$product_id = 6205;
$amount = 100000;
$currency = 566;
//$cust_id=$params[$cust_id_desc];

//print_r($cust_id);exit;
// $site_redirect_url = 'http://localhost:8080/ritman/testform.php?';
$baseUrl = Yii::$app->homeUrl;
// $site_redirect_url = $_SERVER['HTTP_HOST'] . '/' . $baseUrl . '/checkout?';
$site_redirect_url = 'http://localhost:8080' .$baseUrl . 'bankapi/checkout?';
// print_r($site_redirect_url); exit();
$txn_ref = '698167EAC73C109168APPL101010014974098632009560';
// $txn_ref = rand(49000,999999);
$pay_item_id = 101;

$apikey = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
$hashkey = $txn_ref . $product_id . $pay_item_id . $amount . $site_redirect_url . $apikey;
$hash = hash('sha512', $hashkey);

// echo $hash;

// $hash = strtoupper($hash);

// print_r( $hashkey );
// echo nl2br(" \n\n \t\t");
// print_r( strtoupper($hash) );


$url = 'https://sandbox.interswitchng.com/webpay/pay';

?>


<?php if (Yii::$app->session->getFlash('success')): ?>
	
	<div style="border: 1px solid hotpink; padding: .2rem; font-weight: bolder;">
		<p> <?= Yii::$app->session->getFlash('success') ?>
	</div>
<?php endif ?>

<form id="payform" name="payform" action= "<?= $url ?>" method="post">

        	
      <input name="cust_name" type="hidden" value="<?= $cust_name ?>" /><br><br>
      <input name="cust_id" type="hidden" value="<?= $cust_id ?>" /><br><br>
        <!--<label>Smart Card Number:</label> <input name="SmartCardNumber" type="text"/><br><br> -->
        <!--<label>Reference Number:</label> <input name="ReferenceNumber" type="text"/><br><br>-->
        <label>Amount:</label><input name="amount" type="text"  value="<?= $amount ?>"   /> <br><br>

        


        <!--<label>Convenience Fee:</label> <input name="Conveniencefee" type="text"/><br><br>-->

		<input name="product_id" type="hidden" value="<?= $product_id ?>" /> 
		<!-- <input name="amount" type="hidden" value="<?= $amount; ?>" />  -->
		<input name="currency" type="hidden" value="<?= $currency ?>" /> 
		<input name="site_redirect_url" type="hidden" value="<?= $site_redirect_url; ?>" /> 
		<input name="site_name" type="hidden" value="www.ritmanuniversity.edu.ng" /> 
		<input name="txn_ref" type="hidden" value="<?= $txn_ref; ?>" />
		<input name="pay_item_id" type="hidden" value="<?= $pay_item_id ?>" />
		<input name="hash" type="hidden" value="<?= $hash ?>" />

	<table width="100%">
	<h3 id="status"></h3>
	<!--</br>-->
	<progress id="progressBar_" value="0" max="100" style="width:300px;display:none;" align="center"></progress>
	<!--</br>-->
    <p id="loaded_n_total"></p>
	</br>
	<tr>
	  <td width="40%" class="text-left"><?//php echo $_Lang['paymentsImageIcon']; ?></td>
	  <td width="40%" class="text-left">

	      
      </td>
      <td width="10%" class="text-left">&nbsp;</td>
    </tr>
</table>

<table width="100%" border="0" cellpadding="2" cellspacing="3" >
   <tr>
      <td class="tabletext">
       <div align="center">
       <img src="images/mastercard.jpg" width="120px">	
        <img src="images/visa.jpg" width="120px">
        <img src="images/verve.jpg" width="200px">		
      <div align="right">
	  
	  	
											
			<input  name="navigatetopreviouspage" class="button default"  value="Pay" type="submit" style"width:100px"/>
			
			<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="Back" 
						/>


        </div>        </td>
    </tr>
      <tr>
      <th scope="col" class="TableFooter"><div align="left"></div></th>
   </tr>
</table>
</form>


<br>
<br>
<br>

<?php 
		// $transactionreference = empty($_POST) ? $txn_ref : $_POST['txnref']; 
		$transactionreference = $txn_ref;

		$hashkeyy = $product_id . $transactionreference . $apikey;
		$hashh = hash('sha512', $hashkeyy);

		// print_r($hashh);exit;

		// echo $hash;
		header("Hash: <?= $hashh ?>");
?>


<form id="gettransaction" name="payform" action= "testform.php" method="get">	
		<input name="productid" type="hidden" value="<?= $product_id ?>" /> 
		<input name="amount" type="hidden" value="<?= $amount; ?>" />
		<input name="transactionreference" type="hidden" value="<?= $transactionreference; ?>" /> 
		<input name="hash" type="hidden" value="<?= $hashh ?>" /> 
		<input name="origin" type="hidden" value="internal" />





	<table width="100%">
	<h3 id="status"></h3>
	<!--</br>-->
	<progress id="progressBar_" value="0" max="100" style="width:300px;display:none;" align="center"></progress>
	<!--</br>-->
    <p id="loaded_n_total"></p>
	</br>
	<tr>
	  <td width="40%" class="text-left"><?//php echo $_Lang['paymentsImageIcon']; ?></td>
	  <td width="40%" class="text-left">	    
	      
      </td>
      <td width="10%" class="text-left">&nbsp;</td>
    </tr>
</table>

<table width="100%" border="0" cellpadding="2" cellspacing="3" >
   <tr>
      <td class="tabletext">
      <div align="right">
	  
	  		
											
			<button type="submit" name="navigatetopreviouspage" class="button default" > Status </button> 
			
			<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="Cancel" 
						/>


        </div>        </td>
    </tr>
      <tr>
      <th scope="col" class="TableFooter"><div align="left"></div></th>
   </tr>
</table>
</form>

