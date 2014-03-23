<?php

/**
 * This is the model class for table "tryout".
 *
 * The followings are the available columns in table 'tryout':
 * @property integer $id
 * @property string $waktuMulai
 * @property integer $durasi
 *
 * The followings are the available model relations:
 * @property Pengerjaantryout[] $pengerjaantryouts
 * @property Soal[] $soals
 */
class Tryout extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tryout';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('durasi', 'numerical', 'integerOnly'=>true),
			array('waktuMulai', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, waktuMulai, durasi', 'safe', 'on'=>'search'),
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
			'pengerjaantryouts' => array(self::HAS_MANY, 'Pengerjaantryout', 'idTryout'),
			'soals' => array(self::HAS_MANY, 'Soal', 'idTryout'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'waktuMulai' => 'Waktu Mulai',
			'durasi' => 'Durasi',
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
		$criteria->compare('waktuMulai',$this->waktuMulai,true);
		$criteria->compare('durasi',$this->durasi);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tryout the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
