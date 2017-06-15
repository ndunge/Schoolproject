<?php

namespace backend\controllers;

use Yii;
use common\models\Assignments;
use common\models\Assignmentdocs;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignmentsController implements the CRUD actions for Assignments model.
 */
class AssignmentsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
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
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
     * Lists all Assignments models.
     * @return mixed
     */
    public function actionIndex()
    {
		$baseUrl = Yii::$app->request->baseUrl;
		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
		$CustomerID = $identity->CustomerID;

		$result = Assignments::find()->where("ProfileID = '$ProfileID'")->asArray()->all();
		
		$channel = array();
		foreach ($result AS $key => $row) 
		{
			//extract($row); 
			$channel[] = array(
								$row['AssignmentID'],
								$row['CourseCode'],
								$row['Title'],
								$row['CreatedDate'],
								$row['DueDate'],			
							);
		}  		
		$rss = $channel;
		$json = json_encode($rss);		
		
        return $this->render('index', ['json' => $json]);
    }

    /**
     * Displays a single Assignments model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Assignments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Assignments();
		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
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
                    if ($key != 'AssignmentID')
                    {
                        $model[$key] = $params[$key1];
                    }							
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
			$model['CreatedDate'] = date('Y-m-d');
			$model['ProfileID'] = $ProfileID;
			
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
			$model['DueDate'] = date('Y-m-d');
            return $this->render('create', [ 'model' => $model ]);
        }
    }

    /**
     * Updates an existing Assignments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
		$params = Yii::$app->request->post();
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
     * Deletes an existing Assignments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assignments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assignments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assignments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUpload()
    {
        $identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
        $Filename = basename($_FILES["myfile"]["name"]);
        $AssignmentID = $_REQUEST['AssignmentID'];
        $Description = $_REQUEST['Description'];

        $target_dir = Yii::$app->params['documentpath']; 

        $MaxFileSize = Yii::$app->params['MAX_FILE_SIZE'];
        $target_file = $target_dir . basename($_FILES["myfile"]["name"]);
        //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if ($_FILES["myfile"]["size"] > $MaxFileSize) 
        {
            echo "Sorry, the file is too large.";	 
        } else
        {
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) 
            {
                echo "The file ". basename( $_FILES["myfile"]["name"]). " has been uploaded.";
                $model = new Assignmentdocs();
                $model->Description = $Description;
                $model->Filename =  $Filename;
                $model->AssignmentID = $AssignmentID;
                $model->CreatedDate = date('Y-m-d h:i:s');
                $model->save();
            } else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return $this->redirect(['view', 'id' => $AssignmentID]);
    }
    
    public function actionDownload_docs()
    {
        header("Content-Type: application/octet-stream");
        $baseUrl = Yii::$app->request->baseUrl;
        $filename = $_REQUEST['filename'];
        $documentpath = Yii::$app->params['documentpath'];
        $myfilename = $documentpath.''.$filename;

        ini_set('max_execution_time', 5*60);
        if (file_exists($myfilename)) {
            Yii::$app->response->sendFile($myfilename);
        } else
        {
            echo "File not found ".$filename;
        }        
    }
}
