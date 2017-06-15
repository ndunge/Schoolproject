<?php

namespace frontend\controllers;

use Yii;
use common\models\Clearance;
use common\models\Clearanceentries;
use common\models\Customers;
use common\models\Profiles;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * ClearanceController implements the CRUD actions for Clearance model.
 */
class ClearanceController extends Controller
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
     * Lists all Clearance models.
     * @return mixed
     */
    public function actionIndex()  {

        $dataProvider = new ActiveDataProvider([
            'query' => Clearance::find(),
        ]);

        $cid = Yii::$app->user->identity->CustomerID;
        
        // $connection = Yii::$app->getDb();
        // $req = 'SELECT * FROM [CUEA$Clearance Header] WHERE [Student No_] = '. " '$cid' ";
        // $res = $connection->createCommand($req)->queryAll();

        // if (count($res) > 0) {
        //     $rec = $res[0];

        //     $request = 'SELECT * FROM [CUEA$Clearance Approval Entries] WHERE [Student ID] = '. " '$cid' ";
        //     $response = $connection->createCommand($request)->queryAll();
        // } else {
        //     $response = [];
        //     $rec = null;
        // }

        // print_r(($response)); exit;


        return $this->render('index', [
            // 'Record' => $rec,
            // 'Clearances' => $response,
            // 'Initiated' => (count($res) > 0),
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clearance model.
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
     * Creates a new Clearance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     // $model = new Clearance();


        
    //     $nextClearanceNo = str_pad(
    //         substr(
    //             implode("", 
    //                 Clearance::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
    //             ),
    //         3
    //         ) + 1,
    //         4, '0', STR_PAD_LEFT
    //     );


        
         

            

    //     $studentDetails = Profiles::find()->where(['UserName' => Yii::$app->user->identity->UserName])->asArray()->one();
    //     // echo '<pre>';
    //     // VarDumper::dump($studentDetails);
    //     // echo '</pre>';
    //     // exit;  
         
    //     $params = Yii::$app->request->post();

    //     if (!empty($params)) {

    //         $types = $model->getTableSchema()->columns;

    //         foreach ($model AS $key => $value) {

    //             $key1 = str_replace(" ", "_", $key);
    //             if (array_key_exists($key1, $params)) {
    //                 if ($key == 'No_') {

    //                 } else {
    //                     $model[$key] = $params[$key1];
    //                 }
    //             } else if ($key == 'No_') {

    //             } else {
    //                 if ($types["$key"]->type == 'string') {
    //                     $model[$key] = ' ';
    //                 } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
    //                     $model[$key] = '0';
    //                 } else if ($types["$key"]->type == 'datetime') {
    //                     $model[$key] = '1753-01-01 00:00:00.000';
    //                 }
    //             }
    //         }

    //         $model['Date'] = date('Y-m-d');
    //         $model['Date Completed'] = date('Y-m-d');
    //         $model['Status'] = 'Open';
    //         //$model['Employee ID'] = Yii::$app->user->identity->CustomerID;
    //         $model['Employee Name'] = Yii::$app->user->identity->LastName . ", "
    //             . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;
            
    //         $model['No_'] =  'CLR' . str_pad(
    //             substr(
    //                 implode("", 
    //                     Clearance::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
    //                 ),
    //             3
    //             ) + 1,
    //             4, '0', STR_PAD_LEFT
    //         );

    //         // echo '<pre>';
    //         // VarDumper::dump($model);
    //         // echo '</pre>';
    //         // exit;
           

    //         if ($model->save()) {
    //             return $this->redirect(['view', 'id' => $model['No_']]);
    //         } else {
               
    //         }
    //     } else {
    //         $model['Status'] = 'Open';
    //         $model['Student No_']="2016/0018";
             
    //         return $this->render('create', [
    //             'model' => $model,
    //             'nextClearanceNo' => $nextClearanceNo,
    //             'studentDetails'=>$studentDetails,
    //         ]);
           

    //    }


        

        

    // }
    // /**
     // * Updates an existing Clearance model.
     // * If update is successful, the browser will be redirected to the 'view' page.
     // * @param string $id
     // * @return mixed


     // */

     public function actionInsert(){


      


         

      


        

              

           

           

           
            //$model['Employee ID'] = Yii::$app->user->identity->CustomerID;
           //   $model['Library Clearance Date'] = date('Y-m-d');
           //     $model['Library Clearance Time'] = date('H:i:s');
           // $model['No_'] = 'CLR'.$nextClearanceNo;
          
 
            // echo '<pre>';
            // VarDumper::dump($model);
            // echo '</pre>';
            // exit;

     

         

         
        }

        

         // $CreateHeader = $connection->createCommand()->insert('[CUEA$Clearance Header]', ['Student No_' => $params['StudentNo_' ],
         //        // 'Library Clearance ID' => $params['LibraryClearanceID'],
         //        // 'Library Clearance Date'=> $params['LibraryClearanceDate'],
         //        // 'Library Clearance Time'=> $params['LibraryClearanceTime'],
         //    ])->execute();
         


     }
    

    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->No_]);
    //     } else {
    //         return $this->render('update', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Deletes an existing Clearance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    /**
     * Finds the Clearance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Clearance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    // protected function findModel($id)
    // {
    //     if (($model = Clearance::findOne($id)) !== null) {
    //         return $model;
    //     } else {
    //         throw new NotFoundHttpException('The requested page does not exist.');
    //     }
    // }
}
