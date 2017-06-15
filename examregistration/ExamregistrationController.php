<?php

namespace backend\controllers;

use Yii;
use common\models\Examregistration;
use common\models\Studentunits;
use common\models\Lecturerunits;
use common\models\AcademicYear;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Dimensionvalue;
use common\models\Stream;
use common\models\Courses;
use yii\web\HttpException;

/**
* CourseregistrationController implements the CRUD actions for Courseregistration model.
*/
class ExamregistrationController extends Controller
{
	/**
	* @inheritdoc
	*/
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['POST'],
				],
			],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@']
					]
				],
				'denyCallback' => function ($rule, $action) {
					if (\Yii::$app->user->isGuest) {
						return $this->redirect(['site/login']);
					} else {
						throw new HttpException('403', 'You are not allowed to access this page');
					}
				}
			]
		];
	}

	public function beforeAction($action)
	{
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

	/**
	* Lists all Courseregistration models.
	* @return mixed
	*/
	public function actionIndex()
	{
		$baseUrl = Yii::$app->request->baseUrl;
		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
        $CustomerID = $identity->CustomerID;
		//get lecturer units
		$unitsSQL = "select un.Programme, un.Semester, un.Unit, un.Stage, d.Name, us.Desription from [CUEA\$Lecturers Qualified Units] as un inner join [CUEA\$Dimension Value] as d on un.Programme = d.Code inner join CUEA\$Units_Subjects as us on us.Code = un.Unit where d.[Dimension Code] = 'PROGRAMME' and Lecturer = '$CustomerID'";

		$result = Examregistration::findBySql($unitsSQL)->asArray()->all();
		$rss = array();
		foreach ($result as $key => $row) {
			$rss[] = array(
				$row['Programme'],
				$row['Semester'],
				$row['Unit'],
				$row['Stage'],
				$row['Name'],

				$row['Desription'],);
		}
		$json = json_encode($rss);
		//print_r($json);exit;
		return $this->render('index', ['json' => $json]);
	}

	/**
	* Displays a single Courseregistration model.
	* @param string $id
	* @return mixed
	*/
	public function actionView()
	{
		$gparams = Yii::$app->request->get();

		//print_r($gparams);exit;

		$yearModel = AcademicYear::find()
			->where(["Current" => 1])->one();
		if (empty($yearModel)) {
			print_r('Missing setup for Current Academic Year'); exit;
		}
		$year = $yearModel->Code;
			//print_r($year); exit;
		$model = Examregistration::find()->asArray()
				->where("[Programme ID] = '".$gparams['ProgrammeID'].
							"' AND [Term ID] = '".$gparams['TermID']. 
							"' AND [Stage ID] = '".$gparams['StageID'].
							"' AND [Academic Year]='".$year.
							//"' AND [Exam Type ID] ='".$gparams['ExamTypeID'].
							"' AND [ProgrammeCourseID] ='".$gparams['ProgrammeCourseID'].
							"'" )->all();

				//print_r($model['Programme ID'] ); exit;
		//var_dump($model->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql);

		$params = Yii::$app->request->post();
		if (!empty($params))
		{
			foreach ($params AS $key => $value)
			{
				$results = explode('|',$key);

				if (isset($results[0]) && ($results[0]=='EX'))
				{
					//echo $results[6].'</br>';
					$marks = Examregistration::find()->where([
						'Programme ID'=>$gparams['ProgrammeID'],
						'Term ID' => $gparams['TermID'],
						'Stage ID' => $gparams['StageID'],
						'Academic Year' => $gparams['AcademicYear'],
						'Exam Type ID' => $gparams['ExamTypeID'],
						'ProgrammeCourseID' => $gparams['ProgrammeCourseID'],
						'Student ID' => $results[7],
						] )
						->one();
						//print_r($marks);
						//echo "</br>";
						$marks['Actual Mark'] = $value;
						$marks->save();
					}

				}
				$model = Examregistration::find()->asArray()->where("[Programme ID] = '".$gparams['ProgrammeID']."' AND [Term ID] = '".$gparams['TermID']. "' AND [Stage ID] = '".$gparams['StageID']."' AND [Academic Year]='".$gparams['AcademicYear']."' AND [Exam Type ID] ='".$gparams['ExamTypeID']."'" )->one();
				return $this->render('view', [ 'model' => $model]);
			} else
			{
				return $this->render('view', [ 'model' => $model]);

			}
		}

		/**
		* Creates a new Courseregistration model.
		* If creation is successful, the browser will be redirected to the 'view' page.
		* @return mixed
		*/
		public function actionCreate()
		{
			$model = new Courseregistration();
			$identity = Yii::$app->user->identity;
			$ProfileID = $identity->ProfileID;
			$CustomerID = $identity->CustomerID;
			$params = Yii::$app->request->post();
			if (!empty($params))
			{
				//exit;
				$types = $model->getTableSchema()->columns;

				foreach($model AS $key => $value)
				{

					$key1 = str_replace(" ","_",$key);
					if (array_key_exists($key1,$params))
					{
						if ($key == 'Entry No_')
						{

						} else
						{
							$model[$key] = $params[$key1];
						}
					} else if ($key == 'Entry No_')
					{

					} else
					{
						if ($types["$key"]->type == 'string')
						{
							$model[$key] = '.';
						} else if (($types["$key"]->type == 'integer')  OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal'))
						{
							$model[$key] = '0';
						} else if ($types["$key"]->type == 'datetime')
						{
							$model[$key] = '1753-01-01 00:00:00.000';
						}

						//
					}
				}
				$model['Reg_ Transacton ID'] = (string)time();
				$model['Registration Date'] = date('Y-m-d');
				$model['Student No_'] = $CustomerID;
				$model['Student Status'] = 1;
				$model['Student Type'] = '1';

				if ($model->save())
				{
					return $this->redirect(['index']);
				} else
				{
					$errors = $model->getErrors();
					$founderrors = '';
					foreach ($errors AS $key => $value)
					{
						foreach ($value AS $key1 => $avalue)
						{

							$founderrors .= $avalue;
						}
					}
					print_r($errors);
				}
			} else {
				return $this->render('create', [ 'model' => $model ]);
			}
		}

		/**
		* Updates an existing Courseregistration model.
		* If update is successful, the browser will be redirected to the 'view' page.
		* @param string $id
		* @return mixed
		*/
		public function actionUpdate($id)
		{
			$model = $this->findModel($id);

			$params = Yii::$app->request->post();

			//print_r($params); exit;
			if (!empty($params))
			{
				foreach($model AS $key => $value)
				{
					$key1 = str_replace(" ","_",$key);
					if (array_key_exists("$key1",$params))
					{
						$model["$key"] = $params["$key1"];
					}
				}
				$model['Academic Year'] = $params["Academic_Year"];
				if ($model->save())
				{
					return $this->redirect(['index']);
				} else
				{
					print_r($model->getErrors()); exit;
				}
			} else {
				return $this->render('update', [ 'model' => $model ]);
			}
		}

		/**
		* Deletes an existing Courseregistration model.
		* If deletion is successful, the browser will be redirected to the 'index' page.
		* @param string $id
		* @return mixed
		*/
		public function actionDelete($id)
		{
			$this->findModel($id)->delete();

			return $this->redirect(['index']);
		}

		/**
		* Finds the Courseregistration model based on its primary key value.
		* If the model is not found, a 404 HTTP exception will be thrown.
		* @param string $id
		* @return Courseregistration the loaded model
		* @throws NotFoundHttpException if the model cannot be found
		*/
		protected function findModel($id)
		{
			if (($model = Examregistration::findOne($id)) !== null) {
				return $model;
			} else {
				throw new NotFoundHttpException('The requested page does not exist.');
			}
		}

		public function actionGetsemester()
		{
			$channel = array();
			$params = Yii::$app->request->get();

			$Programme = $params['Programme'];
			$result = Dimensionvalue::find()->asArray()->where("[Student Term] = 1 AND [Programme Code] = '$Programme'")->orderBy('Name')->all();
			$channel[] = array(
				"name" => "Successful",
				"message" => "Successful Transaction.",
				"code" => "00",
				"status" => 200,
			);
			foreach ($result AS $key => $row)
			{
				extract($row);
				$channel[] = array(
					"sID" => $Code,
					"sName" => $Name
				);
			}
			$json = json_encode($channel);
			echo $json;
		}

		public function actionGetstage()
		{
			$channel = array();
			$params = Yii::$app->request->get();

			$Programme = $params['Programme'];
			$result = Dimensionvalue::find()->asArray()->where("[Student Programme Stage] = 1 AND [Programme Code] = '$Programme'")->orderBy('Name')->all();
			$channel[] = array(
				"name" => "Successful",
				"message" => "Successful Transaction.",
				"code" => "00",
				"status" => 200,
			);
			foreach ($result AS $key => $row)
			{
				extract($row);
				$channel[] = array(
					"sID" => $Code,
					"sName" => $Name
				);
			}
			$json = json_encode($channel);
			echo $json;
		}

		public function actionGetstream()
		{
			$channel = array();
			$params = Yii::$app->request->get();

			$Programme = $params['Programme'];
			$Stage = $params['Stage'];
			$Semester = $params['Semester'];
			$AcademicYear = $params['AcademicYear'];

			$result = Stream::find()->where("[Programme ID] = '$Programme' AND [Stage ID] = '$Stage' AND [Term ID] = '$Semester' AND [Academic YearID] = '$AcademicYear'")->asArray()->orderBy('Stream Name')->all();
			$channel[] = array(
				"name" => "Successful",
				"message" => "Successful Transaction.",
				"code" => "00",
				"status" => 200,
			);
			foreach ($result AS $key => $row)
			{
				//extract($row);
				$channel[] = array(
					"sID" => $row['Stream Code'],
					"sName" => $row['Stream Name'],
				);
			}
			$json = json_encode($channel);
			echo $json;
		}
	}
