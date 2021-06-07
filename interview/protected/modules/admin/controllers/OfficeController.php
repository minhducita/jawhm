<?php

class OfficeController extends Controller
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
		$model = new Office('search');
		if(isset($_GET['Office']))
			$model->attributes = $_GET['Office'];
		$this->render('index',  array(
			'model' => $model
		));
	}

	public function actionCreate() {

        $office = new Office();

        if(Yii::app()->request->isPostRequest){
            $office->attributes = $_POST['Office'];             
            if($office->validate())
            {
                if ($office->save()) {
                    
                    Yii::app()->user->setFlash('success', "Create Office {$office->name} success!");
                    return $this->redirect(array('option/index'));
                }
            }else
                $this->render('create', array('office' => $office));
        }else
        {
            $this->render('create', array('office' => $office));
        }
     
    }

	public function actionUpdate($id) {

        $model = Office::model()->findByPk($id);

        if (Yii::app()->request->isPostRequest) {  
            $model->attributes = $_POST['Office'];
            if ($model->validate()) {
                
                if ($model->save()) {
                    
                    Yii::app()->user->setFlash('success', "Update office {$model->name} success!");
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
		$model = Office::model()->findByPk($id);
		if(!empty($model)) {
			$name = $model->name;
			Yii::app()->user->setFlash('success', "Delete Office $name success!");
			$model->delete();
		} else {
			Yii::app()->user->setFlash('error', "Not found !");
		}
		
	}
}