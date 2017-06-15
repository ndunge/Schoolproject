
<?php
header("Access-Control-Allow-Origin: *");
// require_once 'DB_PARAMS/connect.php';
// require_once 'en_language.php';
// require_once 'utilities.php';
// require_once 'SpecialFunctions.php';
// require_once 'predefinedvariables.php';
// require_once 'en_mailTemplates.php';
if (!isset($_SESSION)){ session_start(); }
$ReceiptNo = '';
$declarationmsg = '';
$No_= ' ';
$Date= date('Y-m-d');
$PayMode= ' ';
$ChequeNo= ' ';
$ChequeDate= date('Y-m-d');
$AmountLCY= '0';
$BankCode= ' ';
$ReceivedFrom= ' ';
$OnBehalfOf= ' ';
$Cashier= ' ';
$Posted= '0';
$PostedDate= date('Y-m-d');
$PostedTime= date('H:i:s');
$PostedBy= ' ';
$No_Series= ' ';
$CurrencyCode= ' ';
$GlobalDimension1Code= ' ';
$GlobalDimension2Code= ' ';
$Status= '0';
$Amount= '0';
$Banked= '0';
$ProcurementMethod= '0';
$ProcurementRequest= '0';
$EmployerCode= '0';
$UnallocatedReceipt= '0';
$Ext_DocumentNo_= '0';
$Remarks= '0';
$MemberOrStudent= '0';
$ApplicantNo= '0';
$MemberRegistration= '0';
$InvoicePosted= '0';
$StudentRegistration= '0';
$InvoiceCreated= '0';

$ReceiptNo_='0';
$LineNo='0';
$AccountType='0';	
$AccountNo_='0';
$AccountName='0';
$Description=' ';
$VATCode=' ';	
$W_TaxCode=' ';
$VATAmount='0';	
$W_TaxAmount='0';	
$Amount='0';	
$NetAmount='0';	
$GlobalDimension1Code=' ';	
$GlobalDimension2Code=' ';	
$AppliestoDoc_No='0';
$AppliestoDoc_Type='0';		
$ProcurementMethod='0';		
$ProcurementRequest='0';	
$InvoiceAmount='0';	
$GlobalDimension3=' ';	
$GlobalDimension4=' ';	
$InstalmentPlan='0';
$InstalmentPlanNo='0';
$PaymentDiscount = 0;

