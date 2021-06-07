<?php

/**
 * This is the model class for table "countries".
 *
 * The followings are the available columns in table 'countries':
 * @property integer $id
 * @property string $name
 * @property string $name_transcription
 * @property string $abbr
 * @property string $image
 * @property string $note
 * @property integer $ads_number
 *
 * The followings are the available model relations:
 * @property Question[] $questions
 */
class Countries extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'countries';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, name_transcription, abbr, image', 'required'),
			array('ads_number', 'numerical', 'integerOnly'=>true),
			array('name, name_transcription, image', 'length', 'max'=>255),
			array('abbr', 'length', 'max'=>50),
			array('note', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, name_transcription, abbr, image, note, ads_number', 'safe', 'on'=>'search'),
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
			'questions' => array(self::MANY_MANY, 'Question', 'question_country(id_country, id_question)'),

			'questions_sort_status' => array(self::MANY_MANY, 'Question', 'question_country(id_country, id_question)','order'=>'questions_sort_status.sort ASC ,questions_sort_status.id DESC',
				'condition'=>'questions_sort_status.status = 1'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'name_transcription' => 'Name Transcription',
			'abbr' => 'Abbr',
			'image' => 'Image',
			'note' => 'Note',
			'ads_number' => 'Ads Number',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('name_transcription',$this->name_transcription,true);
		$criteria->compare('abbr',$this->abbr,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('ads_number',$this->ads_number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Countries the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
