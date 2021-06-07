<?php
//Auth: Jack Nguyen

/**
 * This is the model class for table "question".
 *
 * The followings are the available columns in table 'question':
 * @property integer $id
 * @property string $title
 * @property string $note
 * @property string $keyword
 * @property integer $sort
 * @property integer $status
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Answer[] $answers
 * @property Category[] $categories
 * @property Countries[] $countries
 */
class Question extends CActiveRecord {

    public $category_search = -1, $country_search = -1;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'question';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('sort, status, search, category_search, country_search', 'numerical', 'integerOnly' => true),
            array('title, keyword', 'length', 'max' => 255),
            array('note', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, note, keyword, sort, status, updated_at, category_search, country_search, search', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'answers' => array(self::HAS_MANY, 'Answer', 'id_question'),
            'categories' => array(self::MANY_MANY, 'Category', 'question_category(id_question, id_category)'),
            'countries' => array(self::MANY_MANY, 'Countries', 'question_country(id_question, id_country)'),
            //JN
            'question_country' => array(self::HAS_MANY, 'QuestionCountry', 'id_question'),
            'question_category' => array(self::HAS_MANY, 'QuestionCategory', 'id_question'),
        );
    }

    public function categoryList()
    {
        $categories = [];
        $question_id = $this->id;
        $question_category = QuestionCategory::model()->findAll("id_question = '$question_id'");
        foreach ($question_category as $category) {
            $category = Category::model()->find("id = '$category->id_category'");
            $categories[] = $category;
        }
        return $categories;
    }

    public function countryList()
    {
        $countries = [];
        $question_id = $this->id;
        $question_country = QuestionCountry::model()->findAll("id_question = '$question_id'");
        foreach ($question_country as $item) {
            $country = Countries::model()->find("id = '$item->id_country'");
            $countries[] = $country;
        }
        return $countries;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'タイトル',
            'note' => '注意',
            'keyword' => 'キーワード',
            'sort' => 'Sort',
            'status' => '状態',
            'updated_at' => 'Updated At',
            'search' => 'サーチ',
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
        $criteria->compare('note', $this->note, true);
        $criteria->compare('keyword', $this->keyword, true);
        $criteria->compare('sort', $this->sort);
        $criteria->compare('status', $this->status);
        $criteria->compare('search', $this->search);
        $criteria->compare('updated_at', $this->updated_at, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function search_size($size = 10) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.note', $this->note, true);
        $criteria->compare('t.keyword', $this->keyword, true);
        $criteria->compare('t.sort', $this->sort);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.search', $this->search);
        $criteria->compare('t.updated_at', $this->updated_at, true);

        Yii::app()->params['show_page_size'] = 1; //show chose page size

        //condition to sortable
        if($this->category_search <= 0 && $this->country_search > 0 || $this->category_search > 0 && $this->country_search <= 0) {
            Yii::app()->params['sortable'] = 1;
        } else {
            Yii::app()->params['sortable'] = 0;
        }

        //Filter by Category
        if ($this->category_search > 0) {
            Yii::app()->params['show_page_size'] = 0; //not show page size
            $size = $this->count();
            $criteria->with = array(
                'question_category' => array(
                    'together' => true,
                    'condition' => 'question_category.id_category = :id_category',
                    'params' => array(':id_category' => $this->category_search),
                    'order' => 't.sort',
                ),
            );
        }

        //Filter by Country
        if ($this->country_search > 0) {
            Yii::app()->params['show_page_size'] = 0; //not show page size
            $size = $this->count();
            $criteria->with = array(
                'question_country' => array(
                    'together' => true,
                    'condition' => 'question_country.id_country = :id_country',
                    'params' => array(':id_country' => $this->country_search),
                    'order' => 't.sort',
                ),
            );
        }

        //order if not sort
        if($this->category_search <= 0 && $this->country_search <= 0){
            $criteria->order = 't.id DESC, t.sort';
        }

        if ($size == 'all') {
            $optionADP = array(
                'criteria' => $criteria,
                //'pagination' => false,//error in server
            );
        } else {
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
     * @return Question the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
