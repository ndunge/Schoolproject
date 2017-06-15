<?php

namespace backend\controllers;

use Yii;
use common\models\Storerequisition;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employees;
use common\models\Requisitionlines;
use yii\helpers\VarDumper;
use common\models\Item;

/**
 * PurchaserequisitionController implements the CRUD actions for Purchaserequisition model.
 */
class StorerequisitionController extends Controller
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
     * Lists all Purchaserequisition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Storerequisition::find(),
            
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Purchaserequisition model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        
      
        $model = Storerequisition::find()
    ->where(['No_'=> $id])
    ->with('requisitionlines')
     ->asArray()
    ->all();
        // print_r( $model['0']);
        // exit;
        return $this->render('view', [
            'model' => $model['0'],
        ]);
    }

    /**
     * Creates a new Purchaserequisition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Storerequisition();
        $model2 = new Requisitionlines();
$LineNo=Requisitionlines::find()->select(['TOP 1 [Line No]'])->orderBy(['[Line No]' => SORT_DESC ])->asArray()->one();
          if($LineNo==null)  
          {
$LineNo=10000;
          }
          else{
            $LineNo =+ 1;
          }
        $channel = array();
        for($i=0;$i<=5;$i++)
        {
            $fieldname = $i."_Descsription";
            $item_type =   '<select style="width:100%" padding:200px; name="lines_'.$i.'_Type" onchange="filterOptions(this)">'.
                                '<option value="" selected disabled> Type </option>'.
                                '<option value="1"> Item</option>'.
                                '<option value="2"> G/L Account </option>'.
                                '<option value="3"> Non Stock </option>'.
                            '</select>';

            $item_type2 =   '<select style="width:100%"  padding: 5px; name="lines_'.$i.'_No"  onchange="autofillDescription(this)">'.
                                '<option value="" selected disabled> Number </option>'.
                            '</select>'; 

             $item_type3 =   '<select style="width:100%" name="lines_'.$i.'_UnitOfMeasure" onchange="filterOptions(this)">'.
                                '<option value="" selected disabled> Unit </option>'.
                                '<option value="1">Bag</option>'.
                                '<option value="2"> Blade </option>'.
                                '<option value="3"> Bottles </option>'.
                                '<option value="4"> Boxes </option>'.
                            '</select>';                               
            $channel[] = array(
                    $item_type, $item_type2 ,  $item_type3,                               
                    // '<input type="text" style="width:100%" name="lines_'.$i.'_Descsription"></input>',
                    '<input type="text" width="100%" name="lines_'.$i.'_Quantity" onblur="onQuantityInputBlur(this)"></input>',
                     '<input type="text" width="100%" name="lines_'.$i.'_Quantity in Store" disabled></input>', 
                    '<input type="text" width="100%" name="lines_'.$i.'_UnitPrice" onblur="onUnitPriceInputBlur(this)"></input>',
                    '<input type="text" width="100%" name="lines_'.$i.'_Amount" disabled></input>',            
                );
        }       
        $rss = $channel;
        $json = json_encode($rss); 


         
        $nextstoreNo = str_pad(
            substr(
                implode("", 
                    Storerequisition::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
                ),
            4
            ) + 1,
            3, '0', STR_PAD_LEFT
        );

        
    
        
       
// echo '<pre>';
//             VarDumper::dump($LineNo);
//             echo '</pre>';
//             exit;

        $employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one();


         $params = Yii::$app->request->post();

        if (!empty($params)) {
              

            $types = $model->getTableSchema()->columns;

            foreach ($model AS $key => $value) {

                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists($key1, $params)) {
                    if ($key == 'No_') {

                    } else {
                        $model[$key] = $params[$key1];
                    }
                } else if ($key == 'No_') {

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
             
            
            $model['Status'] = 'Open';
// $model['Language Code (Default)'] = '';
           // $model['[Purchase?]'] = '';
            $model['Employee Name'] = Yii::$app->user->identity->LastName . ", "
                . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;
            //  $model['No_']=  'PR' . str_pad(
            //     substr(
            //         implode("", 
            //             Purchaserequisition::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
            //         ),
            //     5
            //     ) + 1,
            //     3, '0', STR_PAD_LEFT
            // ); 
            $model['No_'] =  'STRQ' . str_pad(
                substr(
                implode("", 
                    Storerequisition::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
                ),
            5
            ) + 1,
            3, '0', STR_PAD_LEFT
            );       
//$model['No_']
          
           // echo '<pre>';
           //  VarDumper::dump($params);
           //  echo '</pre>';
           //  exit;
  // $model['Requisition Type'] = 8;
            if ($model->save()) 
            {

                $RequisitionNo = $model->No_;
               foreach($params as $key =>$value) 
               {
                $linearray = explode('_', $key);
                if ($linearray[0] == 'lines')
                {
                    // Insert into DB
                    $i = $linearray[1];

                    $line_inputs = [];
                    foreach ($params as $key => $value) {
                        $inp = explode("_", $key);
                        if (isset($inp[2])) {
                            if (!empty($value)) {
                                $line_inputs[] = [
                                'index' => $inp[1],
                                'input' => $inp[2],
                                'value' => $value ,
                                
                            ];
                            }
                        }
                    }                 
                    

                    
                    
                    $Type           = $this->retrieveInput($line_inputs, 'Type', $i);
                    $Descsription   = $this->retrieveInput($line_inputs, 'Descsription', $i);
                    $No             = $this->retrieveInput($line_inputs, 'No', $i);
                    $Quantity       = $this->retrieveInput($line_inputs, 'Quantity', $i);
                    $UnitPrice      = $this->retrieveInput($line_inputs, 'UnitPrice', $i);
                    $Amount         = $this->retrieveInput($line_inputs, 'Amount', $i);
                    
                    //VarDumper::dump($line_inputs); exit();


                   $LineNo=Requisitionlines::find()->select(['TOP 1 [Line No]'])->orderBy(['[Line No]' => SORT_DESC ])->asArray()->one();
          if($LineNo==null)  
          {
$LineNo=10000;
          }
          else{
            // echo '<pre>';
            
            // echo '</pre>';
            // exit;
            //$LineNo= str_replace(',', '', $LineNo);
            //$LineNo=intval($LineNo)+1;
            $lineNumberStart = intval(10000);
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand('select count([Line No]) as records from [CUEA$Requisition Lines1]');
            $result = $command->queryAll();
            $records = intval($result[0]['records']);
            $nextLineLineNumber = $lineNumberStart + $records;

            $Type = intval($Type);
            $Quantity = intval($Quantity);
            $UnitPrice = intval($UnitPrice);
            $UnitPrice = intval($UnitPrice);
            $Amount = intval($Amount);

            
            

          }

          $Description_param = $Descsription;
          //

                    $model2 = New Requisitionlines();
                    $model2['Requisition No'] = $RequisitionNo;
                    $model2['Type'] = $Type;
                    $model2['Line No'] = $nextLineLineNumber;
                    $model2['No'] = $nextLineLineNumber;
                    $model2['Requisition Type'] = 8;
                    $model2['Description'] = $Description_param;
                    $model2['Quantity'] =$Quantity;
                    $model2['Unit of Measure'] ='PCS';//'Procurement Plan
                    $model2['Procurement Plan'] ='';
                    $model2['Procurement Plan Item'] ='';
                    $model2['Budget Line'] ='';
                    $model2['Global Dimension 1 Code'] ='';
                    $model2['Amount LCY'] ='1000';
                    $model2['Global Dimension 2 Code'] ='';
                    $model2['Select'] ='sth';
                    $model2['Request Generated'] ='sth';
                    $model2['Process Type'] ='sth';
                    $model2['Quantity Approved'] ='2';
                    $model2['Quantity in Store'] ='30';
                    $model2['Commitment Amount'] ='3000';
                    $model2['Available amount'] ='30000';
                    $model2['Requisition Status'] ='open';
                    $model2['Requisition Date'] ='2013-01-01';
                      // $model2['Procurement Plan Item'] ='';
                    $model2['Unit Price'] =$UnitPrice;
                    $model2['Amount'] =$Amount;
                    //VarDumper::dump($model2->attributes); exit();

                    //if ($model2->save()) { }

                    $command_sql = 'INSERT INTO [CUEA$Requisition Lines1] '.
                         "([Requisition No], [Type], [Line No], [No], [Requisition Type], [Description], ".
                         "[Quantity], [Unit of Measure], [Procurement Plan], [Procurement Plan Item], [Budget Line], [Global Dimension 1 Code], ".
                         "[Amount LCY], [Global Dimension 2 Code], [Select], [Request Generated], [Process Type], [Quantity Approved], [Quantity ".
                         "in Store], [Commitment Amount], [Available amount], [Requisition Status], [Requisition Date], [Unit Price], [Amount]) ".
                         "VALUES ( ".
                         "'$RequisitionNo',".
                         "$Type,".
                         "$nextLineLineNumber,".
                         "$nextLineLineNumber,".
                         "8,".
                         "'$Description_param', ".
                         "$Quantity, ".
                         "'PCS', ".
                         "'',".
                         " '',".
                         " '',".
                         " '',".
                         " '1000',".
                         " '',".
                         " 0,".
                         " 0,".
                         " 0,".
                         " '2',".
                         " '30',".
                         " '3000',".
                         " '30000',".
                         " 0, ".
                         "'2013-01-01',".
                         " $UnitPrice,".
                         "$Amount )";

                    $connection = Yii::$app->getDb();
                    $command = $connection->createCommand($command_sql);
                    $result = $command->execute();
                }
               }
                return $this->redirect(['view', 'id' => $model['No_']]);
            } else {
               
            }
        }

         $model['Status'] = 'Open';

        //$Requisitions = Requisitionlines::find()->where(['Requisition No' => common->Purchaserequisition['Requisition No']])->asArray()->one();

        $model['Employee Name'] = Yii::$app->user->identity->LastName . ", "
                . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;

         $model['No_'] =  'STRQ' . $nextstoreNo; 
         // str_pad(
         //        substr(
         //            implode("", 
         //                Purchaserequisition::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
         //            ),
         //        2
         //        ) + 1,
         //        3, '0', STR_PAD_LEFT
         //    );        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->No_]);
        } else {
// echo '<pre>';
//             VarDumper::dump($json);
//             echo '</pre>';
//             exit;
            $model['Status'] = 'Open';

            $connection = Yii::$app->getDb();
            $items_sql = 'select No_, Description from [CUEA$Item] where Description IS NOT NULL AND DATALENGTH(Description) > 0';
            $items_command = $connection->createCommand($items_sql);
            $items = $items_command->queryAll();

            $accounts_sql = 'select No_, Name from [CUEA$G_L Account] where Name IS NOT NULL AND DATALENGTH(Name) > 0';
            $accounts_command = $connection->createCommand($accounts_sql);
            $accounts = $accounts_command->queryAll();

             
            //VarDumper::dump($accounts); exit;

            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
                'employeeDetails' => $employeeDetails,
                'nextstoreNo'=>$nextstoreNo, 
                'json'=> $json,
                'items'=> $items,
                'accounts'=> $accounts,
            ]);
        }
    }

    /**
     * Updates an existing Purchaserequisition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->No_]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Purchaserequisition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */

     public function actionGetunitprice($no)
    {

    $rows = (new \yii\db\Query())
    ->select(['Quantity'])
    ->from('[CUEA$Item Ledger Entry]') 
    ->where(['Item No_' => $no])
    ->limit(9999999999999)
    ->all();
    //->sum('Quantity');

    print_r($rows);
    exit;
       

       // $query = (new \yii\db\Query())->from('[CUEA$Item Ledger Entry] ')->where [Item No_]=$no;
       // $sum = $query->sum('Quantity');
       // echo $sum;
       // exit;

       

       // $sql='select Quantity  from [CUEA$Item Ledger Entry] where [Item No_]= \''.$no.'\'';
       // $connection = Yii::$app->getDb();
       // $command=$connection->createCommand($sql);
       // $rowCount=$command->execute(); // execute the non-query SQL
       // $dataReader=$command->query();
       // print_r($rowCount);
       // exit;
        // execute a query SQL

        // $connection = Yii::$app->getDb();
        // $quantity_sql = 'select sum(Quantity) as suuum  from [CUEA$Item Ledger Entry] where [Item No_]= \''.$no.'\'';
        //     $quantity_command = $connection->createCommand($quantity_sql);
        //     $quantities = $quantity_command->queryAll();
            

           
            $unitprice = Item::find()->select(['[Unit Cost]','[Base Unit of Measure]'])->where(['No_' => $no])->asArray()->one();
            $unitprice['quantity'] = $dataReader[0]['suum'];
           return json_encode($unitprice);
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Purchaserequisition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Purchaserequisition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Storerequisition::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    function retrieveInput($inputs, $param, $param_index) {
        $input_value = null;
        foreach ($inputs as $key => $value) {
            if ($value['input'] == $param && $value['index'] == $param_index) {
                $input_value = $value['value'];
            }
        }
        return $input_value;
    }

}
