<?php

class InterviewController extends Controller {
    public $param = '';
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    
    public function accessRules() {
        return array(
            array(
                'deny',             
                'users' => array('?'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'users' => array('@'),
            ),
        );    
    }
    
    public function actionIndex() {  
//        $dataProvider = new CActiveDataProvider(
//            'Interview', array(
//                'criteria' => array(
//                    'with' => 'idOffice',
//                    'order' => 't.id_office, t.order, t.id desc'
//                ),
//            )
//        );
//        
        $model = new Interview('search');
        $offices = Office::model()->findAll();
        if(isset($_GET['Interview']))
        {
            $model->attributes = $_GET['Interview'];                  
        }
        
        $this->render('index', array('model' => $model, 'offices' => $offices));      
    }
    
    public function actionCreate(){
        $interview = new Interview();
        $offices = Office::model()->findAll();
        if(Yii::app()->request->isPostRequest){
            $interview->attributes = $_POST['Interview'];             
            if($interview->validate())
            {
                $interview->filePath = CUploadedFile::getInstance($interview, 'filePath');
                if ($interview->filePath) {
                    $nameImageJPEG = preg_replace('"\.(gif|png|jpg)$"', '.jpeg', strtolower($interview->filePath->name));
                    $interview->image = time() . '_' . $nameImageJPEG;
                } else {
                    if ($interview->sex == 0) {
                        $interview->image = 'default-female.png';
                    } else {
                        $interview->image = 'default-male.png';
                    }
                }
                if ($interview->save()) {
                    if ($interview->filePath) {
                        $f = Yii::app()->homeUrl . '/images/files';
                        $interview->filePath->saveAs($f . '/' . $interview->image);
                        chmod($f . '/' . $interview->image, 0777);
                        $this->compressScaleImage($f . '/' . $interview->image, $f . '/' . $interview->image, 100, 192, 150);
                    }
                    Yii::app()->user->setFlash('success', "Create interview {$interview->name} success!");
                    return $this->redirect(array('interview/index'));
                }
            }else
                $this->render('create', array('interview' => $interview, 'offices' => $offices));
        }else
        {
            $this->render('create', array('interview' => $interview, 'offices' => $offices));
        }
        
    }
    
    public function actionUpdate($id, $id_office) {
        
//        if(!Yii::$app->user->isGuest){
        //$model = $this->findModelInterview($id, $id_office);
        $model = Interview::model()->find('id = :id and id_office = :id_office', array(':id' => $id, ':id_office' => $id_office));
        //$offices = Office::find()->asArray()->all(); 
        $offices = Office::model()->findAll();
        if (Yii::app()->request->isPostRequest) {  
            $model->attributes = $_POST['Interview'];
            if ($model->validate()) {
                $model->filePath = CUploadedFile::getInstance($model, 'filePath');
                if ($model->filePath) {
                    $nameImageJPEG = preg_replace('"\.(gif|png|jpg)$"', '.jpeg', strtolower($model->filePath->name));
                    $model->image = time() . '_' . $nameImageJPEG;
                }
                if ($model->save()) {
                    if ($model->filePath) {
                        $f = Yii::app()->homeUrl . '/images/files';
                        $model->filePath->saveAs($f . '/' . $model->image);
                        chmod($f . '/' . $model->image, 0777);
                        $this->compressScaleImage($f . '/' . $model->image, $f . '/' . $model->image, 100, 192, 150);
                    }
                    Yii::app()->user->setFlash('success', "Update interview {$model->name} success!");
                    return $this->render('update', array(
                            'model' => $model, 'offices' => $offices
                    ));
                }
            } else {
                $this->render('update', array('model' => $model, 'offices' => $offices));
            }
        } else {
            return $this->render('update', array(
                    'model' => $model, 'offices' => $offices
            ));
        }
//        }else
//        {
//            return $this->redirect(['admin/index']);
//        }
    }
    //compress and scale image
    public function compressScaleImage($source, $destination, $quality, $width, $height) {
        $info = getimagesize($source);
        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);
        elseif ($info['mime' == 'image/gif'])
            $image = imagecreatefromgif($source);
        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);
        $image = imagescale($image, $width, $height);
        imagejpeg($image, $destination, $quality);
        return $destination;
    }
    
    public function actionDel() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $connect = Yii::app()->db;
            $command = $connect->createCommand("delete from interview where id = $id ");
            if ($command->execute() > 0) {            
                Yii::app()->user->setFlash('success', "Delete interview success!");
                $this->redirect(array('interview/index'));
            }
            else {
                Yii::app()->user->setFlash('error', "Delete interview fail!");
                $this->redirect(array('interview/index'));
            }            
        }else
        {
            Yii::app()->user->setFlash('error', "No data!");
            $this->redirect(array('interview/index'));
        }
    }

//    public function actionDel($id) {
//        if (Yii::app()->request->isPostRequest) {
//
//            die($id);
////        $this->loadModel($id)->delete();
//            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
////        if (!isset($_GET['ajax']))
////            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//        } else
//            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
//    }

    public function loadModel($id) {
        $model = Interview::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionChangeStatus()
    {           
        $interview = Interview::model()->findByPk($id);
        if($interview)
        {
            $interview->status = (int)$_POST['value'];
            if($interview->save())
            {
                return 'Change status success';
            }
            return 'Not save! you need update this item';
        }else
            return "I'm sorry server is not connect";
    }
    
    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}