IF(isset($_REQUEST['submit']))
{
	
	$UserID = $_REQUEST['UserID'];
	$IAgree = $_REQUEST['IAgree'];
	$IDisagree = $_REQUEST['IDisagree'];
	$ReceiptNo = $_REQUEST['ReceiptNo'];
	$CustomerID = $_REQUEST['CustomerID'];
	$ProgrammeID = $_REQUEST['ProgrammeID'];
	$ApplicantNo = $_REQUEST['ApplicantNo'];
	$Submitted = $_REQUEST['Submitted'];
	$SetupArray = SystemSetup($db,$DatabaseCompanyName);
	$ApplicationFeePayMode = $SetupArray['ApplicationFeePayMode'];
	$andStatement = 'AND C.StudentApplicationFee = 1';
	$LoggedInUserDetailsArray = getApplicantDetails($db,$CustomerID,$ProgrammeID,$DatabaseCompanyName);
	$Name = strtoupper($LoggedInUserDetailsArray['Name']);
	$AcademicYearID = $LoggedInUserDetailsArray['AcademicYearID'];
	$IntakeID = $LoggedInUserDetailsArray['IntakeID'];
	$StageID = $LoggedInUserDetailsArray['StageID'];
	$ProgrammeChargesArray = getApplicationFeeProgrammeCharge($db,$ProgrammeID,$AcademicYearID,$IntakeID,$StageID,$DatabaseCompanyName);
	$Code = $ProgrammeChargesArray[0];
	$LinesDesc = $ProgrammeChargesArray[1];
	$ApplicationFeeAmount = $ProgrammeChargesArray[2];
	$G_LAccount = $ProgrammeChargesArray[11];
	$Amount = $ProgrammeChargesArray[2];
	
	//echo"The G_LAccount => $G_LAccount Amount -> $ApplicationFeeAmount";exit;
	
	
	$whereStatus = 'WHERE [Default Status] = 1';
	$StudenStatusArray = getStudenStatus($db, $DatabaseCompanyName,$whereStatus);
	$StudentStatusID = $StudenStatusArray[0];
	$ApprovalStatus = 1; 
	$UserDetailsArray = getUserDetails($db, $UserID, $DatabaseCompanyName);
	$studentapplicationSubmissionDetailsArray = validatestudentapplication($db,$DatabaseCompanyName,$CustomerID,$ApplicantNo);
	$ValidationApprovalStatus = $studentapplicationSubmissionDetailsArray[0];
	$ValidationStudentStatus = $studentapplicationSubmissionDetailsArray[1];
	
	$errors = array();
	if (($IAgree == 'false') && $IDisagree == 'true')
	{
		$Agreement = 0;
	} 
		$Agreement = 1;
	} else {
		$Agreement = 0;
	}
	
	if($Agreement == 0)
		$errors[] = $lang['accept_error'];
	if($Submitted == 1)
		$errors[] = $lang['submitted_error'];
	if($ValidationApprovalStatus > 0 || $ValidationStudentStatus > 0)
		$errors[] = $lang['studentApplication_error'];
	//echo"<p> $ValidationApprovalStatus > 0 || $ValidationStudentStatus > 0 <p>";
		
	if(Count($errors)>0)
	{
		$declarationmsg = $errors;
	} else {
		// We make an entry in the receipt table
		if($ReceiptNo == '')
			$ReceiptNo = getApplicationReceiptNumber($db, $DatabaseCompanyName);


		//$SetupArray = SystemSetup($db,$DatabaseCompanyName);
		$Quantity = 1;	
		$update_sql = "UPDATE [".$DatabaseCompanyName."Student Application] 
						SET ApprovalStatus = '$ApprovalStatus'
						,[ApplicationDate] = getDate()
						,StudentStatus = '$StudentStatusID'
						,ApplicationSubmitted = '1'
					WHERE [ApplicantNo] = '$ApplicantNo'";
		//echo "<p> $update_sql <p>";
		if($ApplicationFeeAmount == '')
		{
			$MembershipName = $MembershipTypeDetailsArray[0];
			$ApplicationFeeAmount = 0;
			$LinesDesc = strtoupper($lang['appliPaymentDesc'].' '.$UserDetailsArray[3]);
		}
		

		
		$update_result = sqlsrv_query($db, $update_sql);
		if($update_result){
		$Name = persian_php_to_sql($Name);
		$LinesDesc = persian_php_to_sql($LinesDesc);
		$receiptHeader_sql="INSERT INTO [".$DatabaseCompanyName."Receipts Header1]
			(
				 [No_]
				,[Date]
				,[Pay Mode]
				,[Cheque No]
				,[Cheque Date]
				,[Amount(LCY)]
				,[Bank Code]
				,[Received From]
				,[On Behalf Of]
				,[Cashier]
				,[Posted]
				,[Posted Date]
				,[Posted Time]
				,[Posted By]
				,[No_ Series]
				,[Currency Code]
				,[Global Dimension 1 Code]
				,[Global Dimension 2 Code]
				,[Status]
				,[Amount]
				,[Banked]
				,[Procurement Method]
				,[Procurement Request]
				,[Employer Code]
				,[Unallocated Receipt]
				,[Ext_ Document No_]
				,[Remarks]
				,[MemberOrStudent]
				,[ApplicantNo]
				,[MemberRegistration]
				,[InvoicePosted]
				,[StudentRegistration]
				,[Invoice Created]
			)
			VALUES
			(
				 '$ReceiptNo'
				,'$Date'
				,'$PayMode'
				,'$ChequeNo'
				,'$ChequeDate'
				,'$ApplicationFeeAmount'
				,'$BankCode'
				,'$Name'
				,'$LinesDesc'
				,'$Cashier'
				,'$Posted'
				,'$PostedDate'
				,'$PostedTime'
				,'$PostedBy'
				,'$No_Series'
				,'$CurrencyCode'
				,'$GlobalDimension1Code'
				,'$GlobalDimension2Code'
				,'$Status'
				,'$ApplicationFeeAmount'
				,'$Banked'
				,'$ProcurementMethod'
				,'$ProcurementRequest'
				,'$EmployerCode'
				,'$UnallocatedReceipt'
				,'$Ext_DocumentNo_'
				,'$Remarks'
				,'$MemberOrStudent'
				,'$ApplicantNo'
				,'$MemberRegistration'
				,'$InvoicePosted'
				,'$StudentRegistration'
				,'$InvoiceCreated'
			) SELECT SCOPE_IDENTITY() AS ID";
			//echo"The $receiptHeader_sql <P>";
			$result = sqlsrv_query($db, $receiptHeader_sql);
			if ($result){
			//echo"I am";
				//$DocumentNo = lastId($result); 
				$receiptLines_sql=" INSERT INTO [".$DatabaseCompanyName."Receipt Lines1]
					(
						 [Receipt No_]
						,[Account Type]	
						,[Account No_]
						,[Account Name]
						,[Description]
						,[VAT Code]	
						,[W_Tax Code]
						,[VAT Amount]	
						,[W_Tax Amount]	
						,[Amount]	
						,[Net Amount]	
						,[Global Dimension 1 Code]	
						,[Global Dimension 2 Code]	
						,[Applies to Doc_ No]
						,[Applies-to Doc_ Type]		
						,[Procurement Method]		
						,[Procurement Request]	
						,[Invoice Amount]	
						,[Global Dimension 3 Code]	
						,[Global Dimension 4 Code]	
						,[Instalment Plan]
						,[Instalment Plan No]
						,[Payment Discount]
					) VALUES
					(
						 '$ReceiptNo'
						,'$AccountType'	
						,'$G_LAccount'
						,'$LinesDesc'
						,'$LinesDesc'
						,'$VATCode'	
						,'$W_TaxCode'
						,'$VATAmount'	
						,'$W_TaxAmount'	
						,'$ApplicationFeeAmount'	
						,'$ApplicationFeeAmount'	
						,'$GlobalDimension1Code'	
						,'$GlobalDimension2Code'	
						,'$AppliestoDoc_No'
						,'$AppliestoDoc_Type'		
						,'$ProcurementMethod'		
						,'$ProcurementRequest'	
						,'$ApplicationFeeAmount'	
						,'$GlobalDimension3'	
						,'$GlobalDimension4'	
						,'$InstalmentPlan'
						,'$InstalmentPlanNo'
						,'$PaymentDiscount'						
					)";
					//echo"$receiptLines_sql <p>";
				$receiptLines_result = sqlsrv_query($db, $receiptLines_sql);
				if($receiptLines_result){
					// We Update the receipt No	
					$updatereceiptNo_sql = "UPDATE [".$DatabaseCompanyName."Application Form Header] 
							SET [Receipt Slip No_] = '$ReceiptNo'
						WHERE [Application No_] = '".$_SESSION['CustomerNo']."'";
					$updatereceiptNo_result = sqlsrv_query($db, $updatereceiptNo_sql);
					//We send a e-invoice to applicant
					
					$RegistrationPaymentAdviceNoteArray = StudentApplicationPaymentAdviceNote($db,$UserDetailsArray[3],$ReceiptNo,number_format($ApplicationFeeAmount,2),$LinesDesc,$_SESSION['CustomerNo']);
					$templateID = $RegistrationPaymentAdviceNoteArray[0];
					$PaymentAdviceTemplate = $RegistrationPaymentAdviceNoteArray[1];
					$SuccessfulMsg = $RegistrationPaymentAdviceNoteArray[2];
					$UnsuccessfulMsg = $RegistrationPaymentAdviceNoteArray[3];
					$Subject = $RegistrationPaymentAdviceNoteArray[4];
					$declarationmsg = sendNotificationMail($db, $PaymentAdviceTemplate, $templateID,$ChangeLogDateTime, $UserDetailsArray[6], $subject,$SuccessfulMsg,$UnsuccessfulMsg,$DatabaseCompanyName);
					//echo"I am sent --> $msg";
				} else {
					$update_sql = "UPDATE [".$DatabaseCompanyName."Student Application] 
								SET ApprovalStatus = '0'
								,[ApplicationDate] = '$Date'
								,StudentStatus = ''
							WHERE [ApplicantNo] = '$ApplicantNo'";
							//echo"<p> tete $update_sql <br>";
					$update_result = sqlsrv_query($db, $update_sql);
					
					$delete_receiptHeader_sql ="DELETE FROM [".$DatabaseCompanyName."Receipts Header1] WHERE No_ = '$ReceiptNo'";
					$delete_receiptHeader_result = sqlsrv_query($db, $delete_receiptHeader_sql);
					$declarationmsg ="Sorry we are currently experiencing a technical problem. Please try again later. 1";
				}
			} else{
				//echo $receiptHeader_sql;
				$update_sql = "UPDATE [".$DatabaseCompanyName."Student Application] 
								SET ApprovalStatus = '0'
								,[ApplicationDate] = '$Date'
								,StudentStatus = ''
								,ApplicationSubmitted = 0
							WHERE [ApplicantNo] = '$ApplicantNo'";
				$update_result = sqlsrv_query($db, $update_sql);
				$declarationmsg ="Sorry we are currently experiencing a technical problem. Please try again later. 2";
			}
		} else {
			$declarationmsg = "Sorry we failed to submit application11";
		}		
	}
}
//print_r($_REQUEST);
if(isset($_REQUEST['CustomerID'])){ $CustomerID = $_REQUEST['CustomerID'];}

