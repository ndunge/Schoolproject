<?php

namespace frontend\controllers;

use common\models\Courseregistration;
use common\models\Dimensionvalue;
use common\models\Examregistration;
use common\models\Stream;
use common\models\Studentunits;
use common\models\Gradingsystemlines;
use Yii;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
     * Lists all Courseregistration models.
     * @return mixed
     */
    public function actionIndex()
    {
        $baseUrl = Yii::$app->request->baseUrl;
        $identity = Yii::$app->user->identity;
        $ProfileID = $identity->ProfileID;
        $CustomerID = $identity->CustomerID;
        $CustomerID = '2014/0096';
        $sql = "SELECT Exams.*, Programme.Name As ProgrammeName, Stage.Name as StageName, AcademicYear.Description As AcademicYearName FROM 
				(
				SELECT DISTINCT [Programme ID], [Term ID], [Stage ID], [Academic Year], [Student ID] ,[Exam Type ID]
				FROM [CUEA\$Exam Registration]
				WHERE [Student ID] = '$CustomerID'
				) as Exams
				LEFT JOIN viewCUEA\$Customer Customer ON Customer.No_ = Exams.[Student ID]
				LEFT JOIN viewCUEA\$DimensionValue Programme ON Programme.[Code] = Exams.[Programme ID]
				LEFT JOIN viewCUEA\$DimensionValue Stage ON Stage.[Code] = Exams.[Stage ID]
				LEFT JOIN viewCUEA\$AcademicYear AcademicYear ON AcademicYear.Code = Exams.[Academic Year]
				";
        //echo $sql; exit;
        $result = Examregistration::findBySql($sql)->asArray()->all();

        $channel = array();
        foreach ($result AS $key => $row) {
            //extract($row);
            $channel[] = array(
                $row['Programme ID'],
                $row['Term ID'],
                $row['Stage ID'],
                $row['Academic Year'],
                $row['Student ID'],
                $row['Exam Type ID'],
                $row['ProgrammeName'],
                $row['StageName'],
                $row['Term ID'],
                $row['Academic Year'],
            );
        }
        $rss = $channel;
        $json = json_encode($rss);

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
        //print_r($gparams); exit;
        //[ProgrammeID], [TermID], [StageID], [AcademicYear], [StudentID] ,[ExamTypeID]
        $model = Examregistration::find()->asArray()->where("[Programme ID] = '" . $gparams['ProgrammeID'] . "' AND [Term ID] = '" . $gparams['TermID'] . "' AND [Stage ID] = '" . $gparams['StageID'] . "' AND [Student ID] = '" . $gparams['StudentID'] . "' AND [Academic Year]='" . $gparams['AcademicYear'] . "' AND [Exam Type ID] ='" . $gparams['ExamTypeID'] . "'")->one();
        //$model = $this->findModel($id);
        $params = Yii::$app->request->post();
        if (!empty($params)) {
            $Selected = Studentunits::find()->asArray()->where("[Programme] = '" . $model['Programme'] . "' AND Semester = '" . $model['Semester'] . "' AND [Stage] = '" . $model['Stage'] . "' AND [Student No_] = '" . $model['Student No_'] . "'")->orderBy('Description')->all();
            $CheckedArray = array();
            foreach ($params AS $key => $value) {
                if (substr($key, 0, 3) == 'CK_') {
                    $newkey = substr($key, 3, 100);
                    $newkey = str_replace("_", " ", $newkey);

                    $Checked = 0;
                    foreach ($Selected AS $k => $v) {
                        if ($v['Unit'] == $newkey) {
                            $Checked = 1;
                        }
                    }
                    if ($Checked == 0) {
                        $CheckedArray[] = $newkey;
                    }
                }
                //echo substr($key,0,3). "<br/>";
            }

            //print_r($params); exit;

            foreach ($CheckedArray AS $newkey => $newvalue) {
                $Studentunits = new Studentunits();
                $types = $Studentunits->getTableSchema()->columns;
                foreach ($Studentunits AS $key => $value) {
                    //echo "$key <br/>";
                    $key1 = str_replace(" ", "_", $key);
                    if (array_key_exists($key1, $params)) {
                        if ($key == 'Entry No_') {

                        } else {
                            $Studentunits[$key] = $params[$key1];
                        }
                    } else if ($key == 'Entry No_') {

                    } else {
                        if ($types["$key"]->type == 'string') {
                            $Studentunits[$key] = '.';
                        } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
                            $Studentunits[$key] = '0';
                        } else if ($types["$key"]->type == 'datetime') {
                            $Studentunits[$key] = '1753-01-01 00:00:00.000';
                        }
                    }
                    $Studentunits['Unit'] = $newvalue;
                    $Studentunits['Description'] = $newvalue;
                }
                //print_r($Studentunits); exit;
                if ($Studentunits->save()) {

                } else {
                    $errors = $Studentunits->getErrors();
                    print_r($errors);
                    exit;
                }
            }


            $Selected = Studentunits::find()->asArray()->where("[Programme] = '" . $model['Programme ID'] . "' AND Semester = '" . $model['Term ID'] . "' AND [Stage] = '" . $model['Stage ID'] . "' AND [Student No_] = '" . $model['Student ID'] . "'")->orderBy('Description')->all();
            return $this->render('view', ['model' => $model, 'Selected' => $Selected]);
        } else {
            //[ProgrammeID], [TermID], [StageID], [AcademicYear], [StudentID] ,[ExamTypeID]
            $Selected = Studentunits::find()->asArray()->where("[Programme] = '" . $model['Programme ID'] . "' AND Semester = '" . $model['Term ID'] . "' AND [Stage] = '" . $model['Stage ID'] . "' AND [Student No_] = '" . $model['Student ID'] . "'")->orderBy('Description')->all();
            return $this->render('view', ['model' => $model, 'Selected' => $Selected]);
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
        if (!empty($params)) {
            //exit;
            $types = $model->getTableSchema()->columns;

            foreach ($model AS $key => $value) {

                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists($key1, $params)) {
                    if ($key == 'Entry No_') {

                    } else {
                        $model[$key] = $params[$key1];
                    }
                } else if ($key == 'Entry No_') {

                } else {
                    if ($types["$key"]->type == 'string') {
                        $model[$key] = '.';
                    } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
                        $model[$key] = '0';
                    } else if ($types["$key"]->type == 'datetime') {
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

            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                $errors = $model->getErrors();
                $founderrors = '';
                foreach ($errors AS $key => $value) {
                    foreach ($value AS $key1 => $avalue) {

                        $founderrors .= $avalue;
                    }
                }
                print_r($errors);
            }
        } else {
            return $this->render('create', ['model' => $model]);
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
        if (!empty($params)) {
            foreach ($model AS $key => $value) {
                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists("$key1", $params)) {
                    $model["$key"] = $params["$key1"];
                }
            }
            $model['Academic Year'] = $params["Academic_Year"];
            if ($model->save()) {
                return $this->redirect(['index']);
            } else {
                print_r($model->getErrors());
                exit;
            }
        } else {
            return $this->render('update', ['model' => $model]);
        }
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
        foreach ($result AS $key => $row) {
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
        foreach ($result AS $key => $row) {
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
        foreach ($result AS $key => $row) {
            //extract($row);
            $channel[] = array(
                "sID" => $row['Stream Code'],
                "sName" => $row['Stream Name'],
            );
        }
        $json = json_encode($channel);
        echo $json;
    }

    /*
     * Depsemester Action takes a parameter id from calling url which returns SQL results based on id parameter
     */
    public function actionDepsemester()
    {
        $CustomerID = Yii::$app->user->identity->CustomerID;
        $CustomerID = '2008/0036';

        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $AcademicYear = $parents[0];
                $querydata = Examregistration::find()
                    ->select(['[Term ID]'])
                    ->where(['[Academic Year]' => $AcademicYear])
                    ->andWhere(['[Student ID]' => $CustomerID])
                    ->distinct()
                    ->asArray()
                    ->all();

                foreach ($querydata as $key => $value) {
                    $out[] = ['id' => $value['Term ID'], 'name' => $value['Term ID']];
                    if ($key == 0) {
                        $selected = $value['Term ID'];
                    }
                }
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionTranscript()
    {
        $CustomerID = Yii::$app->user->identity->CustomerID;
        $CustomerID = '2008/0036';
        $model = new Examregistration();

        $listAcademicYear = ArrayHelper::map($model::find()
            ->select(['AcademicYear' => '[Academic Year]'])
            ->where(['[Student ID]' => $CustomerID])
            ->distinct()
            ->asArray()
            ->all(),
            'AcademicYear',
            'AcademicYear'
        );

        return $this->render('transcript', [
            'model' => $model,
            'listAcademicYear' => $listAcademicYear,
        ]);


    }

    public function actionResult()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $CustomerID = Yii::$app->user->identity->CustomerID;
            $CustomerID = '2008/0036';

            $AcademicYear = $data['academicYear'];
            $TermID = $data['semester'];

            

            $model = Examregistration::find()
                ->select(['[Student Name], [Academic Year], [Term ID], [Stage ID]'])
                ->where(['[Student ID]' => $CustomerID])
                ->andWhere(['[Academic Year]' => $AcademicYear])
                //->andWhere(['[Term ID]' => $TermID])
                ->asArray()
                ->one();

            $MarkRanges = "";



            $sql = "SELECT ProgrammeCourseID, SUM([Cat Marks]) AS 'Cat Marks', SUM([Exam Marks]) AS 'Exam Marks', ((SUM([Cat Marks])*0.3) + (SUM([Exam Marks])))*0.7 AS Total FROM 
                (
                    SELECT ProgrammeCourseID, sum([Actual Mark]) AS 'Cat Marks', 0 AS 'Exam Marks',TypeID = 'CATS' FROM [Ritman Test\$Exam Registration] AS ExamReg
                    
                    WHERE [Student ID] = '$CustomerID'
                    AND [Academic Year] = '$AcademicYear'
                    AND [Exam Type ID] NOT IN ('ENTRY', 'EXAM')
                    GROUP BY ProgrammeCourseID
                    UNION
                    (
                        SELECT ProgrammeCourseID,0 AS 'Cat Marks', SUM([Actual Mark]) AS 'Exam Marks', TypeID ='EXAMS' FROM [Ritman Test\$Exam Registration] AS ExamReg
                        WHERE [Student ID] = '$CustomerID'
                        AND [Academic Year] = '$AcademicYear'
                        AND [Exam Type ID] NOT IN ( 'EXAM')
                        GROUP BY ProgrammeCourseID
                    )
                ) temp
                GROUP BY ProgrammeCourseID";

            // $Results = Studentunits::find()->where("AcademicYear = '$AcademicYear'")->asArray()->all();
// 
            return $this->renderAjax('_result', [
                'model' => $data,
            ]);

            $dataProvider = new ArrayDataProvider([
                'allModels' => $Results,
                'sort' => false
            ]);

            return $this->renderAjax('_result', [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]);
        }
    }

    public function actionGrade($mark){
           
          $sql='select [Description],[Points] 
          from [CUEA$Grading system lines] 
          where '. $mark.'>=[Minimum Marks] and '.$mark.'<=[Maximum Marks]';

          $Results = Gradingsystemlines::findBySql($sql)->asArray()->one();
        return  $Results;  
    }
}
