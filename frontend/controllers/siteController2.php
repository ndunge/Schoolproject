<?php
namespace frontend\controllers;

require_once 'includes/mailsender.php';

use Yii;
use common\models\LoginForm;
use common\models\Profiles;
use common\models\Support;
use common\models\Studentapplication;
use common\models\Messagetemplates;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdo
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','activate'],
                'rules' => [
                    [
                        'actions' => ['signup', 'activate','index','support'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
               // 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		if (empty(Yii::$app->user->identity))
		{
			return $this->render('index');
		} else
		{
			return $this->render('home');
		}
    }
	
    /**
     * Logs in a user.
     *
     * @return mixed
     */
	 
	 public function actionSupport()
    {
  $params = Yii::$app->request->post(); 
  if (!empty($params))
  {
   $model = new Support();
   foreach($model AS $key => $value)
   {
    if (array_key_exists($key,$params))
    {
     $model[$key] = $params[$key];  
    } 
   }
   $Char2 = time();
   $Char1 = "BCDVGTAEOU";
   $RefNumber = time();//generateRandomString(3,(string)$Char1).generateRandomString(5,(string)$Char2);
   $model->RefNumber =$RefNumber;
   if ($model->save())
   {
    $msgArray['Error'][0] = "Your Query was submitted sucessfully.  Your reference Number is ". $RefNumber. ". A member of our team will be in touch with you shortly." ;

    //$template = Messagetemplates::find()->where(['TemplateCode' => 'TEMP014'])->one();
    $subject = "Support Request";
    $message = $this->Messagetemplate();    
    
    //$message = str_replace("#LASTNAME#",$model['LastName'],$message);
    //$message = str_replace("#FIRSTNAME#",$model['FirstName'],$message);
    $message = str_replace("#REFERENCENUMBER#",$RefNumber,$message);
     
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
     $msg ="No Email address";
    }
    $Name = $params['Name'];
    // Forward Email to Support
    $subject = 'Support Request';
    $message = '<p><strong>Support Request    </strong></p>
       <p>Your have received the following support Request.</p>
       <p>Name : '.$params['Name'].'<br />
       Mobile : '.$params['Mobile'].'<br />
       Email : '.$params['Email'].'</p>
       <p>Subject : '.$params['Subject'].'</p>
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
    }
    public function actionLogin1()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Profiles();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
    
   public function actionLogin()
	{
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $UserName = $params['UserName'];
            $password = $params['p'];
            $identity = Profiles::findOne(['Email' => $UserName]);
			
            //$IPAddress = get_client_ip();
            if (!empty($identity)) {
                $Salt = $identity->Salt;
                $db_password = $identity->Password;
                $Password = hash('sha512', $password . $Salt);
                if ($db_password == $Password) {

                    if ($identity->Status === 0) {
                        return $this->render('index', ['error' => 'Activate your account first. Check your email for activation link']);
                    }
                    // Logged in User
                   $res= Yii::$app->user->login($identity);
				    //var_dump(Yii::$app->user->identity);exit;
                    $baseUrl = Yii::$app->request->baseUrl;
                    if ($identity->AccountTypeID == 1) 
					{
						if(empty(Studentapplication::findone(['ProfileID'=>$identity->ProfileID])))
						{
							Yii::$app->getResponse()->redirect($baseUrl . '/studentapplication/create');
						}else{
							Yii::$app->getResponse()->redirect($baseUrl . '/studentapplication');
						}
                    } else if ($identity->AccountTypeID == 2) 
					{
                        Yii::$app->getResponse()->redirect($baseUrl . '/site');
                    }

                } else {
                    return $this->render('index', ['error' => 'Invalid Username or Password']);
                }


            } else {
                // Log Failed Login
                return $this->render('index', ['error' => 'Invalid Username or Password']);
            }
        } else {
			 return $this->render('index');
        }
    }
    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $baseUrl = Yii::$app->request->baseUrl;
        Yii::$app->getResponse()->redirect($baseUrl);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionDashboard()
    {

        return $this->render('dashboard', []);
    }
	
	public static function emailexists($email)
	{
		//print_r(Profiles::findone(['Email'=>$email,'AccountTypeID'=>1])); exit;
		if(count(Profiles::findone(['Email'=>$email,'AccountTypeID'=>1]))>0)
		{
			return true;
		} else {
			return false;
		}
	}

   public function actionRegister()
    {
        $params = Yii::$app->request->post();

		$model = new Profiles();
        if (!empty($params)) {
			
			if ($this->emailexists($params['Email']))
			{
				//echo "hey";
				foreach($params as $var => $value) {
					if($model->hasAttribute($var))
					$model->$var = $value;
				}
				//print_r($model);exit;
				
				return $this->render('register', [
					'model'=>$model,
					'params'=>$params,
					'message'=>'the email already exists'
				]);
				
			} else if ((!isset($params['p']))or ($params['p']==''))
			{
				return $this->render('register', [
					'model'=>$model,
					'params'=>$params,
					'message'=>'Invalid Username or Password'
				]);
			}else {
				
				$types = $model->getTableSchema()->columns;
				foreach ($model AS $key => $value) {
					if (array_key_exists($key, $params)) {
						$model[$key] = $params[$key];
					} else if ($key == 'ProfileID') {

					} else {
						if ($types["$key"]->type == 'string') {
							$model[$key] = '';
						} else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
							$model[$key] = '0';
						} else if ($types["$key"]->type == 'datetime') {
							$model[$key] = '1753-01-01 00:00:00.000';
						}
					}
				}
				$Password = $_REQUEST['p'];
				$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
				$activation_code = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
				$Password = hash('sha512', $Password . $random_salt);
				$model->AccountTypeID = 1;
				$model->CustomerID = '';
				$model->MiddleName = '';
				$model->Password = $Password;
				$model->Salt = $random_salt;
				if ($model->save()) {
					$FirstName = $model->FirstName;
					$Email = $model->Email;

					$template = Messagetemplates::find()->where(['Template Code' => 'TEMP001'])->one();
					$subject = $template['Template Subject'];
					$message = $template['Template Text'];
					$SMS = $template->SMS;

					$message = str_replace("#LASTNAME#", $model->LastName, $message);
					$message = str_replace("#FIRSTNAME#", $model->FirstName, $message);
					$message = str_replace("#PROFILEID#", $model->ProfileID, $message);

					$activation_url = 'http://' . $_SERVER['HTTP_HOST'] . Yii::$app->request->baseUrl . '/site/activate?id=' . $model['ProfileID'];
					$activation_anchor = "<a href=".$activation_url."> here </a>";
					$message = str_replace("#LINK#", $activation_anchor, $message);

					$SMS = str_replace("#LASTNAME#", $model->LastName, $SMS);
					$SMS = str_replace("#FIRSTNAME#", $model->FirstName, $SMS);

					$EmailArray[] = array('Email' => $model->Email, 'Name' => $model->LastName);

					if (count($EmailArray) != 0) {
						$sent = SendMail($EmailArray, $subject, $message);
						if ($sent == 1) {
							$msg = "Activate your account first. Check your email for activation link";
							
						} else {
							$msg = "Failed to send Mail";
						}
					} else {
						$msg = "No Email address";
					}

					$msg = "An actiavtion link has been sent to your email. Please activate your account to be able to log in";
					Yii::$app->getSession()->setFlash('msg', $msg);
					
					return $this->render('index',['error'=>$msg]);

				} else {
					print_r($model->getErrors());
					exit;
				}
			}
        } else {
            return $this->render('register', ['model'=>$model]);
        }

    }
	
	public function actionTesting()
	{
		

                $EmailArray[] = array('Email' => 'winniekimani@gmail.com', 'Name' => 'Winnie');

                if (count($EmailArray) != 0) {
					
					$subject='Testing';
					$message='we are testing';
					
                    
                    $sent = SendMail($EmailArray, $subject, $message);
                    if ($sent == 1) {
                        $msg = "Saved Details Successfully";
                    } else {
                        $msg = "Failed to send Mail";
                    }
                } else {
                    $msg = "No Email address";
                }
				echo $msg;
	}

    public function actionProfile()
    {
        $identity = Yii::$app->user->identity;
        $ProfileID = $identity->ProfileID;
        $model = Profiles::findOne($ProfileID);

        $params = Yii::$app->request->post();
        if (!empty($params)) {
            foreach ($model AS $key => $value) {
                if (array_key_exists($key, $params)) {
                    $model[$key] = $params[$key];
                }
            }
            if ($model->save()) {
                return $this->render('profile', ['model' => $model, 'error' => 'Saved Successfully']);
            } else {
                return $this->render('profile', ['model' => $model, 'error' => 'Faild to Save']);
                //print_r($model->getErrors()); exit;
            }
        } else {
            return $this->render('profile', ['model' => $model]);
        }
    }

    public function actionChangepassword()
    {
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $identity = Yii::$app->user->identity;
            $ProfileID = $identity->ProfileID;
            $model = Profiles::findOne($ProfileID);
            $OldPassword = $params['op'];
            $NewPassword = $params['np'];
            $ConfirmPassword = $params['cp'];

            $OldPassword = hash('sha512', $OldPassword . $model->Salt);
            if ($OldPassword != $model->Password) {
                $msg = "Invalid Password";
            } else {
                $NewPassword = hash('sha512', $NewPassword . $model->Salt);
                $model->Password = $NewPassword;
                if ($model->save()) {
                    $msg = "Your password has been changed sucessfully";
                } else {
                    $msg = "An error occured and we were not able to complete your request";

                    // print_r($msg);exit();
                    //print_r($model->getErrors()); exit;
                }
            }
            return $this->render('changepassword', ['msg' => $msg]);

        } else {
            return $this->render('changepassword');
        }
    }

    public function actionActivate($id)
    {
        $model = Profiles::findOne($id);

        if (!empty($model)) 
		{
            if ($model->Status == 1) 
			{
                $msg = "Your account is already activated";  
                Yii::$app->session->setFlash('msg', $msg);              
                return $this->render('index', [ 'error' => $msg ]);
            }
            $baseUrl = Yii::$app->request->baseUrl;
            $model->Status = 1;
            if ($model->save()) 
			{
                // return $this->render('activated');
                $msg = "Your account has Successfully been activated";
                Yii::$app->session->setFlash('msg', $msg);
                //return $this->redirect($baseUrl . '/courseregistration');
				return $this->render('index', [ 'error' => $msg ]);
            } else {
                return $this->render('invalid');
            }
        } else {
            return $this->render('invalid');
        }
    }
	
	public static function Messagetemplate()
    {
		return '<p>Dear Member,</p> 
		 <p>Your request has been received and is being reviewed by our Merchant Support team. 
			We are working to get back to you as soon as possible.</p>		 
		 <p>Kindly note our working hours are; Monday to Friday 7.00am to 7pm and Saturday 9am to 1pm. 
			We regret the delay in reply over the non-working hours.</p>		 
		 <p>To add comments, reply to this email.</p>		 
		 <p>To contact us by phone, please call us at <span dir="ltr"><span dir="ltr">
		 <img src="resource://skype_ff_extension-at-jetpack/skype_ff_extension/data/call_skype_logo.png" 
		 style="height:0px; width:0px" /></span></span>+254 (780) 532 371 and refer to your ticket number 
		 (#REFERENCENUMBER#).</p>';
	}
	
	public static function ForgotPasswordMessage()
    {
		return '<p>Dear #FIRSTNAME#,</p>
		<p>We received a request to reset your  password. Click the link below to choose a new one:</p>
		<p><a href="http://students.cuea.edu/site/reset?id=#ID#" target="_blank">Reset Your Password</a></p>';
	}
	
	public function actionHome()
	{
		return $this->render('home');
	}
	
	public function actionForgotpassword()
	{
		$msg = "";
		$params = Yii::$app->request->post();
		if ((!empty($params)) and ($params['Email']!=''))
		{
			$model = Profiles::findone(['Email'=>$params['Email']]);
			if (empty($model))
			{
				return $this->render('forgotpassword',['msg' => 'The email address provided is invalid']);
			} else
			{
				$Key = Yii::$app->params['Key'];
				
				$EncProfileID = $this->my_number_encrypt($model->ProfileID,$Key);
				$EncProfileID = urlencode($EncProfileID);
				
				$message = $this->ForgotPasswordMessage();
				$message = str_replace("#FIRSTNAME#", $model->FirstName, $message);
				$message = str_replace("#ID#", $EncProfileID, $message);
				
				$subject = "Password reset link";
				
				$EmailArray[] = array('Email' => $model->Email, 'Name' => $model->LastName);

				if (count($EmailArray) != 0) {
					$sent = SendMail($EmailArray, $subject, $message);
					if ($sent == 1) 
					{
						$msg = "An email with reset instruction has been sent to your Email.";
					} else 
					{
						$msg = "The system failed to send a reset Email.  Please try again";
					}
				} else 
				{
					$msg = "The email address provided is invalid";
				}
				return $this->render('forgotpassword',['msg' => $msg]);
			}
		} else
		{
			if ((isset($params['Email'])) and ($params['Email']==''))
			{
				$msg = "The email address provided is invalid";
			}
			return $this->render('forgotpassword',['msg' => $msg]);
		}
	}	
	
	public function actionReset($id)
	{
		$msg = "";
		$params = Yii::$app->request->post();
		if ((!empty($params)) and ($id!=''))
		{
			$Key = Yii::$app->params['Key'];
			
			$decpRrofileID = $this->my_number_decrypt($id, $Key);
			
			$model = Profiles::findOne(['ProfileID' => $decpRrofileID]);			
            if (!empty($model)) 
			{
                $Salt = $model->Salt;
				$NewPassword = $params['np'];
				$ConfirmPassword = $params['cp'];
                if ($NewPassword == $ConfirmPassword) 
				{
					$model->Password = hash('sha512', $NewPassword . $Salt);
					$model->save();	
					return $this->render('index',['error' => 'Your password has been reset sucessfully']);					
				} else
				{
					return $this->render('resetPassword',['id' => $id, 'msg' => 'Your passwords do not match']);
				}
			} else
			{
				return $this->render('resetPassword',['id' => $id, 'msg' => 'Unable to reset your password']);
			}
		} else
		{
			return $this->render('resetPassword',['id' => $id]);
		}
	}
	
	public static function my_number_encrypt($data, $key, $base64_safe=true, $shrink=true) 
	{
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

		if ($shrink) $data = base_convert($data, 10, 36);
		//$data = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $data, MCRYPT_MODE_STREAM);
		$data = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv);
		if ($base64_safe) $data = str_replace('=', '', base64_encode($data));
		return $data;
	}

	public static function my_number_decrypt($data, $key, $base64_safe=true, $expand=true) 
	{
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		if ($base64_safe) $data = base64_decode($data.'==');
		$data = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv);
		//$data = @mcrypt_encrypt(MCRYPT_ARCFOUR, $key, $data, MCRYPT_MODE_STREAM);
		if ($expand) $data = base_convert($data, 36, 10);
		return $data;
	}
}