//if(isset($_REQUEST['UserID'])){ $UserID = $_REQUEST['UserID'];}
if(isset($_REQUEST['UserID'])){ 
	$UserID = $_REQUEST['UserID']; 
} else {
	$UserID = $_SESSION['ProfileID']; 
}
if(isset($_REQUEST['msg'])){ $msg = $_REQUEST['msg'];}
if(isset($_REQUEST['CurrentStep'])){ $CurrentStep = $_REQUEST['CurrentStep'];}
if(isset($_REQUEST['ApplicantNo'])){ $ApplicantNo = $_REQUEST['ApplicantNo'];}
if(isset($_REQUEST['ProgrammeID'])){ $ProgrammeID = $_REQUEST['ProgrammeID'];}
if(isset($_REQUEST['Submitted'])){ $Submitted = $_REQUEST['Submitted'];}
if($Submitted == '1'){$Agreement = '1';}else{$Agreement = '0';}
$readonly = "disabled";
$StepsArray = getStudentApplicationCurrentPrevNextStep($db,$CurrentStep,$ProgrammeID,$DatabaseCompanyName);
$PreviousStep = $StepsArray[0]; 
$PreviousOption = $StepsArray[1];
$PreviousStepScreenName = $StepsArray[2];
$PreviousHintStep = $StepsArray[3];
$PreviousStepFileName = $StepsArray[4];
$PreviousStepPDFFileName = $StepsArray[5];
$PreviousPDFStepScreenName = $StepsArray[6];
$CurrentStep = $StepsArray[7];
$CurrentOption = $StepsArray[8];
$CurrentStepScreenName = $StepsArray[9];
$CurrentHintStep = $StepsArray[10];
$CurrentStepFileName = $StepsArray[11];
$CurrentStepPDFFileName = $StepsArray[12];
$CurrentPDFStepScreenName = $StepsArray[13];
$NextStep = $StepsArray[14];
$NextOption = $StepsArray[15];
$NextStepScreenName = $StepsArray[16];
$NextHintStep = $StepsArray[17];
$NextStepFileName = $StepsArray[18];
$NextStepPDFFileName = $StepsArray[19];
$NextPDFStepScreenName = $StepsArray[20];


