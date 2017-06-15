<?php
$subject = "Transaction Details";
    $message = $this->Messagetemplate();    
    
    //$message = str_replace("#LASTNAME#",$model['LastName'],$message);
    //$message = str_replace("#FIRSTNAME#",$model['FirstName'],$message);
    $message = str_replace("#REFERENCENUMBER#",'##'$RefNumber,$message);
     
    $EmailArray[] = array('Email'=>$model->Email, 'Name'=>$model->Name);
    
    if (count($EmailArray)!=0)
    {
     $sent = SendMail($EmailArray,$subject ,$message);   
     if ($sent==1)
     {
      $msg = "An Email with further instructions has been sent to your provided email.";
     } else
     {
      $msg = "Failed to send Mail";
     }
    } else
    {
     $msg ="No Email address has been provided";

    }
    $Amount = $params['Amount'];
    // Forward Email to Support
    $subject = 'Transaction Details';
    $message = '<p><strong>Transaction Details</strong></p>
       <p>Your have received the following transaction details.</p>
       <p>TransactionrefNo : '.$params['TransactionrefNo'].'<br />
       Amount : '.$params['Amount'].'<br />
       
      
       <p>Subject : '.$params['Subject'].'</p><br>
       <p>Message: '.$params['Message'].'</p>
       <p>&nbsp;</p>
       <p>Regards,</p>
       <p>Administrator<br />

       </p>';
     
    $EmailArray[] = array('Email'=>'support@cuea.edu', 'Name'=>'Support');
    
    if (count($EmailArray)!=0)
    {
     $sent = SendMail($EmailArray,$subject ,$message);   
     if ($sent==1)
     {
      $msg = "An Email with further instructions has been sent to your provided email.";
     } else
     {
      $msg = "Failed to send Mail";
     }
    } else
    {
     $msg ="No Email address";
    }
         
   } else {
    $msgArray = $model->getErrors();
   }
   
   return $this->render('support', ['msgArray'=>$msgArray]);
  } else {
   return $this->render('support', ['msgArray'=>array()]);
  }         
