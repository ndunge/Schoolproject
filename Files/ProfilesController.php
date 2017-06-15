<?php

namespace backend\controllers;

use Yii;

use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

use common\models\UserSetup;
use common\models\Employees;
use common\models\Resources;
use common\models\Profiles;
use common\models\User;



/**
 * ProfilesController implements the CRUD actions for Profiles model.
 */
class ProfilesController extends Controller
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
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($action->id == 'activate') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Profiles models.
     * @return mixed
     */
    public function actionResources() {
      $employees = Employees::find()
        ->all();

      foreach ($employees as &$employee) {
        $email = $employee['Company E-Mail'];
        $user = UserSetup::find()
          ->where(['E-Mail' => $email])
          ->asArray()->one();
        $userID = $user['User ID'];
        $resource = Resources::find()
          ->where(['[Time Sheet Owner User ID]' => $userID])
          ->asArray()->one();
        $employee['Resource No_'] = $resource['No_'];
        if($resource['No_'])
          $employee->save();
      }
      Yii::$app->getSession()
        ->setFlash('msg', 'Employees Resources Have Been updated');
      return $this->redirect(Yii::$app->request->referrer);
      // print_r($employees); exit;
        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
    }

    /**
     * Lists all Profiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Profiles::find()->select(['*','Employee No'=>'CustomerID','names'=>'[FirstName]'.'+'.'Space(1)'.'+'.'Space(1)'.'+'.'[MiddleName]'.'+'.'Space(1)'.'+'.'[LastName]'])->asArray(),
        ]);
        $q = Profiles::find()->select(['*','Employee No'=>'CustomerID','names'=>'[FirstName]'.'+'.'Space(1)'.'+'.'Space(1)'.'+'.'[MiddleName]'.'+'.'Space(1)'.'+'.'[LastName]'])->asArray()->all();
        //print_r(count($q)); exit;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'dataSet' => $q
        ]);
    }

    /**
     * Displays a single Profiles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model=Profiles::find()
            ->select(['*','names'=>'[FirstName]'.'+'.'Space(1)'.'+'.'Space(1)'.'+'.'[MiddleName]'.'+'.'Space(1)'.'+'.'[LastName]'])
            ->where(['ProfileID'=>$id])
            ->asArray()
            ->one();

        // print_r($model);
        // exit;

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
      * Creates a new Profiles model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
      public function actionCreate()
      {

        $params = Yii::$app->request->post();

        $model = new Profiles();


        $approverid='';


        $approvers=User::find()->asArray()->orderBy('User Name')->all();

        $Employees = ArrayHelper::map(UserSetup::find()
          ->where('[Employee No_] not in (select CustomerID from '.Yii::$app->params['tablePrefix'].'Profiles)')
          ->orderBy('User ID')
          ->all(), 'Employee No_',

          function($model, $names) {
            return $model['User ID'];
          }
        );

      if(!empty($params))
      {

        if ( !isset($params['AccountTypeID']) || !isset($params['Email']) || !isset($params['No_'])  ) {
          Yii::$app->getSession()
            ->setFlash('msg', 'All Inputs are required');
          return $this->redirect(Yii::$app->request->referrer);
        }

        $empDetail=(array) json_decode($this->actionEmployee($params['No_']));

        $firstname = $empDetail['First Name'];
        $middlename = $empDetail['Middle Name'];
        $lastname = $empDetail['Last Name'];
        $fullname = $empDetail['First Name'].' '.$empDetail['Middle Name'].' '.$empDetail['Last Name'];
        $user_name = strtolower($empDetail['First Name'].'.'.$empDetail['Middle Name'].'.'.$empDetail['Last Name']);

        // print_r($user_name);
        // exit;

        $UserSecirityID=Profiles::findBySql("select newid() as ID")->asArray()->one()['ID'];

        $types = $model->getTableSchema()->columns;

        foreach ($model AS $key => $value)
        {
          if ($types["$key"]->autoIncrement == '1') {

          }else
          {
            $key1 = str_replace(" ", "_", $key);
            if (array_key_exists($key1, $params))
            {
              $model[$key] = $params[$key1];

            }  else
            {
              if ($types["$key"]->type == 'string') {
                $model[$key] = ' ';
              } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
                $key = str_replace("?", "\?", $key);
                $model[$key] = '0';
              } else if ($types["$key"]->type == 'datetime') {
                $model[$key] = '1753-01-01 00:00:00.000';
              }
            }

            // $Password = $params['Password'];
            // $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
            // $Password = hash('sha512', $Password . $random_salt);
            // $model->Password = $Password;
            // $model->Salt = $random_salt;


            $model['CustomerID']=$params['No_'];
            $model['EmployeeID']=$params['No_'];
            $model['FirstName']=$firstname;
            $model['MiddleName']=$middlename;
            $model['LastName']=$lastname;
            $model['UserName']=$params['No_'];
          }
        }

        // TODO:  $userModel = new User();
        // $userModel = new User();
        //
        // $types = $userModel->getTableSchema()->columns;
        //
        // foreach ($userModel AS $key => $value)
        // {
        //   if ($types["$key"]->autoIncrement == '1') {
        //
        //   }else
        //   {
        //     $key1 = str_replace(" ", "_", $key);
        //     if (array_key_exists($key1, $params))
        //     {
        //       $userModel[$key] = $params[$key1];
        //
        //     }  else
        //     {
        //       if ($types["$key"]->type == 'string') {
        //         $userModel[$key] = ' ';
        //       } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
        //         $key = str_replace("?", "\?", $key);
        //         $userModel[$key] = '0';
        //       } else if ($types["$key"]->type == 'datetime') {
        //         $userModel[$key] = '1753-01-01 00:00:00.000';
        //       }
        //     }
        //
        //     // $userModel['User Name']=$user_name;
        //     $userModel['User Name']=$params['No_'];
        //     $userModel['Full Name']=$fullname;
        //     $userModel['User Security ID']=$UserSecirityID;
        //
        //
        //   }
        // }

        // $userSetupModel = new UserSetup();
        //
        // $types = $userSetupModel->getTableSchema()->columns;
        //
        // foreach ($userSetupModel AS $key => $value)
        // {
        //   if ($types["$key"]->autoIncrement == '1') {
        //
        //   }else
        //   {
        //     $key1 = str_replace(" ", "_", $key);
        //     if (array_key_exists($key1, $params))
        //     {
        //       $userSetupModel[$key] = $params[$key1];
        //
        //     }  else
        //     {
        //       if ($types["$key"]->type == 'string') {
        //         $userSetupModel[$key] = ' ';
        //       } else if (($types["$key"]->type == 'integer') OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal')) {
        //         $key = str_replace("?", "\?", $key);
        //         $userSetupModel[$key] = '0';
        //       } else if ($types["$key"]->type == 'datetime') {
        //         $userSetupModel[$key] = '1753-01-01 00:00:00.000';
        //       }
        //     }
        //
        //     // print_r(Yii::$app->user->identity); exit;
        //     $userSetupModel['User ID']=$user_name;
        //     // $userSetupModel['Approver ID']=$params['ApproverID'];
        //     $userSetupModel['Employee No_']=$params['No_'];
        //   }
        // }

        $userSetupModel = UserSetup::find()
          ->where([ 'Employee No_' => $params['No_'] ])
          ->one();

        if (empty($userSetupModel)) {
          Yii::$app->getSession()
            ->setFlash('msg', 'Could not retrieve User Setup Record');
          return $this->redirect(Yii::$app->request->referrer);
        }

        $company = Yii::$app->params['tablePrefix'];
        $sql = "SELECT * FROM [".$company."Employee] WHERE [No_]='".$params['No_']."'";
        $employee  = Employees::findBySql($sql)->asArray()->one();

        $model->Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // print_r($model); exit;

        $transaction = Yii::$app->db->beginTransaction();

        if ($model->save())
        {
          // if($userModel->save()){
          if(1){

            if($userSetupModel->save()){

              $transaction->commit();

              if (isset($params['Email'])) {
                // $link = "<a href='". Url::to(['profiles/activate', 'token' => $model->Salt], true) . "'> link </a>";
                $link = "<a href='". "http://196.201.224.102:8280/profiles/activate?token=" . $model->Salt . "'> link </a>";
                $message = "
                  <p> <b> Hello $fullname </b>  </p>
                  <p> Your online account has been set up. </p>
                  <p> Your Account username is : $model->EmployeeID </p>
                  <p> Follow this $link to complete setting up your account </p>
                ";

                Yii::$app->mailer->compose()
                  ->setSubject('ACT! Portal Account Activation')
                  ->setFrom(Yii::$app->params['adminEmail'])
                  ->setTo($params['Email'])
                  ->setHtmlBody($message)
                  ->send();
              }


              Yii::$app->getSession()->setFlash('msg', 'An Email has been sent to the user with further instructions');
              return $this->redirect(['view',
                'id' => $model->ProfileID]);
              }

          }
        }

        $transaction->rollBack();


      }else
      {
        return $this->render('create', [
          'model' => $model,
          'approvers'=>$approvers,
          'employees'=>$Employees,
          'approverid'=>$approverid,
        ]);
      }
    }

    /**
     * Updates an existing Profiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Profiles::find()
          ->where(['CustomerID' => $id])
          ->one();

        if (empty($model)) {
          Yii::$app->getSession()->setFlash('msg', 'No user with the provided id!');
          return $this->redirect(Yii::$app->request->referrer);
        }

        $params = Yii::$app->request->post();

        if (!empty($params)) {
          // print_r($params); exit;
          $model->Email = $params['Email'];
          $model->AccountTypeID = $params['AccountTypeID'];
          if ($model->save())
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Profiles model.
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
     */
    public function actionMail($id) {

      $model = Profiles::find()
        ->where(['CustomerID' => $id])
        ->one();

      if (empty($model)) {
        Yii::$app->getSession()->setFlash('msg', 'No user with the provided id!');
        return $this->redirect(Yii::$app->request->referrer);
      }

      // $link = "<a href='". Url::to(['profiles/activate', 'token' => $model->Salt], true) . "'> link </a>";
      $link = "<a href='". "http://196.201.224.102:8280/profiles/activate?token=" . $model->Salt . "'> link </a>";
      $fullname = $model['FirstName'].' '.$model['MiddleName'].' '.$model['LastName'];
      $message = "
        <p> <b> Hello $fullname </b>  </p>
        <p> Your online account has been set up. </p>
        <p> Your Account username is : $model->EmployeeID </p>
        <p> Follow this $link to complete setting up your account </p>
      ";

      Yii::$app->mailer->compose()
        ->setSubject('ACT Portal Account Activation')
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setTo($model['Email'])
        ->setHtmlBody($message)
        ->send();

      Yii::$app->getSession()->setFlash('msg', 'An Email has been sent to the user with further instructions');
      // return $this->redirect(['view','id' => $model->ProfileID]);
      return $this->redirect(Yii::$app->request->referrer);

    }

    /**
     * Finds the Profiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profiles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEmployee ($empno)
    {
        $description = Employees::find()
            ->select(['*','names'=>'[First Name] '.'+'.'SPACE(1)'.'+'.'[Middle Name]'.'+'.'SPACE(1)'.'+'.'[Last Name]','department'=>'[Global Dimension 1 Code]','email'=>'E-Mail','idno'=>'[ID Number]'])
            ->where(['No_'=>$empno])
            ->asArray()
            ->one();

        return \yii\helpers\Json::encode($description);

    }


  /**
  * Displays a single Profiles model.
  * @param integer $id
  * @return mixed
  */
  public function actionActivate($token = null) {

    if (isset($token)) {

      $model = Profiles::find()
        ->where(['Salt' => $token])
        ->one();

      if ($model) {
        Yii::$app->getSession()->setFlash('message', 'Token Invalid or Account Already activated');
        return $this->render('activate', [ 'model' => $model ]);
      } else {
        Yii::$app->getSession()->setFlash('message', 'Validation Token Invalid or Account Already Activated');
        return $this->goHome();
      }


    } else {

      $params = Yii::$app->request->post();
      if (empty($params)) {
        Yii::$app->getSession()->setFlash('message', 'Password is Required');
        return $this->goHome();
      }
      else {
        $token = $params['token'];
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        $Password = hash('sha512', $params['NewPassword'] . $random_salt);

        $model = Profiles::find()
          ->where(['Salt' => $token])
          ->one();

        if ($model) {
          $model->Password = $Password;
          $model->Salt = $random_salt;
          $model->Status = intval(1);
          if ($model->save()) {
            Yii::$app->getSession()->setFlash('message', 'Account Password set Successfully');
            return $this->goHome();
          }
        } else {
          Yii::$app->getSession()->setFlash('message', 'Account Not Found');
          return $this->goHome();
        }

      }

    }

  }

}
