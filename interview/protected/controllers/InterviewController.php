<?php

class InterviewController extends Controller {
          
    public function actionIndex() {
        $this->layout = 'interview_layout';
        $offices = Office::model()->findAll();      
        $this->render('index_2', array('offices' => $offices));
    }

    public function actionViewName($office, $name)
    {          
        $this->layout = 'interview_layout';
        //$content = Interview::find()->joinWith(['office'])->where(['=',  '`interview`.`slug`', $name])->one();    
        $content = Interview::model()->find('slug = :name', array(':name' => $name));
        //die(print_r($content));
        if ($content) {
            //$this->view->params['interview_name'] = $content->name;
            //$this->view->params['page_title'] = $content->name;
            return $this->render('view_2', array('content' => $content, 'office' => $office));
        } else {
            return $this->redirect('/interview');
        }
    }
//JN:Refer    
//    public function filters() {
//        return array(
//            'accessControl', // perform access control for CRUD operations
//        );
//    }
//

//    public function accessRules() {
//        return array(
//            array('allow', // allow all users to access 'index' and 'view' actions.
//                'actions' => array('index', 'view'),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated users to access all actions
//                'users' => array('@'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }

//    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('Comment', array(
//            'criteria' => array(
//                'with' => 'post',
//                'order' => 't.status, t.create_time DESC',
//            ),
//        ));
//
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
//    }
//
//    public function actionDelete() {
//        if (Yii::app()->request->isPostRequest) {
//            // we only allow deletion via POST request
//            $this->loadModel()->delete();
//
//            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//            if (!isset($_POST['ajax']))
//                $this->redirect(array('index'));
//        } else
//            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
//    }
//
//    public function loadModel() {
//        if ($this->_model === null) {
//            if (isset($_GET['id']))
//                $this->_model = Comment::model()->findbyPk($_GET['id']);
//            if ($this->_model === null)
//                throw new CHttpException(404, 'The requested page does not exist.');
//        }
//        return $this->_model;
//    }

}
