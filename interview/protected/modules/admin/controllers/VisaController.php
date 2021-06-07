<?php

class VisaController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl',
            // perform access control for CRUD operations
            'postOnly + delete',
            // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'deny',
                'users' => array('?'),
            ),
            array(
                'allow',
                // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'users'   => array('@'),
            ),
        );
    }

    public function actionIndex()
    {
        $model = new Visa();
        $model->unsetAttributes();
        if (isset($_GET['Visa'])) {
            $model->attributes = $_GET['Visa'];
        }
        $countries = Countries::model()->findAll();

        $this->render('index', array(
            'model'     => $model,
            'countries' => $countries,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new Visa;
        $countries = Countries::model()->findAll();

        if (isset($_POST['Visa'])) {
            $model->attributes = $_POST['Visa'];
            try {
                if ($model->save())
                    $this->redirect(array(
                        'view',
                        'id' => $model->id_country
                    ));
            } catch (CDbException $e) {
                Yii::app()->user->setFlash('error', "Visa for this country have already exists!");
            }
        }

        $this->render('create', array(
            'model'     => $model,
            'countries' => $countries,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $countries = Countries::model()->findAll();
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Visa'])) {
            $model->attributes = $_POST['Visa'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Update visa {$model->country->name_transcription} success!");
            } else {
                Yii::app()->user->setFlash('error', "Update fails!");
            }
        }

        $this->render('update', array(
            'model'     => $model,
            'countries' => $countries,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }


    public function actionAdmin()
    {
        $model = new Visa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Visa']))
            $model->attributes = $_GET['Visa'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id)
    {
        $model = Visa::model()->find('id_country = :id', array(':id' => $id));
        //die(var_dump($model));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'visa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionSort()
    {
        $list_order = $_POST['list_order'];
        $list = explode(',', $list_order);
        $connect = Yii::app()->db;
        $command = $connect->createCommand("select * from visa where id_country in ($list_order) ");
        $dataReader = $command->query();

        if (count($dataReader) > 0) {
            $count = 0;
            foreach ($dataReader as $row) {
                $posi = (array_search($row['id_country'], $list) + 1);
                $command2 = $connect->createCommand("update visa set `order_sort` = $posi where id_country = " . $row['id_country']);
                if ($command2->execute() > 0)
                    $count++;
            }
            echo 'Sort success. Have ' . $count . ' change';
        } else
            echo 'Not handle! No data!';
    }

    public function actionChangeStatus()
    {
        $connect = Yii::app()->db;
        //$question = Question::model()->find(array('condition' => 'id = :id', 'params' => array(':id' => $_POST['id'])));
        $checked = $_POST['value'];

        if (strtolower($checked) == 'true') {
            $status = 1;
        } else if (strtolower($checked) == 'false') {
            $status = 0;
        } else
            return "I'm sorry value not send";
        $command = $connect->createCommand("update visa set `status` = $status where id_country = " . $_POST['id']);
        if ($command->execute() > 0) {
            return 'Change status success';
        }

        return 'Not save! you need update this item';
    }

    public function actionDel()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $connect = Yii::app()->db;
            $transaction = $connect->beginTransaction();
            try {
                $command = $connect->createCommand(" delete from visa where id_country = :id ");
                $command->bindParam(':id', $id, PDO::PARAM_INT);
                $command->execute();
                $transaction->commit();

                Yii::app()->user->setFlash('success', "Delete visa success!");
                $this->redirect(array('visa/index'));
            } catch (Exception $e) {
                $transaction->rollback();

                Yii::app()->user->setFlash('error', "Delete visa fail!");
                $this->redirect(array('visa/index'));
            }
        } else {
            Yii::app()->user->setFlash('error', "No data!");
            $this->redirect(array('visa/index'));
        }
    }

}
