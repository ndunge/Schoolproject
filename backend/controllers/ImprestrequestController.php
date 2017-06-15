<?php

namespace backend\controllers;

use Yii;
use common\models\Imprestrequest;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employees;
use common\models\Transportrequest;
use common\models\Requestlines;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use common\models\Item;
use common\models\Tripadvances;
use common\models\GLAccounts;

/**
 * ImprestrequestController implements the CRUD actions for Imprestrequest model.
 */
class ImprestrequestController extends Controller
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
     * Lists all Imprestrequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Imprestrequest::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imprestrequest model.
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
     * Creates a new Imprestrequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imprestrequest();
        $model2=new Requestlines();
$item_typeotions='';
        $Tripadvances=Tripadvances::find()->asArray()->all();
         
        foreach ($Tripadvances as $key => $row) {
      extract($row);
          $item_typeotions .='<option value="'.$Code.'"> '.$Description.'</option>';

      }

          $GL_options='';
        $GLAccounts=GLAccounts::find()->asArray()->all();
         
        foreach ($GLAccounts as $key => $row) {
      extract($row);
          $GL_options .='<option value="'.$No_.'"> '.$Name.'</option>';
//print_r('<option value="'.$Code.'"> '.$Description.'</option>');
          // exit;
       
            
        }
        

//         $LineNo=Requestlines::find()->select(['TOP 1 [Line No.]'])->orderBy(['[Line No.]' => SORT_DESC ])->asArray()->one();
//           if($LineNo==null)  
//           {
// $LineNo=10000;
//           }
//           else{
//             $LineNo =+ 1;
//           }
        $channel = array();
        for($i=0;$i<=5;$i++)
        {
            $fieldname = $i."_Descsription";
            $item_type =   '<select style="width:100%" padding:200px; name="lines_'.$i.'_Type" onchange="filterOptions(this)">'.
                                '<option value="" selected disabled> Type </option>'.
                               $item_typeotions.
                            '</select>';

             $item_type2 =   '<select style="width:100%" name="lines_'.$i.'_AccountType" onchange="filterOptions(this)">'.
                                '<option value="" selected disabled> Type </option>'.
                                '<option value="1"> G/L Account </option>'.
                                '<option value="2"> Customer</option>'.
                                '<option value="3"> Vendor</option>'.
                                '<option value="4">Bank Account</option>'.
                                '<option value="5">Fixed Asset</option>'.
                                '<option value="6">IC Partner</option>'.
                                
                                
                            '</select>';                

            // $item_type2 =   '<select style="width:100%"  padding: 5px; name="lines_'.$i.'_No"  onchange="autofillDescription(this)">'.
            //                     '<option value="" selected disabled> Number </option>'.
            //                 '</select>'; 

             $item_type3=   '<select style="width:100%" padding:200px; name="lines_'.$i.'_AccountNo" onchange="filterOptions(this)">'.
                                '<option value="" selected disabled></option>'.
                               $GL_options.
                            '</select>';                 

             $item_type4 =   '<select style="width:100%" name="lines_'.$i.'_UnitOfMeasure" onchange="filterOptions(this)">'.
                                '<option value="" selected disabled> Unit </option>'.
                                '<option value="1">Bag</option>'.
                                '<option value="2"> Blade </option>'.
                                '<option value="3"> Bottles </option>'.
                                '<option value="4"> Boxes </option>'.
                            '</select>'; 

                                                         
            $channel[] = array(
                    $item_type,$item_type2,$item_type3,$item_type4,                               
                    // '<input type="text" style="width:100%" name="lines_'.$i.'_Descsription"></input>',
                    '<input type="text" width="100%" name="lines_'.$i.'_Description" ></input>', 
                    '<input type="text" width="100%" name="lines_'.$i.'_Quantity" onblur="onUnitPriceInputBlur(this)"></input>',
                    '<input type="text" width="100%" name="lines_'.$i.'_UnitPrice" onblur=onQuantityInputBlur(this)"></input>',
                    '<input type="text" width="100%" name="lines_'.$i.'_Amount" disabled></input>', 
                    // '<input type="text" width="100%" name="lines_'.$i.'_ActualSpent" disabled></input>', 
                    // '<input type="text" width="100%" name="lines_'.$i.'_RemainingAmount" disabled></input>',            
                );
        }     
        $rss = $channel;
        $json = json_encode($rss); 


           $nextImprestNo = str_pad(
            substr(
                implode("", 
                    Imprestrequest::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
                ),
            4
            ) + 1,
            3, '0', STR_PAD_LEFT
        );
        
        //  $nextImprestNo = str_pad(
        //     substr(
        //         implode("", 
        //             Imprestrequest::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
        //         ),
        //     4
        //     ) + 1,
        //     3, '0', STR_PAD_LEFT
        // );

        // echo '<pre>';
        // VarDumper::dump($nextLeaveNo);
        // echo '</pre>';
        // exit; 

         $model['Status'] = 'Open';     

        $employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one();
         
          //$countries = ArrayHelper::map( Countries::find()->all(), 'Code', 'Name' );
         
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

            
            //$model['Employee ID'] = Yii::$app->user->identity->CustomerID;
            $model['Employee Name'] = Yii::$app->user->identity->LastName . ", "
                . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;
           $model['No_'] =  'IMPR' . str_pad(
                substr(
                implode("", 
                    Imprestrequest::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
                ),
            4
            ) + 1,
            3, '0', STR_PAD_LEFT
            ); 
             
            // echo '<pre>';
            // VarDumper::dump($model);
            // echo '</pre>';
            // exit;
           

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model['No_']]);
            } else {

                $model['Status'] = 'Open';
            }
        } else {
            
            return $this->render('create', [

                'model' => $model,
                'employeeDetails' => $employeeDetails,
                'nextImprestNo'=>$nextImprestNo,
                'json'=> $json,
                
               
            ]);
           

       }



    }

    /**
     * Updates an existing Imprestrequest model.
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
     * Deletes an existing Imprestrequest model.
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
     * Finds the Imprestrequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Imprestrequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imprestrequest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
