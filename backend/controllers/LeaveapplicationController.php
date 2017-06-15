<?php

namespace backend\controllers;

use Yii;
use common\models\Leaveapplication;
use common\models\Employees;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\LeaveTypes;
use yii\helpers\VarDumper;
use yii\helpers\Json;

/**
 * LeaveapplicationController implements the CRUD actions for Leaveapplication model.
 */
class LeaveapplicationController extends Controller
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
     * Lists all Leaveapplication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $baseUrl = Yii::$app->request->baseUrl;
        $identity = Yii::$app->user->identity;
        $dataProvider = new ActiveDataProvider([
            'query' => Leaveapplication::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

        
    


    }

    /**
     * Displays a single Leaveapplication model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    { 
         
         
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Leaveapplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leaveapplication();

        $nextLeaveNo = str_pad(
            substr(
                implode("", 
                    Leaveapplication::find()->select(['TOP 1 [Application No]'])->orderBy(['[Application No]' => SORT_DESC ])->asArray()->one()
                ),
            5
            ) + 1,
            3, '0', STR_PAD_LEFT
        );
        
        $Leavetypes = ArrayHelper::map(LeaveTypes::find()->all(), 'Code', 'Description');  

        // echo '<pre>';
        // VarDumper::dump($nextLeaveNo);
        // echo '</pre>';
        // exit;      

        $employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one();
        
         
        $params = Yii::$app->request->post();

        if (!empty($params)) {

            $types = $model->getTableSchema()->columns;

            foreach ($model AS $key => $value) {

                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists($key1, $params)) {
                    if ($key == 'Application No') {

                    } else {
                        $model[$key] = $params[$key1];
                    }
                } else if ($key == 'Application No') {

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

            $model['Start Date'] = date('Y-m-d');
            $model['Leave Status'] = 'Open';
            //$model['Employee ID'] = Yii::$app->user->identity->CustomerID;
            $model['Employee Name'] = Yii::$app->user->identity->LastName . ", "
                . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;
            $model['Application No'] =  'LEAVE' . str_pad(
                substr(
                    implode("", 
                        Leaveapplication::find()->select(['TOP 1 [Application No]'])->orderBy(['[Application No]' => SORT_DESC ])->asArray()->one()
                    ),
                5
                ) + 1,
                3, '0', STR_PAD_LEFT
            );

            // echo '<pre>';
            // VarDumper::dump($model);
            // echo '</pre>';
            // exit;
           

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model['Application No']]);
            } else {
               
            }
        } else {
            $model['Leave Status'] = 'Open';
            return $this->render('create', [
                'model' => $model,
                'Leavetypes' => $Leavetypes,
                'employeeDetails' => $employeeDetails,
                'nextLeaveNo' => $nextLeaveNo,
            ]);
           

       }


        

        

    }

    public function actionLeave($code)
    {
        // you may need to check whether the entered ID is valid or not
        // print_r($code);
        // exit;
        $leaveEntitlement= \common\models\LeaveTypes::find()
            ->select(['Days'])
            ->where(['Code' => $code])
            ->one();
           
 // print_r($leaveEntitlement);
 //        exit;
        // echo '<pre>';
        // VarDumper::dump($leaveEntitlement);
        // echo '</pre>';
        // exit;

        // \yii\helpers\Json::encode([$leaveEntitlement])

        return \yii\helpers\Json::encode($leaveEntitlement);
        
        
        
    }




    public function actionLeavetypes($code)
    {
        
        $description = LeaveTypes::find()->select(["Description"])->where(['Code' => $code])->all();
        print_r($description);
        exit;

       // echo '<pre>';
       // VarDumper::dump(Json::encode([$description]));
       // echo '</pre>';
       // exit;
        return \yii\helpers\Json::encode($description);
    }

    /**
     * Updates an existing Leaveapplication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        
        $nextLeaveNo = str_pad(
            substr(
                implode("", 
                    Leaveapplication::find()->select(['TOP 1 [Application No]'])->orderBy(['[Application No]' => SORT_DESC ])->asArray()->one()
                ),
            5
            ) + 1,
            3, '0', STR_PAD_LEFT
        );

        $Leavetypes = ArrayHelper::map(LeaveTypes::find()->all(), 'Code', 'Description'); 


        $employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one(); 
        
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model['Application No']]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'Leavetypes' => $Leavetypes,
                'employeeDetails' => $employeeDetails,
                'nextLeaveNo' => $nextLeaveNo,
            ]);
        }
    }

    /**
     * Deletes an existing Leaveapplication model.
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
     * Finds the Leaveapplication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Leaveapplication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Leaveapplication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
