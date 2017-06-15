<?php
use app\models\Smsoutgoing; 

function send_sms($Message, $Mobile)
{
	$Username = 'attain';
	$Password = 'M@yaiMbili1';
	$url = "https://bulksms.vsms.net/eapi/submission/send_sms/2/2.0?";
	$_message = urlencode($Message);
	$url .= "username=$Username&password=$Password&message=$_message&msisdn=$Mobile";
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$data = curl_exec($ch);
	curl_close($ch);
	//return $data;	
	$SMSOutgoingStatusID = 40;
	$ReferenceNumber = '';
	if ($data != '')
	{
		$DataArray = explode('|',$data);
		$SMSOutgoingStatusID = $DataArray[0];
		$ReferenceNumber = $DataArray[2];	
	}
	$model = new Smsoutgoing();  
	$model->Message = $Message;
	$model->Origin = '';
	$model->Destination = $Mobile;
	$model->SMSOutgoingStatusID = $SMSOutgoingStatusID;
	$model->ReferenceNumber = $ReferenceNumber;
	$model->save();
}
?>