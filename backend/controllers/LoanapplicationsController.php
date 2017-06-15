<?php

namespace backend\controllers;

use Yii;
use common\models\Loanapplications;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoanapplicationsController implements the CRUD actions for Loanapplications model.
 */
class LoanapplicationsController extends Controller
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
     * Lists all Loanapplications models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Loanapplications::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loanapplications model.
     * @param string $Loan No
     * @param string $Loan Product Type
     * @return mixed
     */
    public function actionView($LoanNo, $LoanProductType)
    {
        return $this->render('view', [
            'model' => $this->findModel($LoanNo, $LoanProductType),
        ]);
    }

    /**
     * Creates a new Loanapplications model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loanapplications();

        $nextLoanNo = str_pad(
            substr(
                implode("", 
                    Loanapplications::find()->select(['TOP 1 [Loan No]'])->orderBy(['[Loan No]' => SORT_DESC ])->asArray()->one()
                ),
            4
            ) + 1,
            3, '0', STR_PAD_LEFT
        );

        $employeeDetails = Employees::find()->where(['E-Mail' => Yii::$app->user->identity->Email])->asArray()->one();

         $params = Yii::$app->request->post();

        if (!empty($params)) {

            $types = $model->getTableSchema()->columns;

            foreach ($model AS $key => $value) {

                $key1 = str_replace(" ", "_", $key);
                if (array_key_exists($key1, $params)) {
                    if ($key == 'Loan No') {

                    } else {
                        $model[$key] = $params[$key1];
                    }
                } else if ($key == 'Loan No') {

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
            $model['Loan No'] =  'LOAN' . str_pad(
                substr(
                    implode("", 
                        Loanapplications::find()->select(['TOP 1 [Loan No]'])->orderBy(['[Loan No]' => SORT_DESC ])->asArray()->one()
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
                return $this->redirect(['view', 'id' => $model['Loan No']]);
            } else {
               
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Loan No' => $model['Loan No'], 'Loan Product Type' => $model['Loan Product Type']]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'employeeDetails' => $employeeDetails,
                'nextLaonNo' => $nextLoanNo,
            ]);
        }
    }

    /**
     * Updates an existing Loanapplications model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Loan No
     * @param string $Loan Product Type
     * @return mixed
     */
    public function actionUpdate($LoanNo, $LoanProductType)
    {
        $model = $this->findModel($LoanNo, $LoanProductType);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Loan No' => $model['Loan No'], 'Loan Product Type' => $model['Loan Product Type']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Loanapplications model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Loan No
     * @param string $Loan Product Type
     * @return mixed
     */
    public function actionDelete($LoanNo, $LoanProductType)
    {
        $this->findModel($LoanNo, $LoanProductType)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Loanapplications model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Loan No
     * @param string $Loan Product Type
     * @return Loanapplications the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($LoanNo, $LoanProductType)
    {
        if (($model = Loanapplications::findOne(['Loan No' => $LoanNo, 'Loan Product Type' => $LoanProductType])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
