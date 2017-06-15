<?php

namespace frontend\controllers;

use Yii;
// use common\models\Clearance;
// use common\models\Clearanceentries;
// use common\models\Customers;
use common\models\Profiles;
use common\models\BankTransaction;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

/**
 * ClearanceController implements the CRUD actions for Clearance model.
 */
class BankapiController extends Controller
{
    /**
     * @inheritdoc
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }



    /**
     * @inheritdoc
     */
    public function beforeAction($action) {            
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);

    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    
    public function actionCheckout() {
        $get = Yii::$app->request->get();
        $post = Yii::$app->request->post();

        if (!empty($get)) {
            print_r($get); exit;
        }

        if (!empty($post)) {

            if (empty($post['payRef'])) {
                // print_r($get); 
                // echo nl2br("\n\n\n");
                // print_r($post); 
                // exit;
            }


            $user= Yii::$app->user->identity;

            if (!$user) {
                echo "Login to proceed";       
                exit();  
            }

              

            $txn = new BankTransaction;
            foreach ($post as $key => $value) {
                $txn[$key] = $value;
            }
            $txn['CustomerID'] = $user['CustomerID'];
            $txn['TransactionDate'] = date('Y-m-d H:m:s.000');
            
            if ( $txn->save()) 
                $msg = 'Your payment has been accepted and your reference number is: ';

            else
                $msg = 'Sorry! Your payment could not be completed!';
                $msg='';

            Yii::$app->getSession()->setFlash('success', $msg);


            $amount = $post['amount'];
            // $cust_name = $post['cust_name'];
            $txnref = $post['txnref'];
            $successful = empty($post['payRef']) ? false : true; 
            $url = "transactionstatus?amount=$amount&txnref=$txnref&successful=$successful";

            return $this->redirect($url);            
        }
        echo nl2br("\n\n");
        // print_r($get);
        
        // exit();
    }


    public function actionTransactionstatus($txnref, $amount) {

        $endpoint = "https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json?";

        $params = Yii::$app->request->get();
        $post = Yii::$app->request->post();

        // print_r($post); echo nl2br("\n\n");
        // print_r($params);exit;

        $user = Yii::$app->user->identity;
        $subject = 'Transaction Information';
        $status = ($params['successful'] == 1) ? 'Successful' : 'Failed';
        $message = '<p><strong>Transaction Details</strong></p>
           <p>Dear Test User,.</p>
           <p>Your payment to E-Top up for amount ' .
           $params['amount'] . ' via QuickTeller website '.
           (($params['successful'] == 1) ? ' was successful' : 'failed') . 
           '</p>
           <p>Your payment Reference Number is: '.$params['txnref'].'<br />
           <p>Transaction Status: '.$status.'</p>
           Amount : '.$params['amount'].'<br />         
           <p>&nbsp;</p>
           <p>Yours Faithfully,</p>
           <p>Interswitch<br />
           </p>';
        $mail = Yii::$app->mailer->compose()
          ->setSubject($subject)
          ->setFrom(Yii::$app->params['adminEmail'])
          ->setTo($user->Email)
          ->setHtmlBody($message)
          ->send();


        $product_id = intval(6205);
        $transactionreference = $txnref;
        $apikey = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";

        $hashkey = $product_id . $transactionreference . $apikey;
        $hash = hash('sha512', $hashkey);

        $opts = [
            'amount' => $amount,
            'productid' => $product_id,
            'transactionreference' => $txnref
        ];

        $url = $endpoint . http_build_query($opts);



        $ch = curl_init($url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $fp = fopen(dirname(__FILE__).'/errorlog.txt', 'w');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_STDERR, $fp);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Hash: '. $hash ] );                                                                                                                                               
        $result = curl_exec($ch);

        return $this->render('checkout', [
            'response' => json_decode(($result), true)
        ]);

        // echo "  almost...............................";
        // echo nl2br("\n\n");
        // echo $result;   
        // echo nl2br("\n\n");
        // echo "  done...............................";
        // exit();

    }

}

    /**
     * Lists all Clearance models.
    
     */
    // public function actionIndex()  {

    //     $dataProvider = new ActiveDataProvider([
    //         'query' => Clearance::find(),
    //     ]);

    //     $cid = Yii::$app->user->identity->CustomerID;
        
        

       
    //     // print_r(($response)); exit;


    //     return $this->render('index', [
            
    //         'dataProvider' => $dataProvider,
    //     ]);
    // }

    /**
     * Displays a single Clearance model.
     *
     */
    // public function actionView($id)
    // {
    //     return $this->render('view', [
    //         'model' => $this->findModel($id),
    //     ]);
    // }

    /**
     * Creates a new Clearance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     */
    // public function actionCreate()
    // {
    //     $model = new Clearance();


        
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
    /**
     * Updates an existing Clearance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *


     */

    
    

   
    /**
     * Deletes an existing Clearance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */

//}
