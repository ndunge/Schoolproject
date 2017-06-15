<?php

namespace backend\controllers;

use Yii;
use common\models\Customerelationship;
use common\models\CaseResolution;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerelationshipController implements the CRUD actions for Customerelationship model.
 */
class CustomerelationshipController extends Controller
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
     * Lists all Customerelationship models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Customerelationship::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customerelationship model.
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
     * Creates a new Customerelationship model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customerelationship();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CaseID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customerelationship model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->CaseID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Responds to an existing Customerelationship case.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionRespond($id) {

        $res = CaseResolution::find()->where("CaseID = $id")->one();

        if ( !isset($res) ) $resolution = new CaseResolution();
        else $resolution = $res;

        // print_r($resolution->isNewRecord); exit;

        $case = $this->findModel($id);
        $params = Yii::$app->request->post();

        // $connection = Yii::$app->getDb();  
        // $req = 'INSERT INTO [CUEA$Customer Relationship Cases Resolutions] '. 
        //     '(CaseID, Description) VALUES (' . " ";
        // $res = $connection->createCommand($req)->queryAll();     

        if (! empty($params)) {
            //UPDATE CASE STATUS
            $case = Customerelationship::find()->where("CaseID = $id")->one();
            if ( isset($case) ) {
                $case['Status'] = intval(1);
                $case->save();
            }

            # this is post req
            $resolution['CustomerID'] = $params['CustomerID'];
            $resolution['CaseID'] = $params['CaseID'];
            $resolution['Description'] = $params['Description'];

            $location = '/ritman/backend/web/customerelationship';

            if ($resolution->save()) return $this->redirect($location);
            else { print_r( 'i make money not exceptions' ); exit; }   

        }

        return $this->render('resolve', [ 'case' => $case, 'resolution' => $resolution, ]);

    }

    /**
     * Deletes an existing Customerelationship model.
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
     * Finds the Customerelationship model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customerelationship the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customerelationship::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
