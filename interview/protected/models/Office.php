<?php

/**
 * This is the model class for table "office".
 *
 * The followings are the available columns in table 'office':
 * @property integer $id
 * @property string $name
 * @property string $name_transcription
 * @property string $style_pc
 * @property string $style_mobile
 * @property integer $hidden
 *
 * The followings are the available model relations:
 * @property Interview[] $interviews
 */
class Office extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'office';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, name_transcription', 'required'),
			array('hidden', 'numerical', 'integerOnly'=>true),
			array('name, name_transcription, style_pc, style_mobile', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, name_transcription, style_pc, style_mobile, hidden', 'safe', 'on'=>'search'),
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
			'interviews' => array(self::HAS_MANY, 'Interview', 'id_office'),
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
			'style_pc' => 'Style Pc',
			'style_mobile' => 'Style Mobile',
			'hidden' => 'Hidden',
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
		$criteria->compare('style_pc',$this->style_pc,true);
		$criteria->compare('style_mobile',$this->style_mobile,true);
		$criteria->compare('hidden',$this->hidden);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Office the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
