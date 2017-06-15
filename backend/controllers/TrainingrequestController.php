<?php

namespace backend\controllers;

use Yii;
use common\models\Trainingrequest;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employees;
use common\models\RequestTraining;
use yii\helpers\VarDumper;
use yii\helpers\ArrayHelper;

/**
 * TrainingrequestController implements the CRUD actions for Trainingrequest model.
 */
class TrainingrequestController extends Controller
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
     * Lists all Trainingrequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Trainingrequest::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trainingrequest model.
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
     * Creates a new Trainingrequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trainingrequest();
        $model2 = new RequestTraining();

        $channel = array();
        // $options= '<option value="1"> Item</option>';
        for($i=0;$i<=5;$i++)
        {
            $fieldname = $i."_Descsription";
            // $item_type =   '<select style="width:100%" name="lines_'.$i.'_Participant Name" onchange="filterOptions(this)">'.
            //                     '<option value="" selected disabled> Type </option>'.
            //                     '<option value="1"> Item</option>'.
            //                     '<option value="2"> G/L Account </option>'.
            //                     '<option value="3"> Non Stock </option>'.
            //                 '</select>';

            // $item_type2 =   '<select  style="width:100%" name="lines_'.$i.'_No"  onchange="autofillDescription(this)">'.
            //                     '<option value="" selected disabled> Number </option>'.
            //                 '</select>';
            //  $item_type3 =   '<select style="width:100%" name="lines_'.$i.'_UnitOfMeasure" onchange="filterOptions(this)">'.
            //                     '<option value="" selected disabled> Unit </option>'.
            //                     '<option value="1">Bag</option>'.
            //                     '<option value="2"> Blade </option>'.
            //                     '<option value="3"> Bottles </option>'.
            //                     '<option value="4"> Boxes </option>'.
            //                 '</select>'; 

            $req = "SELECT [No_], [First Name], [Middle Name], [Last Name] FROM " . '[CUEA$Employee]';
            $res = Yii::$app->getDb()->createCommand($req)->queryAll(); 
            $select_options = " <option value='0' selected disabled> Select Employee </option> ";
            foreach ($res as $key => $value) {
                $num = $value['No_'];
                $name = $value['First Name'] . $value['Middle Name'] . $value['Last Name'] ;
                $select_options .= " <option value=$num > $name </option> ";
            }
            
            $select_dropdown = "<select> " . $select_options  . "</select>";     
            // print_r($select_dropdown); exit();             
            $channel[] = array(
                    // $item_type,$item_type2,$item_type3 ,                                
                    // '<input type="text" style="width:100%" name="lines_'.$i.'_Descsription"></input>',
                    $select_dropdown,
                    '<input type="text" width="100%" id="lines_'.$i.'_Designation" name="lines_'.$i.'_Designation"  ></input>',
                    '<input type="text" width="100%"  name="lines_'.$i.'_Need Source"  ></input>',           
                );
        }       
        $rss = $channel;
        $json = json_encode($rss); 

        $nextRequestNo = str_pad(
            substr(
                implode("", 
                    Trainingrequest::find()->select(['TOP 1 [Request No_]'])->orderBy(['[Request No_]' => SORT_DESC ])->asArray()->one()
                ),
            3
            ) + 1,
            3, '0', STR_PAD_LEFT
        );
        
        

         // echo '<pre>';
         // VarDumper::dump(Yii::$app->user->identity);
         // echo '</pre>';
         // exit;      

        $employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one();
        
         
        $params = Yii::$app->request->post();

        if (!empty($params)) {

            $types = $model->getTableSchema()->columns;

            foreach ($model AS $key => $value) {

                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists($key1, $params)) {
                    if ($key == 'Request No_') {

                    } else {
                        $model[$key] = $params[$key1];
                    }
                } else if ($key == 'Request No_') {

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

            $model['Request Date'] = date('Y-m-d');
            $model['Status'] = 'Open';
            //$model['Employee ID'] = Yii::$app->user->identity->CustomerID;
            $model['Employee Name'] = Yii::$app->user->identity->LastName . ", "
                . Yii::$app->user->identity->FirstName . " " . Yii::$app->user->identity->MiddleName;
            $model['Request No_'] =  'TRN' . str_pad(
                substr(
                    implode("", 
                    Trainingrequest::find()->select(['TOP 1 [Request No_]'])->orderBy(['[Request No_]' => SORT_DESC ])->asArray()->one()
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
                return $this->redirect(['view', 'id' => $model['Request No_']]);
            } else {
               
            }
        } else {
            $model['Status'] = 'Open';
            return $this->render('create', [
                'model' => $model,
                'model2'=> $model2,
                'employeeDetails' => $employeeDetails,
                'nextRequestNo' => $nextRequestNo,
                'json'=> $json,
            ]);
           

       }


        

        

    }
     
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model['Request No_']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Trainingrequest model.
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
     * Finds the Trainingrequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trainingrequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trainingrequest::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