//$CustomerDetailsArray = getCustomerDetails($db,$CustomerID,$DatabaseCompanyName);
$CustomerDetailsArray = getApplicantDetails($db,$ApplicantNo,$ProgrammeID,$DatabaseCompanyName);
//rEMOVE THIS HARD CODING LATER
$Name = $CustomerDetailsArray['Name'];
$BankName = "KEYSTONE BANK LIMITED";
$BankAccountNo = "1040744707";

$txn_ref = rand(100000,999999);
$product_id = 6207;
$pay_item_id = '103';

function getApplicationFees($db, $ProgrammeID, $DatabaseCompanyName)
{
	$sql = "SELECT Amount FROM [".$DatabaseCompanyName."Charge] WHERE (StudentApplicationFee = 1) AND (Code = N'701-REG')";
	$result   = sqlsrv_query($db, $sql);
	$Amount = '0';
	if ($myrow = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)) 
	{	
		$Amount = $myrow["Amount"];
		$Amount = number_format($Amount, 0, '.', '');
	} 
	return $Amount;
}

$Amount = getApplicationFees($db, $ProgrammeID, $DatabaseCompanyName);


$site_redirect_url = "http://ritman.cloudapp.net:83/index.php?response=1&CurrentStep=$CurrentStep&ProgrammeID=$ProgrammeID&DatabaseCompanyName=$DatabaseCompanyName&UserID=$UserID&CustomerID=$CustomerID&ApplicantNo=$CustomerID";
$mackey = 'CEF793CBBE838AA
0CBB29B74D57111
3B4EA6586D3BA77
E7CFA0B95E27836
4EFC4526ED7BD25
5A366CDDE11F1F6
07F0F844B09D93B
16F7CFE87563B22
72007AB3';

