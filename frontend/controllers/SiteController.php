<?php
namespace frontend\controllers;

require_once 'includes/mailsender.php';

use Yii;
use common\models\LoginForm;
use common\models\Profiles;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin1()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
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
            $identity = Profiles::findOne(['UserName' => $UserName]);
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
                    Yii::$app->user->login($identity);
                    $baseUrl = Yii::$app->request->baseUrl;

                    if ($identity->AccountTypeID == 1) {
                        Yii::$app->getResponse()->redirect($baseUrl . '/studentapplication');
                    } else if ($identity->AccountTypeID == 2) {
                        Yii::$app->getResponse()->redirect($baseUrl . '/courseregistration');
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
    

    public function actionSay($message='Hello')
    {
        return $this->render('say', ['message' => $message]);
    }

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
            return $this->render('contact', 
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
    public function actionContinuing()
    {
        $params = Yii::$app->request->post();
        $profile =  Profiles::find()
            ->where(['CustomerID' => $params['StudentNo']])
            ->one();
        if (empty($profile)) {
            return $this->goHome();
        }else{
            $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            $profile->Password = hash('sha512', $params['Password'] . $random_salt);
            $profile->Salt = $random_salt;
            $profile->AccountTypeID = 1;
            $profile->Email = $params['Email'];
            
            $template = Messagetemplates::find()->where(['Template Code' => 'TEMP001'])->one();
            $subject = $template['Template Subject'];
            $message = $template['Template Text'];
                
        }
print_r($template);exit;
        return $this->render('dashboard', []);
    }

    public function actionRegister()
    {
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $model = new Profiles();
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

                $message = str_replace("#USERNAME#", $model->UserName, $message);
                $message = str_replace("#FIRSTNAME#", $model->FirstName, $message);
                $message = str_replace("#PROFILEID#", $model->ProfileID, $message);

                $activation_url = 'http://' . $_SERVER['HTTP_HOST'] . Yii::$app->request->baseUrl . '/site/activate?id=' . $model['ProfileID'];
                $activation_anchor = "<a href=".$activation_url."> here </a>";
                $message = str_replace("#LINK#", $activation_anchor, $message);

                $SMS = str_replace("#USERNAME#", $model->UserName, $SMS);
                $SMS = str_replace("#FIRSTNAME#", $model->FirstName, $SMS);

                $EmailArray[] = array('Email' => $model->Email, 'Name' => $model->UserName);

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

                //$msg = "An actiavtion link has been sent to your email. Please activate your account to be able to log in";
                Yii::$app->getSession()->setFlash('msg', $msg);
                return $this->redirect(['index']);

            } else {
                print_r($model->getErrors());
                exit;
            }
        } else {
            return $this->render('register', []);
        }

    }

        public function actionRegister2()
    {
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $model = new Profiles();
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

                $message = str_replace("#USERNAME#", $model->UserName, $message);
                $message = str_replace("#FIRSTNAME#", $model->FirstName, $message);
                $message = str_replace("#PROFILEID#", $model->ProfileID, $message);

                $activation_url = 'http://' . $_SERVER['HTTP_HOST'] . Yii::$app->request->baseUrl . '/site/activate?id=' . $model['ProfileID'];
                $activation_anchor = "<a href=".$activation_url."> here </a>";
                $message = str_replace("#LINK#", $activation_anchor, $message);

                $SMS = str_replace("#USERNAME#", $model->UserName, $SMS);
                $SMS = str_replace("#FIRSTNAME#", $model->FirstName, $SMS);

                $EmailArray[] = array('Email' => $model->Email, 'Name' => $model->UserName);

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

                //$msg = "An actiavtion link has been sent to your email. Please activate your account to be able to log in";
                Yii::$app->getSession()->setFlash('msg', $msg);
                return $this->redirect(['index']);

            } else {
                print_r($model->getErrors());
                exit;
            }
        } else {
            return $this->render('register2', []);
        }

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

        $form = new LoginForm();

        if (!empty($model)) {
            if ($model->Status == 1) {
                $msg = "Your account is already activated";  
                Yii::$app->session->setFlash('msg', $msg);             
                return $this->render('login', [ 'model' => $form ]);
            }
             $baseUrl = Yii::$app->request->baseUrl;
            $model->Status = 1;
            if ($model->save()) {
                // return $this->render('activated');
                $msg = "Your account has Successfully been activated";
                Yii::$app->session->setFlash('msg', $msg);
                return $this->redirect($baseUrl . '/courseregistration');
                // Yii::$app->getResponse()->redirect($baseUrl . '/courseregistration');
            } else {
                return $this->render('invalid');
            }
        } else {
            return $this->render('invalid');
        }
    }

}
