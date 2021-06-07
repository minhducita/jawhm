<?php

class QuestionController extends Controller
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
        $model = new Question('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Question'])) {
            $model->attributes = $_GET['Question'];
        }

        $this->render('index', array(
            'model' => $model
        ));
    }

    //JN:code
    public function actionIndexSize($size = 10)
    {
        //JN
        $model = new Question();
        $model->unsetAttributes();  // clear any default values

//        var_dump($model->find(1)->categoryList());
////        printf($model->search_size($size));
//
//        die();

        $categories = Category::model()->findAll();

        $categorie_parents = Category::model()->findAll(array(
            'condition' => 'parent = :num',
            'params'    => array(':num' => 0)
        ));

        $country = Countries::model()->findAll();

        if (isset($_GET['Question'])) {
            $model->attributes = $_GET['Question'];
        }

        if ($size == 'all') {
            $size = $model->count();
        }

        $this->render('index_size', array(
            'model'             => $model,
            'categories'        => $categories,
            'categorie_parents' => $categorie_parents,
            'country'           => $country,
            'size'              => $size,
        ));
    }

    public function actionView($id)
    {
        $model = Question::model()->findByPk($id);
        $answer = Answer::model()->findAllBySql("select * from answer where id_question = '$id'");

        //get category
        $category = QuestionCategory::model()->find("id_question = '$id'");
        if ($category != NULL) {
            $category = Category::model()->find("id = '$category->id_category'");
        }

        //get country
        $country = QuestionCountry::model()->find("id_question = '$id'");
        if ($country != NULL) {
            $country = Countries::model()->find("id = '$country->id_country'");
        }

        $this->render('index', array(
            'model'    => $model,
            'answer'   => $answer,
            'category' => $category,
            'country'  => $country
        ));
    }

    public function actionDelete($id)
    {
        Question::model()->findByPk($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('question/index'));
    }

    //JN:code
    public function actionUpdate($id)
    {
        $model = Question::model()->find(array(
            'condition' => 'id = :id',
            'params'    => array(':id' => $id)
        ));

        $criteria_category = new CDbCriteria;
        $criteria_category->order = 'sort ASC , id DESC';
        $category_parents = Category::model()->findAll($criteria_category);
        $arr = array();
        foreach ($category_parents as $t) {
            $arr[] = $t->attributes;
        }
        $category_parents = $this->_sortCategory($arr);

        $countries = Countries::model()->findAll();

        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Question'];

            if ($model->validate()) {
                $model->update();
                $answers = isset($_POST['answers']) ? $_POST['answers'] : false;

                $question_categories = isset($_POST['question_categories']) ? $_POST['question_categories'] : false;
                $question_countries = isset($_POST['question_countries']) ? $_POST['question_countries'] : false;

                if ($answers) {
                    foreach ($answers as $k => $v) {
                        if (is_numeric($k))
                            $answer = Answer::model()->find('id = :id and id_question = :id2', array(
                                ':id'  => $k,
                                ':id2' => $model->id
                            )); else
                            $answer = false;

                        if ($answer) {
                            $answer->content = preg_replace("/&#?[a-z0-9]+;/i", "", $answer->content);
                            $answer->content = $v;
                            $answer->update();
                        } else {
                            $answer = new Answer();
                            $answer->id_question = $model->id;
                            $answer->author = 'admin';
                            $answer->content = $v;
                            $answer->save();
                        }

                    }
                }
                //remove questioncategory old
                $get_qc_remove = QuestionCategory::model()->findAll('id_question = :id', array(':id' => $model->id));
                foreach ($get_qc_remove as $qc_remove)
                    $qc_remove->delete();
                if ($question_categories) {
                    foreach ($question_categories as $key => $value) {
                        $create_qc = new QuestionCategory();
                        $create_qc->id_category = $value;
                        $create_qc->id_question = $model->id;
                        $create_qc->save();
                    }
                }
                //remove questioncountry old
                $get_qc_remove = QuestionCountry::model()->findAll('id_question = :id', array(':id' => $model->id));
                foreach ($get_qc_remove as $qc_remove)
                    $qc_remove->delete();
                if ($question_countries) {
                    foreach ($question_countries as $key => $value) {
                        $create_qc = new QuestionCountry();
                        $create_qc->id_country = $value;
                        $create_qc->id_question = $model->id;
                        $create_qc->save();
                    }
                }
                Yii::app()->user->setFlash('success', "Update question {$model->title} success!");
            } else {
                Yii::app()->user->setFlash('error', "Update fails");
            }
            return $this->redirect(array('question/update?id=' . $model->id));
        } else {
            return $this->render('update', array(
                'model'            => $model,
                'category_parents' => $category_parents,
                'countries'        => $countries
            ));
        }
    }

    //JN:code
    public function actionCreate()
    {
        $model = new Question();
        $criteria_category = new CDbCriteria;
        $criteria_category->order = 'sort ASC , id DESC';
        $category_parents = Category::model()->findAll($criteria_category);
        $arr = array();
        foreach ($category_parents as $t) {
            $arr[] = $t->attributes;
        }
        $category_parents = $this->_sortCategory($arr);
        $countries = Countries::model()->findAll();
        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_POST['Question'];
            if ($model->validate()) {
                $answers = isset($_POST['answers']) ? $_POST['answers'] : false;
                $question_categories = isset($_POST['question_categories']) ? $_POST['question_categories'] : false;
                $question_countries = isset($_POST['question_countries']) ? $_POST['question_countries'] : false;
                if ($model->save()) {
                    $model->getPrimaryKey();
                    $id_question = $model->id;
                    if ($question_categories) {
                        foreach ($question_categories as $key => $value) {
                            $qca = new QuestionCategory();
                            $qca->id_question = $id_question;
                            $qca->id_category = $value;
                            $qca->save();
                        }
                        ///$question_countries = null;
                    }

                    if ($answers) {
                        foreach ($answers as $k => $v) {
                            $answer = new Answer();
                            $answer->id_question = $id_question;
                            $answer->author = 'admin';
                            $answer->content = $v;
                            $answer->save();
                        }
                    }

                    if ($question_countries) {
                        foreach ($question_countries as $key => $value) {
                            $qco = new QuestionCountry();
                            $qco->id_country = $value;
                            $qco->id_question = $id_question;
                            $qco->ads_number = 0;
                            $qco->save();
                        }
                    }
                    Yii::app()->user->setFlash('success', "Create question {$model->title} success!");
                    return $this->redirect(array('question/update?id=' . $id_question));
                } else {
                    Yii::app()->user->setFlash('error', "Create fails!");
                }
            } else {
                Yii::app()->user->setFlash('error', "Not enough information!");
            }
        }

        return $this->render('create', array(
            'model'            => $model,
            'category_parents' => $category_parents,
            'countries'        => $countries
        ));
    }

    public function actionDel_answer($id)
    {

        $model = Answer::model()->findBySql("Select id From answer Where id = '$id'", array('select' => 'role'));
        if ($model->delete()) {

            echo "Delete succesfully";
        } else {
            echo "An error occurred";
        }
    }

    //JN:start
    public function actionSort()
    {
        $list_order = $_POST['list_order'];
        $list = explode(',', $list_order);
        $connect = Yii::app()->db;
        $command = $connect->createCommand("select * from question where id in ($list_order) ");
        $dataReader = $command->query();

        if (count($dataReader) > 0) {
            $count = 0;
            foreach ($dataReader as $row) {
                $posi = (array_search($row['id'], $list) + 1);
                $command2 = $connect->createCommand("update question set `sort` = $posi where id = " . $row['id']);
                if ($command2->execute() > 0)
                    $count++;
            }
            echo 'Sort success. Have ' . $count . ' change';
        } else
            echo 'Not handle! No data!';
    }

    //JN:code
    public function actionChangeStatus()
    {
        $connect = Yii::app()->db;
        $checked = $_POST['value'];

        if (strtolower($checked) == 'true') {
            $status = 1;
        } else if (strtolower($checked) == 'false') {
            $status = 0;
        } else
            return "I'm sorry value not send";
        $command = $connect->createCommand("update question set `status` = $status where id = " . $_POST['id']);
        if ($command->execute() > 0) {
            return 'Change status success';
        }

        return 'Not save! you need update this item';
    }

    public function actionChangeSearch()
    {
        $connect = Yii::app()->db;
        $checked = $_POST['value'];

        if (strtolower($checked) == 'true') {
            $status = 1;
        } else if (strtolower($checked) == 'false') {
            $status = 0;
        } else
            return "I'm sorry value not send";
        $command = $connect->createCommand("update question set `search` = $status where id = " . $_POST['id']);
        if ($command->execute() > 0) {
            return 'Change search success';
        }

        return 'Not save! you need update this item';
    }

    //JN:code
    public function actionDelAnswer()
    {
        //$an = Answer::find()->where(['id' => $_POST['id_answer']])->one();
        $an = Answer::model()->find('id = :id', array(':id' => $_POST['id_answer']));
        if ($an->delete()) {
            echo 'Delete answer success!';
        } else {
            echo 'Delete answer fails!';
        }
    }

    //JN:code
    public function actionDel()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $connect = Yii::app()->db;
            try {
                $command = $connect->createCommand("delete from question where id = :id ");
                $command->bindParam(':id', $id, PDO::PARAM_INT);
                $command->execute();
                Yii::app()->user->setFlash('success', "Delete question success!");
                $this->redirect(array('question/IndexSize?size=10'));
            } catch (Exception $e) {
                $transaction->rollback();
                Yii::app()->user->setFlash('error', "Delete question fail!");
                $this->redirect(array('question/IndexSize?size=10'));
            }
        } else {
            Yii::app()->user->setFlash('error', "No data!");
            $this->redirect(array('question/IndexSize?size=10'));
        }
    }

    private function _sortCategory($categories)
    {
        $listCategories = $categories;
        $listResult = array();
        if (!empty($categories)) {
            foreach ($categories as $i => $item) {
                if ($item['parent'] == 0) {
                    unset($listCategories[$i]);
                    $listResult[$item['id']] = $item;
                    $listResult = $this->_getChildCategory($item['id'], $listCategories, $listResult);
                }
            }
        }
        return $listResult;
    }

    private function _getChildCategory($id, $categories, $listResult)
    {
        $countCategory = count($categories) - 1;
        $listCategories = $categories;
        if ($categories) {
            foreach ($categories as $i => $item) {
                if ($item['parent'] == $id) {
                    unset($listCategories[$i]);
                    $listResult[$id]['Child'][$i] = $item;
                    $listResult[$id]['Child'] = $this->_getChildCategory($item['id'], $listCategories, $listResult[$id]['Child']);
                }
            }
        }
        return $listResult;
    }

}