$hash = $txn_ref.$product_id.$pay_item_id.$Amount.$site_redirect_url.$mackey;
//echo $hash;
$hash = hash('sha512',$hash);
?>
<div class="example">
<legend>Declaration</legend>
<div>
<div style="color:#F00;">
<?php
//print_r($_REQUEST);
if(is_array($declarationmsg)){
	foreach($declarationmsg as $error)
	{
		echo $error.'<br>';
	}
} else {
	echo $declarationmsg;
}
?>
</div>
</p>
<?php echo $lang['studentapplicationDeclaration']; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td><?php if($FailledValidation == 0 ){?>
      <div class="input-control radio inline-block" data-role="input-control">
        <label class="inline-block">
          <input type="radio" name="Agreement" id="IAgree" value="1" <?php if($Agreement == '1'){echo"checked='checked'";} if($Submitted == 1){echo $readonly;}?>  />
          <span class="check"></span> <?php echo $lang['IAgreeLabel']; ?> </label>
        <label class="inline-block">
          <input type="radio" name="Agreement" id="IDisagree" value="0" <?php if($Agreement == '0'){echo"checked='checked'";} if($Submitted == 1){echo $readonly;}?> />
          <span class="check"></span> <?php echo $lang['IDisagreeLabel']; ?> </label>
        </div>
		<?php } ?>
	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
<?php
if($Submitted != 1)
{
?>
<legend>Select Mode of Payment</legend>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td>
      <div class="input-control radio inline-block" data-role="input-control">
        <label class="inline-block">
          <input type="radio" name="ModeofPayment" id="collegepay" value="1" onclick="modeofPayment(1)"/>
          <span class="check"></span> Online Payment</label>
        <label class="inline-block">
          <input type="radio" name="ModeofPayment" id="bankdeposit" value="0" onclick="modeofPayment(0)" />
          <span class="check"></span> Direct Bank Deposit</label>
        </div>
	</td>
  </tr>
</table>
<?php }else{ ?>
<table width="100%" border="0" cellpadding="2" cellspacing="3" >
   <tr>
      <td class="tabletext">
      <div align="right">
	  
	  		<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="<?php echo $lang['previousButton']; ?>" 
						onClick="loadmypage('<?php echo $PreviousStepFileName; ?>?CustomerID=<?php echo $CustomerID ?>'+
											'&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>&CurrentStep=<?php echo $PreviousStep; ?>','defaultpage','progressbar','<?php echo $PreviousOption; ?>','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $PreviousStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>','<?php echo $ApplicantNo; ?>','<?php echo $ProgrammeID; ?>','<?php echo $EntityID3; ?>','<?php echo $EntityID4; ?>')"/>
											
			<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="<?php echo $lang['closeButton']; ?>" 
						onClick="loadmypage('studentapplicant_list.php?CustomerID=<?php echo $CustomerID ?>'+
											'&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>','defaultpage','progressbar','studentapplicantlist','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $CurrentStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>','<?php echo $ApplicantNo; ?>','<?php echo $ProgrammeID; ?>','<?php echo $EntityID3; ?>','<?php echo $EntityID4; ?>')"/>


        </div>        </td>
    </tr>
      <tr>
      <th scope="col" class="TableFooter"><div align="left"></div>      </th>
   </tr>
</table>
<?php }?>
<div id="onlinepay" style="display: none;">
<legend>Online Payment</legend>

------------------------------------------------------ONLINE PAYMENT(PAYMENT BUTTON)


