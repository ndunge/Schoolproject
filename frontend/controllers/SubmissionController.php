<?php

namespace frontend\controllers;

use Yii;
use common\models\Submission;
use common\models\Submissiondocs;
use common\models\Assignments;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubmissionController implements the CRUD actions for Submission model.
 */
class SubmissionController extends Controller
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
                ]
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
     * Lists all Submission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $baseUrl = Yii::$app->request->baseUrl;
		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
		$CustomerID = $identity->CustomerID;
        //echo $CustomerID; exit;
		$sql = "SELECT Assignments.*, Submission.AssignmentSubmissionID, Submission.SubmissionDate, 
                Submission.Submitted, Submission.Marks FROM
                (
                SELECT * FROM viewRitmanTest\$Assignments 
                WHERE CourseCode in (

                SELECT Units.Unit 
                                FROM viewRitmanTest\$StudentUnits Units
                                WHERE [Student No_] = '$CustomerID'

                )) AS Assignments  
                LEFT JOIN viewRitmanTest\$AssignmentSubmission Submission 
                ON Submission.AssignmentID = Assignments.AssignmentID 
                AND Submission.ProfileID = '$ProfileID'
				";
		$result = Submission::findBySql($sql)->asArray()->all();
		
		$channel = array();
		foreach ($result AS $key => $row) 
		{
			//extract($row); 
			$channel[] = array(
								$row['AssignmentID'],
								$row['CourseCode'],
								$row['Title'],								
								$row['DueDate'],
								($row['Submitted']!='') ? 'Submitted' : 'Not Sumitted',	
                                $row['SubmissionDate'],		
							);
		}  		
		$rss = $channel;
		$json = json_encode($rss);		
		
        return $this->render('index', ['json' => $json]);
    }

    /**
     * Displays a single Submission model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $baseUrl = Yii::$app->request->baseUrl;
		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
		$CustomerID = $identity->CustomerID;
        $sql = "SELECT Assignments.*, Submission.AssignmentSubmissionID, Submission.SubmissionDate, 
                Submission.Submitted, Submission.Marks FROM
                (
                SELECT * FROM viewRitmanTest\$Assignments 
                WHERE AssignmentID = '$id') AS Assignments  
                LEFT JOIN viewRitmanTest\$AssignmentSubmission Submission ON 
                Submission.AssignmentID = Assignments.AssignmentID AND Submission.ProfileID = '$ProfileID'";
       $model = Submission::findBySql($sql)->asArray()->one();
       
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Submission model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Submission();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->AssignmentSubmissionID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Submission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->AssignmentSubmissionID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionSubmit($id)
    {
        $model = $this->findModel($id);
        $model->Submitted = 1;
        $model->SubmissionDate = date('Y-m-d h:i:s');
        if ($model->save())
        {
            return $this->redirect(['view', 'id' => $model->AssignmentID]);
        } else
        {
            
        }
    }

    /**
     * Deletes an existing Submission model.
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
     * Finds the Submission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Submission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Submission::findOne($id)) !== null) {
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
        $AssignmentSubmissionID = $_REQUEST['AssignmentSubmissionID'];
        if ($AssignmentSubmissionID == '')
        {
            $Submission = new Submission();
            $Submission->AssignmentSubmissionID = time();
            $Submission->ProfileID = $ProfileID;
            $Submission->CreatedDate = date('Y-m-d h:i:s');
            $Submission->AssignmentID = $AssignmentID;
            $Submission->Marks = 0;
            $Submission->SubmissionDate = '1753-01-01 00:00:00.000';
            $Submission->AssignmentStatusID = 0;
            $Submission->Submitted = 0;
            $Submission->save();
            $AssignmentSubmissionID = $Submission->AssignmentSubmissionID;
        }
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
                $model = new Submissiondocs();
                $model->Description = $Description;
                $model->AssignmentID =  $AssignmentID;
                $model->Filename =  $Filename;
                $model->StudentID = Yii::$app->user->identity->CustomerID;
                $model->AssignmentSubmissionID = $AssignmentSubmissionID;
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
