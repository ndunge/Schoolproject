<?php

namespace frontend\controllers;

use Yii;
use common\models\Studentapplication;
use common\models\Studentstatus;
use common\models\Academiclines;
use common\models\Collegelines;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentapplicationController implements the CRUD actions for Studentapplication model.
 */
class StudentapplicationController extends Controller
{
    /**
     * @inheritdoc
     */
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
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
     * Lists all Studentapplication models.
     * @return mixed
     */
    public function actionIndex()
    {

		$baseUrl = Yii::$app->request->baseUrl;
		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
		$sql = "SELECT SR.ApplicantNo,SR.ApplicationDate,DV.Name,SR.ProgrammeID,ApplicationScreenFilename
                      ,SR.StudentStatus,SR.ApprovalStatus 
                      FROM [CUEA\$Student Application R] SR 
            LEFT JOIN [CUEA\$Dimension Value] DV ON SR.ProgrammeID = DV.Code
            LEFT JOIN [CUEA\$Dimension] D ON D.Code = DV.[Dimension Code] 
            LEFT JOIN [CUEA\$ApplicationSteps] ASS ON ASS.ApplicationTypeID = DV.Code AND ASS.ApplicationStepOrder = 1
            LEFT JOIN [CUEA\$ApplicationScreens] ASCR ON ASCR.ApplicationScreenID = ASS.ApplicationScreenID 
            WHERE SR.ProfileID = '$ProfileID'";
		$result = Studentapplication::findBySql($sql)->asArray()->all();
		
		$ApprovalStatus = array('','Open','Approved',/Y", strtotime($row['ApplicationDate'])),                
                            );'Pending Approval','Pending Prepayment','Rejected');