<form id="payform" name="payform" action= "https://sandbox.interswitchng.com/webpay/pay" method="post">	
		<input name="labelID" type="text" value="Applicant No." disabled="disabled"/><input name="CID" type="text" value="<?php echo $CustomerID; ?>" disabled="disabled"/></br>
		<input name="labelName" type="text" value="Student Name" disabled="disabled"/><input name="CName" type="text" value="<?php echo $Name; ?>" disabled="disabled"/></br>
		<input name="labelamount" type="text" value="Amount" disabled="disabled"/><input name="ClientAmount" type="text" value="<?php echo $Amount; ?>" disabled="disabled" />
		<input name="product_id" type="hidden" value="6205" /> 
		<input name="amount" type="hidden" value="<?php echo $Amount; ?>" /> 
		<input name="currency" type="hidden" value="566" /> 
		<input name="site_redirect_url" type="hidden" value="<?php echo $site_redirect_url;?>" /> 
		<input name="site_name" type="hidden" value="www.ritmanuniversity.edu.ng" /> 
		<input name="cust_id" type="hidden" value="<?php echo $CustomerID; ?>" /> 
		<input name="cust_id_desc" type="hidden" value="<?php echo $Name; ?>" /> 
		<input name="cust_name" type="hidden" value="<?php echo $Name; ?>" /> 
		<input name="cust_name_desc" type="hidden" value="<?php echo $Name; ?>" /> 
		<input name="txn_ref" type="hidden" value="<?php echo $txn_ref; ?>" /> 
		<input name="pay_item_id" type="hidden" value="101" /> 
		<input name="pay_item_name" type="hidden" value="Registration Fees" /> 
		<input name="local_date_time" type="hidden" value="" /> 
		<input name="hash" type="hidden" value="<?php echo $hash; ?>" /> 

	<table width="100%">
	<h3 id="status"></h3>
	<!--</br>-->
	<progress id="progressBar_" value="0" max="100" style="width:300px;display:none;" align="center"></progress>
	<!--</br>-->
    <p id="loaded_n_total"></p>
	</br>
	<tr>
	  <td width="40%" class="text-left"><?php echo $_Lang['paymentsImageIcon']; ?></td>
	  <td width="40%" class="text-left">	    
	      
      </td>
      <td width="10%" class="text-left">&nbsp;</td>
    </tr>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="3" >
   <tr>
      <td class="tabletext">
      <div align="right">
	  
	  		<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="<?php echo $lang['previousButton']; ?>" 
						onClick="loadmypage('<?php echo $PreviousStepFileName; ?>?CustomerID=<?php echo $CustomerID ?>'+
											'&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>&CurrentStep=<?php echo $PreviousStep; ?>','defaultpage','progressbar','<?php echo $PreviousOption; ?>','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $PreviousStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>','<?php echo $ApplicantNo; ?>','<?php echo $ProgrammeID; ?>','<?php echo $EntityID3; ?>','<?php echo $EntityID4; ?>')"/>
											
			<input  name="navigatetopreviouspage" class="button default" id="navigatetopreviouspage" value="Pay" type="submit" style"width:100px"/>
			
			<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="<?php echo $lang['closeButton']; ?>" 
						onClick="loadmypage('studentapplicant_list.php?CustomerID=<?php echo $CustomerID ?>'+
											'&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>','defaultpage','progressbar','studentapplicantlist','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $CurrentStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>','<?php echo $ApplicantNo; ?>','<?php echo $ProgrammeID; ?>','<?php echo $EntityID3; ?>','<?php echo $EntityID4; ?>')"/>


        </div>        </td>
    </tr>
      <tr>
      <th scope="col" class="TableFooter"><div align="left"></div>      </th>
   </tr>
