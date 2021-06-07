<?php

/**
 * This is the model class for table "options".
 *
 * The followings are the available columns in table 'options':
 * @property integer $id
 * @property string $name_pages
 * @property string $title
 * @property string $keyword
 * @property string $description
 * @property string $author
 * @property string $dcterm
 * @property string $link_title
 * @property string $h1text
 * @property string $robots
 * @property string $imghtml
 */
class Options extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_pages, title, keyword, description, author, dcterm, link_title, h1text, imghtml', 'required'),
			array('name_pages, title, author, dcterm, link_title, robots', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name_pages, title, keyword, description, author, dcterm, link_title, h1text, robots, imghtml', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name_pages' => 'Name Pages',
			'title' => 'Title',
			'keyword' => 'Keyword',
			'description' => 'Description',
			'author' => 'Author',
			'dcterm' => 'Dcterm',
			'link_title' => 'Link Title',
			'h1text' => 'H1text',
			'robots' => 'Robots',
			'imghtml' => 'Imghtml',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name_pages',$this->name_pages,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('dcterm',$this->dcterm,true);
		$criteria->compare('link_title',$this->link_title,true);
		$criteria->compare('h1text',$this->h1text,true);
		$criteria->compare('robots',$this->robots,true);
		$criteria->compare('imghtml',$this->imghtml,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Options the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
