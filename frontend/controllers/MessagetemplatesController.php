<?php

namespace frontend\controllers;

use Yii;
use common\models\Messagetemplates;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MessagetemplatesController implements the CRUD actions for Messagetemplates model.
 */
class MessagetemplatesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
                'denyCallback' => function ($rule, $action) {
                    if (\Yii::$app->user->isGuest) {
                        return $this->redirect(['site/login']);
                    } else {
                        throw new HttpException('403', 'You are not allowed to access this page');
                    }
                }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)  
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }     

    /**
     * Lists all Messagetemplates models.
     * @return mixed
     */
    public function actionIndex()
    {
		$baseUrl = Yii::$app->request->baseUrl;
		$result = Messagetemplates::find()->asArray()->all();
		
		$channel = array();
		foreach ($result AS $key => $row) 
		{
			//extract($row);
			$channel[] = array(
				$row['Message Template ID'],
				$row['Template Code'],
                $row['Template Name'],
				$row['Allow Email'] == 1 ? 'Yes' : 'No', 
				$row['Allow SMS'] == 1 ? 'Yes' : 'No',
			);
		}  
		
		$rss = $channel;
		$json = json_encode($rss);		
		
        return $this->render('index', ['json' => $json]);
    }

    /**
     * Displays a single Messagetemplates model.
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
     * Creates a new Messagetemplates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Messagetemplates();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MessageTemplateID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Messagetemplates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->MessageTemplateID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionSave()
    {
        //return $this->renderPartial('save');
        $params = (array) Yii::$app->request->post();
        // return json_encode($params);

        $MessageTemplateID= $params['Message_Template_ID'];
        
        if ($MessageTemplateID=='')
            {
                $model = new Messagetemplates();              
            } else
            {
                $model = $this->findModel($MessageTemplateID);           
            }
            if (!isset($params['Allow_SMS'])) {$AllowSMS = 0;} else {$AllowSMS = 1;}
            if (!isset($params['Allow_Email'])) {$AllowEmail = 0;} else {$AllowEmail = 1;}
            $model['Template Code'] = $params['Template_Code'];
            $model['Template Name'] = $params['Template_Name'];
            $model['Template Text'] = $params['TemplateText'];
            $model['Template Subject'] = $params['Template_Subject'];
            $model['SMS'] = $params['SMS'];
            $model['Allow Email'] = $AllowEmail;
            $model['Allow SMS'] = $AllowSMS;
            
           // exit;
            if ($model->save())          
            {                   
                $channel = array();
			     $channel[] = array(
								"Result"=>0,
								"Message"=>"Saved Successfully"						
								);
			     $rss = (object) array('jData'=>$channel);
			     $json = json_encode($rss);

            } else
            {
              $channel = array(); 
		  	    $channel[] = array(
								"Result"=>1,
								"Message"=>$model->getErrors()						
								);
			     $rss = (object) array('jData'=>$channel);
			     $json = json_encode($rss);  	            
            }
            return $json;
    }
    
    public function actionRemove($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }    

    /**
     * Deletes an existing Messagetemplates model.
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
     * Finds the Messagetemplates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Messagetemplates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Messagetemplates::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}