</table>
</form>
</div>
<div id="directpay" style="display: none;">
<legend>Direct Bank Deposit</legend>
<table class="table span5" >
	<tr>
	  <td width="10%" class="text-left">Applicant No</td><td width="10%"><?php echo $CustomerID; ?></td>
	</tr>
	<tr>
	  <td width="10%" class="text-left">Student Name</td><td><?php echo $Name; ?></td>
	</tr>
	<tr>
	  <td width="10%" class="text-left">Amount</td><td><?php echo $Amount; ?></td>
	</tr>
	<tr>
	  <td width="10%" class="text-left">Bank Name</td><td><?php echo $BankName; ?></td>
	</tr>
	<tr>
	  <td width="10%" class="text-left">Bank Account No</td><td><?php echo $BankAccountNo; ?></td>
	</tr>
	<tr>
	  <td class="text-left" colspan="2"><?php echo $_Lang['bankpaymentsImageIcon']; ?></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="3" >
   <tr>
      <td class="tabletext">
      <div align="right">
			<input name="ReceiptNo" type="hidden" class="table_text" id="ReceiptNo" style="width:100%" value="<?php echo $ReceiptNo; ?>" />	
	  		<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="<?php echo $lang['previousButton']; ?>" 
						onClick="loadmypage('<?php echo $PreviousStepFileName; ?>?CustomerID=<?php echo $CustomerID ?>'+
											'&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>&CurrentStep=<?php echo $PreviousStep; ?>','defaultpage','progressbar','<?php echo $PreviousOption; ?>','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $PreviousStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>','<?php echo $ApplicantNo; ?>','<?php echo $ProgrammeID; ?>','<?php echo $EntityID3; ?>','<?php echo $EntityID4; ?>')"/>
			<?php
			if($Submitted != 1)
			{
			?>
			<input name="navigatetopreviouspage" type="button" class="button primary" id="navigatetopreviouspage" value="Submit" 
					      onclick="deleteConfirm('<?php echo $lang['submitConfirmationDeclaration']; ?>','<?php echo $CurrentStepFileName; ?>?submit=1'+
							'&IAgree='+document.getElementById('IAgree').checked+
							'&IDisagree='+document.getElementById('IDisagree').checked+
							'&ReceiptNo=<?php echo $ReceiptNo ?>'+
							'&ProgrammeID=<?php echo $ProgrammeID ?>'+
							'&CurrentStep=<?php echo $CurrentStep; ?>'+
							'&amp;UserID=<?php echo $UserID; ?>'+
							'&ApplicantNo=<?php echo $ApplicantNo; ?>'+
							'&Submitted=<?php echo $Submitted; ?>&CustomerID=<?php echo $CustomerID;?>','defaultpage','progressbar')"	
		
						
						onClick="loadmypage('<?php echo $NextStepFileName; ?>?CustomerID=<?php echo $CustomerID ?>'+
											'&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>&CurrentStep=<?php echo $NextStep; ?>','defaultpage','progressbar','<?php echo $NextOption; ?>','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $CurrentStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>')"/>
			<?php
			}
?>	
			<input name="navigatetopreviouspage" type="button" class="button" id="navigatetopreviouspage" value="<?php echo $lang['closeButton']; ?>" 
						onClick="loadmypage('studentapplicant_list.php?CustomerID=<?php echo $CustomerID ?>'+
											&Submitted=<?php echo $Submitted; ?>&ApplicantNo=<?php echo $ApplicantNo; ?>&UserID=<?php echo $UserID; ?>&ProgrammeID=<?php echo $ProgrammeID ?>','defaultpage','progressbar','studentapplicantlist','<?php echo $CustomerID; ?>','<?php echo $UserID; ?>','<?php echo $PreviousStep; ?>','<?php echo $CurrentStep; ?>','<?php echo $NextStep; ?>','<?php echo $ApplicationID; ?>','<?php echo $CurrentOption; ?>','<?php echo $CurrentStepScreen; ?>','<?php echo $EntityID; ?>','<?php echo $Submitted; ?>','<?php echo $IsAdditionalInfo; ?>','<?php echo $Approved; ?>','<?php echo $readonly; ?>','<?php echo $defaultpage; ?>','<?php echo $closepage; ?>','<?php echo $msgPlaceHolderID; ?>','<?php echo $IsInbox; ?>','<?php echo $IsSent; ?>','<?php echo $IsDraft; ?>','<?php echo $IsSpam; ?>','<?php echo $destination1; ?>','<?php echo $destination2; ?>','<?php echo $destination3; ?>','<?php echo $destination4; ?>','<?php echo $includeoption1; ?>','<?php echo $includeoption2; ?>','<?php echo $includeoption3; ?>','<?php echo $includeoption4; ?>')"/>


        </div>        
		</td>
    </tr>
</table>
</div>

</div>