<?php

namespace backend\controllers;

use Yii;
use common\models\Timetable;
use common\models\Profiles;
use common\models\Employees;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TimetableController implements the CRUD actions for Timetable model.
 */
class TimetableController extends Controller
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
        ];
    }

    /**
     * Lists all Timetable models.
     * @return mixed
     */
    public function actionIndex()
    {
         $baseUrl = Yii::$app->request->baseUrl;
        $identity = Yii::$app->user->identity->CustomerID;

        $EmployeeDetails = Employees::find()->where(['No_' => Yii::$app->user->identity->CustomerID])->asArray()->one();

        $timetableDetails = Timetable::find()->where(['CustomerNo' => Yii::$app->user->identity->CustomerID])->asArray()->one();

         // print_r($timetableDetails );exit;

        // print_r($timetableDetails);exit;

        $dataProvider = new ActiveDataProvider([

            'query' => Timetable::find()->where(['CustomerNo' => Yii::$app->user->identity->CustomerID])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            
            
            
        ]);
    }

    /**
     * Displays a single Timetable model.
     * @param string $Class
     * @param string $Day of Week
     * @param string $Exam
     * @param string $Lecture Room
     * @param string $Period
     * @param string $Programme
     * @param integer $Released
     * @param string $Semester
     * @param string $Stage
     * @param string $Unit
     * @param string $Unit Class
     * @return mixed
     */
    public function actionView($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass)
    {
        return $this->render('view', [
            'model' => $this->findModel($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass),
        ]);
    }

    /**
     * Creates a new Timetable model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Timetable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Class' => $model->Class, 'Day of Week' => $model->DayofWeek, 'Exam' => $model->Exam, 'Lecture Room' => $model->LectureRoom, 'Period' => $model->Period, 'Programme' => $model->Programme, 'Released' => $model->Released, 'Semester' => $model->Semester, 'Stage' => $model->Stage, 'Unit' => $model->Unit, 'Unit Class' => $model->UnitClass]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Timetable model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Class
     * @param string $Day of Week
     * @param string $Exam
     * @param string $Lecture Room
     * @param string $Period
     * @param string $Programme
     * @param integer $Released
     * @param string $Semester
     * @param string $Stage
     * @param string $Unit
     * @param string $Unit Class
     * @return mixed
     */
    public function actionUpdate($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass)
    {
        $model = $this->findModel($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Class' => $model->Class, 'Day of Week' => $model->DayofWeek, 'Exam' => $model->Exam, 'Lecture Room' => $model->LectureRoom, 'Period' => $model->Period, 'Programme' => $model->Programme, 'Released' => $model->Released, 'Semester' => $model->Semester, 'Stage' => $model->Stage, 'Unit' => $model->Unit, 'Unit Class' => $model->UnitClass]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Timetable model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Class
     * @param string $Day of Week
     * @param string $Exam
     * @param string $Lecture Room
     * @param string $Period
     * @param string $Programme
     * @param integer $Released
     * @param string $Semester
     * @param string $Stage
     * @param string $Unit
     * @param string $Unit Class
     * @return mixed
     */
    public function actionDelete($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass)
    {
        $this->findModel($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Timetable model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Class
     * @param string $Day of Week
     * @param string $Exam
     * @param string $Lecture Room
     * @param string $Period
     * @param string $Programme
     * @param integer $Released
     * @param string $Semester
     * @param string $Stage
     * @param string $Unit
     * @param string $Unit Class
     * @return Timetable the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Class, $DayofWeek, $Exam, $LectureRoom, $Period, $Programme, $Released, $Semester, $Stage, $Unit, $UnitClass)
    {
        if (($model = Timetable::findOne(['Class' => $Class, 'Day of Week' => $DayofWeek, 'Exam' => $Exam, 'Lecture Room' => $LectureRoom, 'Period' => $Period, 'Programme' => $Programme, 'Released' => $Released, 'Semester' => $Semester, 'Stage' => $Stage, 'Unit' => $Unit, 'Unit Class' => $UnitClass])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
