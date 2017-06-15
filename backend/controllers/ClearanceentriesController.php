<?php

namespace backend\controllers;

use Yii;
use common\models\Clearanceentries;
use common\models\Employees;
use common\models\Clearancestdapprovers;
use common\models\Usersetup;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\helpers\VarDumper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Clearance;

/**
 * ClearanceentriesController implements the CRUD actions for Clearanceentries model.
 */
class ClearanceentriesController extends Controller
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
     * Lists all Clearanceentries models.
     * @return mixed
     */
    public function actionIndex()
    {
        $baseUrl = Yii::$app->request->baseUrl;
        //get customerID
        //get userID from user setup table
        //confirm if one is an approver from clearance std approvers

        //get user department 
       $EmployeeDetails = Employees::find()->where(['No_' => Yii::$app->user->identity->CustomerID])->asArray()->one();
       
       $Userdetails = Usersetup::find()->where(['Employee No_' => Yii::$app->user->identity->CustomerID])->asArray()->one();

       $clearance = Clearancestdapprovers::find()->where(['Clear By Id' => str_replace('\\', '.', $Userdetails['User ID'])])->asArray()->all();

       $whereArray = array();

       foreach ($clearance as $key => $value) {
           $whereArray[] = array('Clearance Level Code' => $value);
       }


       if (count($clearance) === 0 ) {
           return $this->redirect('purchaserequisition');
       }

       $role = $clearance[0]['Clearance Level Code'];
       

       // print_r($clearance);
       // exit;

      
      // echo();
      // exit;

        
            //filter for the employee's department
            $result = Clearanceentries::find()->where ($whereArray[] = array('Clearance Level Code' => $value))->asArray()->all();
            //$result = Clearanceentries::findBySql($query)->asArray()->all();
        //print_r($result); exit;

            $channel = array();
        foreach ($result AS $key => $row) 
        {
            //extract($row); 
            $channel[] = array(
                                $row['Student ID'],
                                $row['Clearance Level Code'],
                                $row['Department'],                              
                                $row['Clear By ID']
                                
        );}       
       // print_r($channel);

        $json = json_encode($channel);

       //  echo $json;
       //  exit;      
        
        return $this->render('index', ['json' => $channel]);
    }



        
        //print_r($dataProvider);
        //exit;

        //if the pxn is an approver, allow them to approve, else just display uneditable list
        
    
   

    /**
     * Displays a single Clearanceentries model.
     * @param string $Clear By ID
     * @param string $Clearance Level Code
     * @param string $Department
     * @param string $Student ID
     * @return mixed
     */
    public function actionView($ClearByID, $ClearanceLevelCode, $Department, $StudentID)
    {
         $baseUrl = Yii::$app->request->baseUrl;
        return $this->render('view', [
            'model' => $this->findModel($ClearByID, $ClearanceLevelCode, $Department, $StudentID),

        ]);
    }

    /**
     * Creates a new Clearanceentries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clearanceentries();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([
                'view', 
                'Clear By ID' => $model['Clear By ID'], 
                'Clearance Level Code' => $model['Clearance Level Code'], 
                'Department' => $model->Department, 
                'Student ID' => $model['Student ID']
            ]);
        } else {
            return $this->render('create',  [ 'model' => $model ]);
        }
    }

    public function actionClear($StudentID) {
        $model = Clearanceentries::findOne(['Student ID' => $StudentID]);
        $Clearances = Clearanceentries::find()->where(['Student ID' => $StudentID])->asArray()->one();
        $EmployeeDetails = Employees::find()->where(['No_' => Yii::$app->user->identity->CustomerID])->asArray()->one();

        $eno = $EmployeeDetails['No_'];
        // $eno = 'RU0357';
         // $eno = 'RU0319'; //Senior Accountant
        // $eno = 'RU0062'; //Principal Assistant Registrar
        $req = 'select dv.Name from [CUEA$Employee] e 
            join [CUEA$Company Jobs1] cj on cj.[Job ID] = e.[Position]
            join [CUEA$Dimension Value] dv on dv.Code = cj.[Dimension 2]
            where e.[No_] = ' . " '$eno' ";
        $res = Yii::$app->getDb()->createCommand($req)->queryAll();

        if ( count($res) == 0) {
            echo "Ooops Forbiden! Feature is above your pay grade; Sorry!";
            exit;
        }

        $rec = $res[0];

         $department = $rec['Name'];
         // $department = 'finance';
         // print_r($department); exit;

         
    
         if($department=='Bursary') return $this->render('finance' , [ 'model' => $model, ]);
         if($department=='Administration') return $this->render('registrar' , [ 'model' => $model, ]);
         if($department == 'Library') return $this->render('library' , [ 'model' => $model, 'Clearances' => $Clearances, ]);








            
        // $ClearanceLevelCode = $request->get('code');
        // $ClearanceLevelCode = $request->get('id');
        

        // if($ClearanceLevelCode == 'LIBRARY'){
        //    return $this->render('library' ,[
        //         'model' => $model,
        //     ]);
        // }
        // elseif ($ClearanceLevelCode =='FINANCE') {
        //     $view = 'finance';
        // }

        // return $this->render($view ,[
        //         'model' => $model,
        //     ]);

    }

    public function actionLibrary(){
         
         $model=[];
        return $this->render('library' ,[
                'model' => $model,
            ]);
    }
public function actionLibraryapprove(){
         
         $model=[];
        return $this->render('library' ,[
                'model' => $model,
            ]);
    }


public function actionApprove() {
    
    
    // $model = new Clearance();

    // $nextClearanceNo = str_pad(
    //         substr( implode("", Clearance::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one() ),
    //         3 ) + 1,  4, '0', STR_PAD_LEFT );
    //     // echo 'rrrr';
    //     // exit;
    $params= Yii::$app->request->post();



    if (!empty($params)) {
        // print_r($model); exit;

            // $types = $model->getTableSchema()->columns;

//             foreach ($model AS $key => $value) {

//                 $key1 = str_replace(" ", "_", $key);
//                 if (array_key_exists($key1, $params)) {
//                     if ($key == 'No_') {
                          
//                     } else {
//                         $model[$key] = $params[$key1];
//                     }
                    
//                 } else if ($key == 'No_') {

//                 } else {
//                     if ($types["$key"]->type == 'string') {
//                         $model[$key] = ' ';
//                     } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
//                         $model[$key] = '0';
//                     } else if ($types["$key"]->type == 'datetime') {
// //                         $time = new \DateTime('now', new \DateTimeZone('UTC'));
// //                         // $time = new \DateTime();
// //  //$time->format('Y-m-d H:i:s');
// // //  $time = date_create_from_format('Y-m-d:H:i:s', $time);
// // // // $time->getTimestamp();
// //                         $newtime = strtotime($time);

// // $newformat = date('Y-m-d',$newtime);

//                        $model[$key] = '1753-01-01 00:00:00.000';
//                     }
//                 }
//             }
        
        if ($params['Approval'] === 'REJECTED') {
            return $this->redirect('index');
        }



        $sid = $params['StudentNo_']; 
        $model = Clearance::find()->where("[Student No_] = '$sid' ")->one();

        $dpt = $params['Clearance_Level_Code'];

        if ($dpt === 'FINANCE') {

            $remarks = $params['Finance_Clearance_Remarks'];

            $model['Finance Cleared'] = intval(1);
            $model['Fees Amount'] = $params['Fees_Amount'];

        } elseif ($dpt === 'LIBRARY') {

            $remarks = $params['LibraryClearanceRemarks'];

            $model['Library Cleared'] = intval(1);
            $model['Books Lost'] = $params['BooksLost'];
            $model['Library Amount'] = $params['LibraryAmount'];
            $model['Library Other Charges'] = $params['LibraryOtherCharges'];
        }    
        

        $byid = ucfirst(strtolower($dpt)) . ' Clearance ID';
        $time = ucfirst(strtolower($dpt)) . ' Clearance Time';
        $date = ucfirst(strtolower($dpt)) . ' Clearance Date';
        $rmks = ucfirst(strtolower($dpt)) . ' Clearance Remarks';
        
        $connection = Yii::$app->getDb();  
        $req = 'select * from [CUEA$Clearance Approval Entries] where [Clearance Level Code] = '. " '$dpt' AND [Student ID] = '$sid' ";
        $res = $connection->createCommand($req)->queryAll();       

        

        $request = 'UPDATE [CUEA$Clearance Approval Entries] SET Cleared = 1, Status = 1  WHERE [Student ID] = ' . " '$sid' AND [Clearance Level Code] = '$dpt' ";
        $response = $connection->createCommand($request)->execute();

        // $request2 = 'UPDATE [CUEA$Clearance Header] SET Library Clearance Date = date(Y-m-d),Library Clearance Time= date('H:i:s')  WHERE [Student ID] = ' . " '$studentid' AND [Clearance Level Code] = 'LIBRARY' ";
        // $response = $connection->createCommand($request)->execute();


        if( count($res) == 0 ) {
            echo "<p> Record Missing </p>";
            exit();
        } else  {
            
            $rec = $res[0];

            $model[$rmks] = $remarks;
            $model[$date] = date('Y-m-d');
            $model[$time] = date('H:i:s');
            $model[$byid] = $rec['Clear By ID'];
            $model['Status'] = intval(1);

            if ($model->save()) {  

                
                return $this->redirect([
                    'view', 
                    'id' => $model['No_'],
                    'StudentID' => $rec['Student ID'],
                    'ClearByID' => $rec['Clear By ID'],
                    'Department' => $rec['Department'],
                    'ClearanceLevelCode' => $rec['Clearance Level Code']
                ]);
            } else {  }

        }            

    }



//     print_r($model);    exit;
//       // if (isset($_POST['action'])) {

//         $connection = Yii::$app->getDb();
//         $command = $connection->createCommand("UPDATE [Ritman Test\$Clearance Approval Entries] SET Cleared = 1  WHERE [Student ID] = '2016/0017' AND [Clearance Level Code]='LIBRARY' ");
//             if($command->execute()){
//                 $connection->createCommand()->insert('[CUEA$Clearance Header]', [
//     'Student No_' => $params['StudentNo_'],
//     'Library Clearance ID' => $params['LibraryClearanceID'],
//     'Library Clearance Date'=> $params['LibraryClearanceDate'],
//     'Library Clearance Time'=> $params['LibraryClearanceTime'],



// ])->execute();

           //     $command2 = $connection->createCommand("INSERT INTO [Ritman Test\$Clearance Header] (

           // Student No_
           // ,Programme
           // ,Remarks
           // ,Library Clearance Remarks
           // ,Library Clearance ID
           // ,Library Clearance Date
           // ,Library Clearance Time
           // ,Sports Clearance Remarks
           // ,Sports Clearance ID
           // ,Sports Clearance Date
           // ,Sports Clearance Time
           // ,Finance Clearance Remarks
           // ,Finance Clearance ID
           // ,Finance Clearance Date
           // ,Finance Clearance Time
           // ,Faculty Clearance Remarks
           // ,[Faculty Clearance ID]
           // ,Faculty Clearance Date
           // ,Faculty Clearance Time
           // ,Status
           // ,Student Signature
           // ,Books Lost
           // ,Library Amount
           // ,Library Other Charges
           // ,Fees Amount
           // ,Library Cleared
           // ,Sports Cleared
           // ,Finance Cleared
           // ,Faculty Cleared
           // ,No_ Series) VALUES('$params['StudentNo_']','$params['Library Clearance ID']','$params['Library Clearance Date']','$params['Library Clearance Time']')   "));
               
            // }
//         $sql="UPDATE Clearance Approval Entries SET Cleared = 1 WHERE Student ID = '2016/0017' AND Clearance Level Code='LIBRARY'";
// $connection=Yii::app()->db; 
// $command=$connection->createCommand($sql);
// $rowCount=$command->execute(); // execute the non-query SQL
// $dataReader=$command->query(); // execute a query SQL
//$sql="UPDATE Clearance Approval Entries SET Status = '1' WHERE Student ID = '2016/0017'";

       // }               
            
    }

    /**
     * Updates an existing Clearanceentries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Clear By ID
     * @param string $Clearance Level Code
     * @param string $Department
     * @param string $Student ID
     * @return mixed
     */
    public function actionUpdate($ClearByID, $ClearanceLevelCode, $Department, $StudentID)
    {
        $model = $this->findModel($ClearByID, $ClearanceLevelCode, $Department, $StudentID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Clear By ID' => $model['Clear By ID'], 'Clearance Level Code' => $model['Clearance Level Code'], 'Department' => $model->Department, 'Student ID' => $model['Student ID']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Clearanceentries model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Clear By ID
     * @param string $Clearance Level Code
     * @param string $Department
     * @param string $Student ID
     * @return mixed
     */
    public function actionDelete($ClearByID, $ClearanceLevelCode, $Department, $StudentID)
    {
        $this->findModel($ClearByID, $ClearanceLevelCode, $Department, $StudentID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Clearanceentries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Clear By ID
     * @param string $Clearance Level Code
     * @param string $Department
     * @param string $Student ID
     * @return Clearanceentries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ClearByID, $ClearanceLevelCode, $Department, $StudentID)
    {
        if (($model = Clearanceentries::findOne(['Clear By ID' => $ClearByID, 'Clearance Level Code' => $ClearanceLevelCode, 'Department' => $Department, 'Student ID' => $StudentID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
