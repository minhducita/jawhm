<?php

class CountriesController extends Controller
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

		$model = new Countries('search');
		//$dataProvider = $model->search();
		if(isset($_GET['Countries']))
			$model->attributes = $_GET['Countries'];
		
		$this->render('index',  array(
			'model' => $model
		));
	}
	
	public function actionCreate() {

        $countries = new Countries();

        if(Yii::app()->request->isPostRequest){
            $countries->attributes = $_POST['Countries'];             
            if($countries->validate())
            {
                if ($countries->save()) {
                    
                    Yii::app()->user->setFlash('success', "Create countries {$countries->name} success!");
                    return $this->redirect(array('countries/index'));
                }
            }else
                $this->render('create', array('countries' => $countries));
        }else
        {
            $this->render('create', array('countries' => $countries));
        }
     
    }

	public function actionUpdate($id) {

        $model = Countries::model()->findByPk($id);

        if (Yii::app()->request->isPostRequest) {  
            $model->attributes = $_POST['Countries'];
            if ($model->validate()) {
                
                if ($model->save()) {
                    
                    Yii::app()->user->setFlash('success', "Update countries {$model->name} success!");
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
		$model = Countries::model()->findByPk($id);
		if(!empty($model)) {
			$name = $model->name;
			Yii::app()->user->setFlash('success', "Delete countries $name success!");
			$model->delete();
		} else {
			Yii::app()->user->setFlash('error', "Not found !");
		}
		
	}
}