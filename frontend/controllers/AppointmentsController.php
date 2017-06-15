<?php

namespace frontend\controllers;

use Yii;
use common\models\Appointments;
use common\models\Employees;
use common\models\Profiles;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppointmentsController implements the CRUD actions for Appointments model.
 */
class AppointmentsController extends Controller
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
     * Lists all Appointments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Appointments::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Appointments model.
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
     * Creates a new Appointments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Appointments();

        $nextAppointmentNo = str_pad(
            substr(
                implode("", 
                    Appointments::find()->select(['TOP 1 [AppointmentID]'])->orderBy(['[AppointmentID]' => SORT_DESC ])->asArray()->one()
                ),
            3
            ) + 1,
            3, '0', STR_PAD_LEFT
        );

        $params = Yii::$app->request->post();



        $studentDetails = Profiles::find()->where(['UserName' => Yii::$app->user->identity->UserName])->asArray()->one();


        if (!empty($params)) {

            $types = $model->getTableSchema()->columns;

            foreach ($model AS $key => $value) {

                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists($key1, $params)) {
                    if ($key == 'AppointmentID') {

                    } else {
                        $model[$key] = $params[$key1];
                    }
                } else if ($key == 'AppointmentID') {

                } else {
                    if ($types["$key"]->type == 'string') {
                        $model[$key] = ' ';
                    } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
                        $model[$key] = '0';
                    } else if ($types["$key"]->type == 'datetime') {
                        $model[$key] = '1753-01-01 00:00:00.000';
                    }
                }
            }
            // print_r($params); exit;

            $model['Creation_Date'] = date('Y-m-d');
            $model['Student_No'] =  $params ['StudentNo_'];
            $model['Staff_ID'] =  $params ['Staff_ID'];
            $model['Staff_ID'] = Yii::$app->user->identity->LastName . ", "
                . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;
            $model['AppointmentID'] =  'APP' . str_pad(
                substr(
                    implode("", 
                    Appointments::find()->select(['TOP 1 [AppointmentID]'])->orderBy(['[AppointmentID]' => SORT_DESC ])->asArray()->one()
                ),
                3
                ) + 1,
                3, '0', STR_PAD_LEFT
            );    

            // echo '<pre>';
            // VarDumper::dump($model);
            // echo '</pre>';
            // exit;
           

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model['AppointmentID']]);
            } 
        }

        else {
            return $this->render('create', [
                'model' => $model,
                'studentDetails'=>$studentDetails,
                'nextAppointmentNo'=>$nextAppointmentNo,
            ]);
        } 

        

        

            //print_r($params);
        } 
    

    /**
     * Updates an existing Appointments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->AppointmentID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Appointments model.
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
     * Finds the Appointments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Appointments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Appointments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
