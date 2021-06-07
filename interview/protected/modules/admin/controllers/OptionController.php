<?php

class OptionController extends Controller
{
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
	
	public function actionIndex()
	{
		$model = new Options('search');
		if(isset($_GET['Options'])) 
			$model->attributes = $_GET['Options'];
		
		$this->render('index',  array(
			'model' => $model
		));
	}

	public function actionCreate() {

        $options = new Options();

        if(Yii::app()->request->isPostRequest){
            $options->attributes = $_POST['Options'];             
            if($options->validate())
            {
                if ($options->save()) {
                    
                    Yii::app()->user->setFlash('success', "Create options {$options->title} success!");
                    return $this->redirect(array('option/index'));
                }
            }else
                $this->render('create', array('options' => $options));
        }else
        {
            $this->render('create', array('options' => $options));
        }
     
    }

	public function actionUpdate($id) {

        $model = Options::model()->findByPk($id);

        if (Yii::app()->request->isPostRequest) {  
            $model->attributes = $_POST['Options'];
            if ($model->validate()) {
                
                if ($model->save()) {
                    
                    Yii::app()->user->setFlash('success', "Update options {$model->title} success!");
                    return $this->render('update', array(
                            'model' => $model
                    ));
                }
            } else {
                $this->render('update', array('model' => $model));
            }
        } else {
            return $this->render('update', array(
                    'model' => $model
            ));
        }
     
    }
	
	public function actionDelete($id) {
		$model = Options::model()->findByPk($id);
		
		if(!empty($model)) {
			$name = $model->title;
			Yii::app()->user->setFlash('success', "Delete options $name success!");
			$model->delete();
		} else {
			Yii::app()->user->setFlash('error', "Not found !");
		}
		
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