<?php
/*
 *@Author JackNguyen
 */
/**
 * This is the model class for table "interview".
 *
 * The followings are the available columns in table 'interview':
 * @property integer $id
 * @property integer $id_office
 * @property string $name
 * @property string $name_transcription
 * @property string $slug
 * @property integer $sex
 * @property string $image
 * @property string $maxim
 * @property string $seminar_title
 * @property string $content
 * @property integer $order
 * @property integer $status
 * @property string $update_at
 *
 * The followings are the available model relations:
 * @property Office $idOffice
 */
class Interview extends CActiveRecord {

    public $filePath, $office_search;
    public function __construct($scenario = 'insert') {
        parent::__construct($scenario);
        date_default_timezone_set('Asia/Tokyo');
    }
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'interview';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, name_transcription, slug, content', 'required'),
            array('id_office, sex, order, status', 'numerical', 'integerOnly' => true),
            array('name, name_transcription, slug, image, maxim, seminar_title', 'length', 'max' => 255),         
            array('id, id_office, name, name_transcription, slug, sex, image, maxim, seminar_title, content, order, status, update_at, office_search', 'safe', 'on' => 'search'),
            array('filePath', 'file', 'allowEmpty' => true, 'types' => 'png, jpg, jpeg, gif'),
            array('update_at', 'default', 'value' => date('Y-m-d H:i:s')),
			array('slug', 'filter', 'filter'=>array($this,'handleSlug')),		
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
            'idOffice' => array(self::BELONGS_TO, 'Office', 'id_office'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_office' => 'オフィス <span style="color:red">必須</span>',
            'name' => 'Name',
            'name_transcription' => 'Name Transcription',
            'slug' => 'Slug',
            'sex' => 'Sex',
            'image' => 'Image',
            'maxim' => '座右の銘',
            'seminar_title' => 'セミナーキーワード',
            'content' => 'Content',
            'order' => 'Order',
            'status' => 'Status',
            'update_at' => 'Update At',
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

        $criteria->compare('t.id', $this->id);
        //$criteria->compare('id_office', $this->id_office);
        $criteria->compare('t.name', $this->name, true);
        $criteria->compare('t.name_transcription', $this->name_transcription, true);
        $criteria->compare('t.slug', $this->slug, true);
        $criteria->compare('t.sex', $this->sex);
        $criteria->compare('t.image', $this->image, true);
        $criteria->compare('t.maxim', $this->maxim, true);
        $criteria->compare('t.seminar_title', $this->seminar_title, true);
        $criteria->compare('t.content', $this->content, true);
        $criteria->compare('t.order', $this->order);
        $criteria->compare('t.status', $this->status);
        $criteria->compare('t.update_at', $this->update_at, true);

        $criteria->with = array('idOffice');
        $criteria->compare('idOffice.name_transcription', $this->office_search, true);
        
        $criteria->order = 't.id_office, t.order, t.id desc';
        // edit by Minh quyen
        $dataProvider = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            //'order' => 
        ));
        $dataProvider->setPagination( FALSE );
        return $dataProvider;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Interview the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
	public function handleSlug($code)		
    {		
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
