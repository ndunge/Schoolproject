<?php

namespace frontend\controllers;

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Loan No' => $model['Loan No'], 'Loan Product Type' => $model['Loan Product Type']]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
