<?php

class SystemController extends Controller
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
		$model = System::model()->find("id = '1'");

		if (Yii::app()->request->isPostRequest) {

			$model->attributes = $_POST['System'];

			if ($model->validate())
			{
				if ($model->save())
				{

					Yii::app()->user->setFlash('success', "Update System success!");
                    return $this->render('index', array(
                            'model' => $model
                    ));

				}
			}

		}


		$this->render('index', array('model'=> $model));
	}
	/*
	public function actionIndex()
	{

		$model = System::model()->find("id = '1'");

		if (Yii::app()->request->isPostRequest) {

            $model->attributes = $_POST['System'];

            if ($model->validate()) {

                if ($model->save()) {

                    Yii::app()->user->setFlash('success', "Update System success!");

                    return $this->render('index', array(

                            'model' => $model
                    ));

                }

            } else {

                $this->render('index', array('model' => $model));
            }

        } else {

            return $this->render('index', array(

                    'model' => $model

            ));
        }
	}
	*/
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