		$channel = array();
		foreach ($result AS $key => $row) 
		{
			//extract($row); 
			$channel[] = array(
								$row['ApplicantNo'],
								$row['Name'],
								$ApprovalStatus[$row['ApprovalStatus']],
								 date("d/m
		}  		
		$rss = $channel;
		$json = json_encode($rss);		
		
        return $this->render('index', ['json' => $json]);
    }

    /**
     * Displays a single Studentapplication model.
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
     * Creates a new Studentapplication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	

		$identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
        $model = new Studentapplication();
        $model2 = new Academiclines();
        
        
        $channel = array();
        for($i=0;$i<=5;$i++)
        {
            $fieldname = $i."_Descsription";
            // $item_type =   '<select style="width:100%" padding:200px; name="lines_'.$i.'_Type" onchange="filterOptions(this)">'.
            //                     '<option value="" selected disabled> Type </option>'.
            //                    $item_typeotions.
            //                 '</select>';

             // $item_type2 =   '<select style="width:100%" name="lines_'.$i.'_AccountType" onchange="filterOptions(this)">'.
             //                    '<option value="" selected disabled> Type </option>'.
             //                    '<option value="1"> G/L Account </option>'.
             //                    '<option value="2"> Customer</option>'.
             //                    '<option value="3"> Vendor</option>'.
             //                    '<option value="4">Bank Account</option>'.
             //                    '<option value="5">Fixed Asset</option>'.
             //                    '<option value="6">IC Partner</option>'.
                                
                                
             //                '</select>';                

            // $item_type2 =   '<select style="width:100%"  padding: 5px; name="lines_'.$i.'_No"  onchange="autofillDescription(this)">'.
            //                     '<option value="" selected disabled> Number </option>'.
            //                 '</select>'; 

             // $item_type3=   '<select style="width:100%" padding:200px; name="lines_'.$i.'_AccountNo" onchange="filterOptions(this)">'.
             //                    '<option value="" selected disabled></option>'.
             //                   $GL_options.
             //                '</select>';                 

             // $item_type4 =   '<select style="width:100%" name="lines_'.$i.'_UnitOfMeasure" onchange="filterOptions(this)">'.
             //                    '<option value="" selected disabled> Unit </option>'.
             //                    '<option value="1">Bag</option>'.
             //                    '<option value="2"> Blade </option>'.
             //                    '<option value="3"> Bottles </option>'.
             //                    '<option value="4"> Boxes </option>'.
             //                '</select>'; 

                                                         
            $channel[] = array(
                    // $item_type,$item_type2,$item_type3,$item_type4,                               
                    // '<input type="text" style="width:100%" name="lines_'.$i.'_Descsription"></input>',
                    '<input type="text" width="100%" id="school['.$i.'][Name]" name="school['.$i.'][Name]"></input>', 
                    '<input type="text" width="100%" id="school['.$i.'][Address]" name="school['.$i.'][Address]"></input>',
                    '<input type="text" width="100%" id="school['.$i.'][Month-Year1]" name="school['.$i.'][Month-Year1]"></input>',
                    '<input type="text" width="100%" id="school['.$i.'][Month-Year2]" name="school['.$i.'][Month-Year2]"></input>', 
                    // '<input type="text" width="100%" name="lines_'.$i.'_ActualSpent" disabled></input>', 
                    // '<input type="text" width="100%" name="lines_'.$i.'_RemainingAmount" disabled></input>',            
                );
        }     
        $rss = $channel;
        $json1 = json_encode($rss);

       

          $channel2 = array();
        for($j=0;$j<=5;$j++)
        {
            $fieldnames = $j."_Descsriptionn";
            // $item_type =   '<select style="width:100%" padding:200px; name="lines_'.$i.'_Type" onchange="filterOptions(this)">'.
            //                     '<option value="" selected disabled> Type </option>'.
            //                    $item_typeotions.
            //                 '</select>';

             // $item_type2 =   '<select style="width:100%" name="lines_'.$i.'_AccountType" onchange="filterOptions(this)">'.
             //                    '<option value="" selected disabled> Type </option>'.
             //                    '<option value="1"> G/L Account </option>'.
             //                    '<option value="2"> Customer</option>'.
             //                    '<option value="3"> Vendor</option>'.
             //                    '<option value="4">Bank Account</option>'.
             //                    '<option value="5">Fixed Asset</option>'.
             //                    '<option value="6">IC Partner</option>'.
                                
                                
             //                '</select>';                

            // $item_type2 =   '<select style="width:100%"  padding: 5px; name="lines_'.$i.'_No"  onchange="autofillDescription(this)">'.
            //                     '<option value="" selected disabled> Number </option>'.
            //                 '</select>'; 

             // $item_type3=   '<select style="width:100%" padding:200px; name="lines_'.$i.'_AccountNo" onchange="filterOptions(this)">'.
             //                    '<option value="" selected disabled></option>'.
             //                   $GL_options.
             //                '</select>';                 

             // $item_type4 =   '<select style="width:100%" name="lines_'.$i.'_UnitOfMeasure" onchange="filterOptions(this)">'.
             //                    '<option value="" selected disabled> Unit </option>'.
             //                    '<option value="1">Bag</option>'.
             //                    '<option value="2"> Blade </option>'.
             //                    '<option value="3"> Bottles </option>'.
             //                    '<option value="4"> Boxes </option>'.
             //                '</select>'; 

                                                         
            $channel2[] = array(
                    // $item_type,$item_type2,$item_type3,$item_type4,                               
                    // '<input type="text" style="width:100%" name="lines_'.$i.'_Descsription"></input>',
                    '<input type="text" width="100%" id="college['.$j.'][CollegeName]" style="width:100%" name="college['.$j.'][CollegeName]" ></input>', 
                    '<input type="text" width="100%" id="college['.$j.'][FromYear]" style="width:100%" name="college['.$j.'][FromYear]" ></input>',
                    '<input type="text" width="100%" id="college['.$j.'][ToYear]" style="width:100%" name="college['.$j.'][ToYear]" </input>',
                    '<input type="text" width="100%" id="college['.$j.'][Award]" style="width:100%" name="college['.$j.'][Award]" ></input>', 
                    // '<input type="text" width="100%" name="lines_'.$i.'_ActualSpent" disabled></input>', 
                    // '<input type="text" width="100%" name="lines_'.$i.'_RemainingAmount" disabled></input>',            
                );
        }     
        $rss2 = $channel2;
        $json2 = json_encode($rss2); 
        
         $params = Yii::$app->request->post(); 

        
 // print_r($params);exit;
        

		if (!empty($params))

		{
			//exit;
			 // print_r($params );//exit;
			$types = $model->getTableSchema()->columns;
			//print_r($types); exit;
			$Studentstatus = Studentstatus::find()->where("[Default Status] = 1")->orderBy('Description')->one();
			foreach($model AS $key => $value)
			{
				$key1 = str_replace(" ","_",$key);
				if (array_key_exists($key1,$params))
				{
					$model[$key] = $params[$key1];		
				} else
				{					
					if ($types["$key"]->type == 'string') 
					{
						$model[$key] = '';	
					} else if (($types["$key"]->type == 'integer')  OR ($types["$key"]->type == 'smallint') OR ($types["$key"]->type == 'decimal'))
					{
						$model[$key] = '0';	
					} else if ($types["$key"]->type == 'datetime')
					{
						$model[$key] = '1753-01-01 00:00:00.000';	
					}
					
					//
				}	
			}
			$model['ApplicantNo'] = (string)time();
			$model['ApplicationDate'] = date('Y-m-d');
			$model['ProfileID'] = $ProfileID;
			$model['ApprovalStatus'] = 1;
			$model['ApplicationSubmitted'] = 1;
			$model['StudentStatus'] = $Studentstatus['StudentStatusID']=0;

             $params = Yii::$app->request->post();


			// print_r($model );exit;


			
			if ($model->save())
            {
                $school=$params['school'];

                 foreach($school as $key => $dataModel)
                 {
                    // print_r($dataModel);exit;
                    if (trim($dataModel['Name'])!=''){
 
                      $m = new Academiclines();
                      $m->Description = $dataModel['Name'];
                      $m->Address1 = $dataModel['Address'];
                      $m->MonthYear1 = $dataModel['Month-Year1'];
                      $m->MonthYear2 = $dataModel['Month-Year2'];
                      // $m->Code = '';
                      $m->Contactperson = '';
                       $m->Addres2 = '';
                       $m->Addres3 = '';
                       $m->TelephoneNo = '';
                       $m->FaxNumber = '';
                       $m->EmailAddress = '';
                        $m->InstitutionLevel = '';
                        $m->ApplicantNo = $model['ApplicantNo'] ;
                       


                      $m->save();
                  }
                 }

                 $college=$params['college'];

                 foreach($college as $key => $dataModel)
                 {
                    // print_r($dataModel);exit;
                     if (trim($dataModel['CollegeName'])!=''){
                      $m = new Collegelines();
                      $m->Description = $dataModel['CollegeName'];
                      $m->FromYear = $dataModel['FromYear'];
                      $m->ToYear = $dataModel['ToYear'];
                      $m->Award = isset($dataModel['Award'])?$dataModel['Award']:'';
                       // $m->Code = 'AL001';
                      
                       $m->ApplicantNo = $model['ApplicantNo'] ;
                       
                      

                      $m->save();
                  }
                 }
            
            
				// print_r(); exit;
				if ( count($_FILES) > 0 )  $this->upload($model->ApplicantNo);
				// return $this->redirect('bankapi/');
                return $this->redirect(['index']);
			} else
			{
				$errors = $model->getErrors();
						$founderrors = '';
						foreach ($errors AS $key => $value)
						{
							foreach ($value AS $key1 => $avalue)
							{
					
								$founderrors .= $avalue;
							}
						 }
                print_r($errors);
            }
        } else {
            $model['Date Of Birth'] = date('Y-m-d');
            return $this->render('create', [ 'model' => $model,'json1'=> $json1,
         'json2'=> $json2, ]);
        }
			


        }

    /**
     * Updates an existing Studentapplication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
		$params = Yii::$app->request->post();
		if (!empty($params))
		{
			foreach($model AS $key => $value)
			{
				if (array_key_exists("$key",$params))
				{
					$model["$key"] = $params["$key"];		
				}	
			}
			
			if ($model->save())
			{
				return $this->redirect(['index']);	
			} else
			{
				print_r($model->getErrors());exit;

			}            
        } else {
            return $this->render('update', [ 'model' => $model ]);


        }
    }

    /**
     * Deletes an existing Studentapplication model.
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
     * Finds the Studentapplication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Studentapplication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Studentapplication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionAcceptoffer($id)
    {
        $model = $this->findModel($id);
		$model['Offer Accepted'] = 1;
		$model['StudentStatus'] = 'DEFAULT';
		if ($model->save())
		{
			return $this->redirect(['view', 'id' => $id]);
			//return $this->render('view', [ 'model' => $this->findModel($id),]);
		} else
		{
			print_r($model->getErrors()); exit;
		}            
    }

        
    
	
	public function actionDeferoffer($id)
    {
        $model = $this->findModel($id);
		$model['Offer Defered'] = 1;
		if ($model->save())
		{
			return $this->render('view', [ 'model' => $this->findModel($id),]);
		} else
		{
			print_r($model->getErrors()); exit;
		}            
    }

     public function upload($pk)
     {

     	$model = new Studentapplication();
     	$params = Yii::$app->request->post();
        $identity = Yii::$app->user->identity;
		$ProfileID = $identity->ProfileID;
		$file =  UploadedFile::getInstanceByName('myfile');
		$file2 =  UploadedFile::getInstanceByName('thefile');
        $Filename = $file->name;
        $Filesize = $file->size;

        $Filename2 = $file2->name;
        $Filesize2 = $file2->size;
        // $Filename = basename($_FILES["myfile"]["name"]);

        

        // print_r($Filename); exit;
        // $AppNo = $_POST['ApplicantNo'];
        // $Description = $_POST['Description'];
       // $model['Description'] = $params['myfile'];
        
        // $AssignmentSubmissionID = $_REQUEST['AssignmentSubmissionID'];
        
        $target_dir = Yii::$app->params['documentpath']; 

        $MaxFileSize = Yii::$app->params['MAX_FILE_SIZE'];
        $target_file = $target_dir . $Filename;
        $target_file = $target_dir . $Filename2;

        
        //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        if ($Filesize > $MaxFileSize) 
        {
            echo "Sorry, the file is too large.";	 
        } else
        {

            if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) 
            {
                echo "The file ". basename( $_FILES["myfile"]["name"]). " has been uploaded.";
                $model = Studentapplication::find()->where("ApplicantNo = $pk")->one();
                // print_r($model); exit();
                // $model['ApplicantNo'] = $params['ApplicantNo'];
                // $model->Description = $Description;
                // $model->Description = $Description;
                $model->FileName =  $Filename;
                // $model->ApplicantNo = $AppNo;
                // $model->ApplicantNo = $App;
                // $model->CreatedDate = date('Y-m-d h:i:s');
                $model->save();
            } else 
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }

         if ($Filesize2 > $MaxFileSize) 
        {
            echo "Sorry, the file is too large.";	 
        } else
        {

            if (move_uploaded_file($_FILES["thefile"]["tmp_name"], $target_file)) 
            {
                echo "The file ". basename( $_FILES["thefile"]["name"]). " has been uploaded.";
                $model = Studentapplication::find()->where("ApplicantNo = $pk")->one();
                // print_r($model); exit();
                // $model['ApplicantNo'] = $params['ApplicantNo'];
                // $model->Description = $Description;
                // $model->Description = $Description;
                $model->Description =  $Filename2;
                // $model->ApplicantNo = $AppNo;
                // $model->ApplicantNo = $App;
                // $model->CreatedDate = date('Y-m-d h:i:s');
                $model->save();
            } else 
            {
                echo "Sorry, there was an error uploading your file.";

            }
        }
        return $this->redirect(['view', 'id' => $pk]);
    }

    public function Download_docs($pk)
    {
        header("Content-Type: application/octet-stream");
        $baseUrl = Yii::$app->request->baseUrl;
        $filename = $_REQUEST['$filename'];
        $documentpath = Yii::$app->params['documentpath'];
        $myfilename = $documentpath.''.$filename;

        ini_set('max_execution_time', 5*60);
        if (file_exists($myfilename)) {
            Yii::$app->response->sendFile($myfilename);
        } else
        {
            echo "File not found ".$filename;
        }        
    }

}
