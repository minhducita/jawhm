<?php
Yii::import('application.models.UserIdentity');

class AdminController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('index'),
                'users' => array('*'),
            ),
            array(
                'deny',
                'actions' => array('create'),
                'users' => array('?'),
            ),
        );    
    }

    public function actionIndex() {
        $model = new Admin();
        if(Yii::app()->user->isGuest)
        {
            if(Yii::app()->request->isPostRequest)
            {
                $model->attributes = $_POST['Admin'];            
                if($model->validate())
                {                                 
                    $model->password = $model->hashPassword($model->password);
                    //die($model->username . '-' . $model->password);
                    $identity = new UserIdentity($model->username, $model->password);
                    if($identity->authenticate())
                    {
                        Yii::app()->user->login($identity);
                        Yii::app()->user->setFlash('success', "Login success! Hi <strong>" . Yii::app()->user->title . '</strong>');
                        $this->redirect(array('interview/index'));
                    }else
                    {
                        Yii::app()->user->setFlash('error', 'Authenticate fail!');
                        echo 'What' . $identity->errorMessage;
                        $this->render('index', array('model' => $model));
                    }
                }else
                    $this->render('index', array('model' => $model));
            }else
            {              
                $this->render('index', array('model' => $model));
            }
        }else
            $this->redirect(array('interview/index'));
    }
    
    public function actionCreate() {
        $model = new Admin();
        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Admin'];
            if ($model->validate()) {
                $model->password = $model->hashPassword($model->password);
                $model->save();
                $this->redirect(array('admin/admin/index'));
            } else
                $this->render('create', array('model' => $model));
        }else {
            $this->render('create', array('model' => $model));
        }
    }
    
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(array('admin/index'));
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