<?php

class CategoryController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl',
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
        $model = new Category();
        $model_create = new Category();
        if (isset($_GET['Category'])) {
            $model->attributes = $_GET['Category'];

        }
        $parent = Category::model()->findAll(array(
            'condition' => 'parent <= :num',
            'params'    => array(':num' => 0),
        ));

        if (Yii::app()->request->isPostRequest) {
            $model_create->attributes = $_POST['Category'];
            if ($model_create->validate()) {
                if ($model_create->save())
                    Yii::app()->user->setFlash('success', "Create category $model_create->title success!"); else
                    Yii::app()->user->setFlash('error', "Create category $model_create->title fails");
            }
            $model_create = new Category();
        }

        $this->render('index', array(
            'model'        => $model,
            'parent'       => $parent,
            'model_create' => $model_create,
            'size'         => "all"
        ));
    }

    public function actionIndexSize($size = 10)
    {
        $model = new Category();
        $model_create = new Category();
        if (isset($_GET['Category'])) {
            $model->attributes = $_GET['Category'];

        }
        $parent = Category::model()->findAll(array(
            'condition' => 'parent <= :num',
            'params'    => array(':num' => 0),
        ));

        if ($size == 'all') {
            $size = $model->count();
        }

        if (Yii::app()->request->isPostRequest) {
            $model_create->attributes = $_POST['Category'];
            if ($model_create->validate()) {
                if ($model_create->save())
                    Yii::app()->user->setFlash('success', "Create category $model_create->title success!"); else
                    Yii::app()->user->setFlash('error', "Create category $model_create->title fails");
            }
            $model_create = new Category();
        }

        $this->render('index', array(
            'model'        => $model,
            'parent'       => $parent,
            'model_create' => $model_create,
            'size'         => $size
        ));
    }

    public function actionIndexSort()
    {
        $model = new Category();
        $model_create = new Category();
        $parent = Category::model()->findAll(array(
            'condition' => 'parent <= :num',
            'params'    => array(':num' => 0),
            'order'     => 't.sort',
        ));
        return $this->render('index_sort', array(
            'model'        => $model,
            'parent'       => $parent,
            'model_create' => $model_create,
        ));
    }

    public function actionCreate()
    {
        $model = new Category();
        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Category'];
            if ($model->validate()) {
                if ($model->save())
                    Yii::app()->user->setFlash('success', "Create category $model->title success!"); else
                    Yii::app()->user->setFlash('error', "Create category $model->title fails");
            }
        } else {
            Yii::app()->user->setFlash('error', "No data");
        }
        $this->redirect(array('category/IndexSize'));
    }

    public function actionUpdate($id)
    {
        $model = Category::model()->find(array(
            'condition' => 'id = :id',
            'params'    => array(':id' => $id)
        ));

        $parent = Category::model()->findAll(array(
            'condition' => 'parent <= :num',
            'params'    => array(':num' => 0),
        ));

        //get questions by category
        $questions = [];
        if ($model) {
            $category_id = $model->id;
            $category_question = QuestionCategory::model()->findAll("id_category = '$category_id'");
            foreach ($category_question as $question) {
                $question = Question::model()->find("id = '$question->id_question'");
                $questions[] = $question;
            }
        }

        //update category
        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Category'];
            if ($model->validate()) {
                if ($model->save())
                    Yii::app()->user->setFlash('success', "Update category $model->title success!"); else
                    Yii::app()->user->setFlash('error', "Update category $model->title fails");
            }
        }

        return $this->render('update', array(
            'model'     => $model,
            'parent'    => $parent,
            'questions' => $questions
        ));
    }

    //JN:code
    public function actionDel()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $connect = Yii::app()->db;
            $transaction = $connect->beginTransaction();
            try {
                $command = $connect->createCommand("delete from category where id = :id ");
                $command->bindParam(':id', $id, PDO::PARAM_INT);
                $command->execute();
                $transaction->commit();

                Yii::app()->user->setFlash('success', "Delete category success!");
                $this->redirect(array('category/IndexSize?size=10'));
            } catch (Exception $e) {
                $transaction->rollback();

                Yii::app()->user->setFlash('error', "Delete category fail!");
                $this->redirect(array('category/IndexSize?size=10'));
            }
        } else {
            Yii::app()->user->setFlash('error', "No data!");

            $this->redirect(array('category/IndexSize?size=10'));
        }
    }

    public function actionChangeStatus()
    {
        $category = Category::model()->find(array(
            'condition' => 'id = :id',
            'params'    => array(':id' => $_POST['id'])
        ));

        $checked = $_POST['value'];

        if ($category) {
            if (strtolower($checked) == 'true') {
                $category->status = 1;
            } else if (strtolower($checked) == 'false') {
                $category->status = 0;
            } else {
                return "I'm sorry value not send";
            }

            if ($category->save()) {
                return "Change status success";
            }

            return "Not save! you need update this item";
        } else {
            return "I'm sorry server is not connect";
        }
    }

    public function actionSort()
    {
        $list_order = $_POST['list_order'];
        $list = explode(',', $list_order);
        $connect = Yii::app()->db;
        $command = $connect->createCommand("select * from category where id in ($list_order) ");
        $dataReader = $command->query();

        if (count($dataReader) > 0) {
            $count = 0;
            foreach ($dataReader as $row) {
                $posi = (array_search($row['id'], $list) + 1);
                $command2 = $connect->createCommand("update category set `sort` = $posi where id = " . $row['id']);
                if ($command2->execute() > 0)
                    $count++;
            }
            echo 'Sort success. Have ' . $count . ' change';
        } else {
            echo 'Not handle! No data!';
        }
    }

    public function actionLoadCategoryByParent()
    {
        $category = Category::model()->find(array(
            'condition' => 'parent = :parent',
            'params'    => array('parent' => $_POST['id'])
        ));
        $category = CJavaScript::jsonEncode($category);

        return $category;
    }

}
