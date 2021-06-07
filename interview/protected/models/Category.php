<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $title
 * @property integer $parent
 * @property string $slug
 * @property string $description
 * @property string $note
 * @property integer $sort
 * @property integer $status
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Question[] $questions
 */
class Category extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, slug, parent', 'required'),
            array('parent, sort, status', 'numerical', 'integerOnly' => true),
            array('title, slug', 'length', 'max' => 255),
            array('description, note', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, parent, slug, description, note, sort, status, updated_at', 'safe', 'on' => 'search'),
            array('slug', 'filter', 'filter' => array($this, 'handleSlug')),
            array('slug', 'unique', 'allowEmpty' => false),
            );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'questions' => array(self::MANY_MANY, 'Question', 'question_category(id_category, id_question)', 'order' => 'sort ASC'),
            'frontend_questions' => array(self::MANY_MANY, 'Question', 'question_category(id_category, id_question)', 'order' => 'frontend_questions.sort ASC ,frontend_questions.id DESC',
              'condition'=>'frontend_questions.status = 1'  ),
            );
    }

    public function questionList()
    {
        $questions = [];
        $category_id = $this->id;
        $question_category = QuestionCategory::model()->findAll("id_category = '$category_id'");

        foreach ($question_category as $item) {
            $question = Question::model()->find("id = :id AND status = :status", array(
                ":id"     => $item->id_question,
                ":status" => 1
            ));
            if ($question) {
                $questions[] = $question;
            }
        }

        //Sort by sort, id
        usort($questions, function ($a, $b) {
            return $a->sort . "||" . $a->id > $b->sort . "||" . $b->id;
        });
        return $questions;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'タイトル',
            'parent' => 'Parent',
            'slug' => 'Slug',
            'description' => '説明',
            'note' => '注意',
            'sort' => 'Sort',
            'status' => '状態',
            'updated_at' => 'Updated At',
            );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('parent', $this->parent);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('sort', $this->sort);
        $criteria->compare('status', $this->status);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->order = 't.sort, t.parent, t.id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria
            ));
    }
    
    public function search_size($size = 10) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('parent', $this->parent);
        $criteria->compare('slug', $this->slug, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('sort', $this->sort);
        $criteria->compare('status', $this->status);
        $criteria->compare('updated_at', $this->updated_at, true);
        $criteria->order = 't.sort, t.parent, t.id DESC';
        
        //condition sortable and show chose page size
        if($this->parent != null)
        {
            $size = $this->count();
            Yii::app()->params['show_page_size'] = 0;
            Yii::app()->params['sortable'] = 1;
        }else
        {
            Yii::app()->params['show_page_size'] = 1;
            Yii::app()->params['sortable'] = 0;
        }
        
        if($size == 'all')
        {
            $optionADP = array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => $this->count(),
                    ),
                );
        }else
        {
            $optionADP = array(
                'criteria' => $criteria,
                'pagination' => array(
                    'pageSize' => $size,
                    ),
                );
        }
        
        return new CActiveDataProvider($this, $optionADP);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function handleSlug($code) {
        $replace = '-';
        $pattern = '/[^a-zA-Z0-9\x{3041}-\x{3096}\x{30a0}-\x{30ff}\x{3400}-\x{4db5}\x{4e00}-\x{9faf}\x{f900}-\x{fa6a}\x{2e80}-\x{2fd5}]+/u';   
        try{
            return preg_replace($pattern, $replace, trim($code));
        }catch(Exception $e)
        {
            $pattern = '/[\s]+/';
            return preg_replace($pattern, $replace, trim($code));
        }
    }

}
