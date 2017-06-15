
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
            $model['No_'] =  'PR' . str_pad(
                substr(
                implode("", 
                    Purchaserequisition::find()->select(['TOP 1 [No_]'])->orderBy(['[No_]' => SORT_DESC ])->asArray()->one()
                ),
            2
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
// echo '<pre>';
//             VarDumper::dump($params);
//             echo '</pre>';
//             exit;
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
                                'value' => $value   
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

                    // $model2 = New Requisitionlines();
                    // $model2['Requisition No'] = $RequisitionNo;
                    // $model2['Type'] = $Type;
                    // $model2['Line No'] = $nextLineLineNumber;
                    // $model2['No'] = $nextLineLineNumber;
                    // $model2['Requisition Type'] = 8;
                    // $model2['Description'] = $Description_param;
                    // $model2['Quantity'] =$Quantity;
                    // $model2['Unit of Measure'] ='PCS';//'Procurement Plan
                    // $model2['Procurement Plan'] ='';
                    // $model2['Procurement Plan Item'] ='';
                    // $model2['Budget Line'] ='';
                    // $model2['Global Dimension 1 Code'] ='';
                    // $model2['Amount LCY'] ='1000';
                    // $model2['Global Dimension 2 Code'] ='';
                    // $model2['Select'] ='sth';
                    // $model2['Request Generated'] ='sth';
                    // $model2['Process Type'] ='sth';
                    // $model2['Quantity Approved'] ='2';
                    // $model2['Quantity in Store'] ='30';
                    // $model2['Commitment Amount'] ='3000';
                    // $model2['Available amount'] ='30000';
                    // $model2['Requisition Status'] ='open';
                    // $model2['Requisition Date'] ='2013-01-01';
                    //   // $model2['Procurement Plan Item'] ='';
                    // $model2['Unit Price'] =$UnitPrice;
                    // $model2['Amount'] =$Amount;
                    //VarDumper::dump($model2->attributes); exit();

                    if ($Amount >0) { 

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
               }
                return $this->redirect(['view', 'id' => $model['No_']]);
            } else {
               
            }
        }