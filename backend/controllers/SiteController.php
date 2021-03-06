<?php
namespace backend\controllers;

use common\models\Profiles;
use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\HttpException;

/**
* Site controller
*/
class SiteController extends Controller
{
	/**
	* @inheritdoc
	*/
	private $userDepartment;
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'actions' => ['login', 'error', 'StudentClearance'],
					],
					[
						'actions' => ['logout', 'index', 'StudentClearance'],
						'allow' => true,
						'roles' => ['@'],
					],

				],
				'denyCallback' => function ($rule, $action) {
					if (\Yii::$app->user->isGuest) {
						return $this->redirect(['site/login']);
					} else {
						throw new HttpException('403', 'You are not allowed to access this page');
					}
				}
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout1' => ['post'],
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
		];
	}

	public function actionIndex()
	{
		return $this->render('index');


	}

	public function actionLogin1()
	{
		if (!\Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			return $this->goBack();
		} else {
			return $this->render('login', [
				'model' => $model,
			]);
		}
	}

	public function actionRegister()
	{
		return $this->render('index');
	}

	public function actionStudentclearance()
	{
		print_r($_SESSION);
	}



	/**
	* @return string|\yii\web\Response
	*/
	public function actionLogin()
	{
		$params = Yii::$app->request->post();
		if (!empty($params)) {
			$UserName = $params['UserName'];
			$password = $params['p'];
			$identity = Profiles::findOne(['UserName' => $UserName]);
			//print
			//$IPAddress = get_client_ip();			
			if (!empty($identity)) {				
				$Salt = $identity->Salt;
				$db_password = $identity->Password;
				$Password = hash('sha512', $password . $Salt);
				if ($db_password == $Password && ($identity->AccountTypeID == 4 || $identity->AccountTypeID == 5)) {
					// Logged in User
					Yii::$app->user->login($identity);
					$baseUrl = Yii::$app->request->baseUrl;


					return $this->goBack();
					//					Yii::$app->getResponse()->redirect($baseUrl . '/studentapplication');
				} else {
					//print_r($identity); exit;
					return $this->render('login', ['error' => 'Invalid Username or Password']);
				}
			} else {
				// Log Failed Login
				return $this->render('login', ['error' => 'Invalid Username or Password']);
			}
		} else {
			// Yii::$app->user->login($identity);
			// $baseUrl = Yii::$app->request->baseUrl;
			// return $this->goBack();
			return $this->render('login');
			//redirect('staff');
		}
	}


	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}
}
