<?php

namespace frontend\controllers;

use Yii;
use common\models\Hostelledger;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HostelledgerController implements the CRUD actions for Hostelledger model.
 */
class HostelledgerController extends Controller
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
     * Lists all Hostelledger models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Hostelledger::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hostelledger model.
     * @param string $Hostel No
     * @param string $Room No
     * @param string $Space No
     * @return mixed
     */
    public function actionView($HostelNo, $RoomNo, $SpaceNo)
    {
        return $this->render('view', [
            'model' => $this->findModel($HostelNo, $RoomNo, $SpaceNo),
        ]);
    }

    /**
     * Creates a new Hostelledger model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hostelledger();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Hostel No' => $model['Hostel No'], 'Room No' => $model['Room No'], 'Space No' => $model['Space No']]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Hostelledger model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Hostel No
     * @param string $Room No
     * @param string $Space No
     * @return mixed
     */
    public function actionUpdate($HostelNo, $RoomNo, $SpaceNo)
    {
        $model = $this->findModel($HostelNo, $RoomNo, $SpaceNo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Hostel No' => $model['Hostel No'], 'Room No' => $model['Room No'], 'Space No' => $model['Space No']]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Hostelledger model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Hostel No
     * @param string $Room No
     * @param string $Space No
     * @return mixed
     */
    public function actionDelete($HostelNo, $RoomNo, $SpaceNo)
    {
        $this->findModel($HostelNo, $RoomNo, $SpaceNo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hostelledger model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Hostel No
     * @param string $Room No
     * @param string $Space No
     * @return Hostelledger the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($HostelNo, $RoomNo, $SpaceNo)
    {
        if (($model = Hostelledger::findOne(['Hostel No' => $HostelNo, 'Room No' => $RoomNo, 'Space No' => $SpaceNo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
