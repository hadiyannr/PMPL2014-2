<?php

/**
 * This is the model class for table "opsi".
 *
 * The followings are the available columns in table 'opsi':
 * @property integer $idTryout
 * @property integer $idSoal
 * @property integer $idPengerjaan
 * @property string $nomor
 * @property integer $isJawaban
 * @property string $pernyataan
 *
 * The followings are the available model relations:
 * @property Pengerjaantryout $idPengerjaan0
 * @property Soal $idTryout0
 * @property Soal $idSoal0
 */
class Opsi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'opsi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idTryout, idSoal, idPengerjaan, pernyataan', 'required'),
			array('idTryout, idSoal, idPengerjaan, isJawaban', 'numerical', 'integerOnly'=>true),
			array('nomor', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTryout, idSoal, idPengerjaan, nomor, isJawaban, pernyataan', 'safe', 'on'=>'search'),
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
			'idPengerjaan0' => array(self::BELONGS_TO, 'Pengerjaantryout', 'idPengerjaan'),
			'idTryout0' => array(self::BELONGS_TO, 'Soal', 'idTryout'),
			'idSoal0' => array(self::BELONGS_TO, 'Soal', 'idSoal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTryout' => 'Id Tryout',
			'idSoal' => 'Id Soal',
			'idPengerjaan' => 'Id Pengerjaan',
			'nomor' => 'Nomor',
			'isJawaban' => 'Is Jawaban',
			'pernyataan' => 'Pernyataan',
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

		$criteria->compare('idTryout',$this->idTryout);
		$criteria->compare('idSoal',$this->idSoal);
		$criteria->compare('idPengerjaan',$this->idPengerjaan);
		$criteria->compare('nomor',$this->nomor,true);
		$criteria->compare('isJawaban',$this->isJawaban);
		$criteria->compare('pernyataan',$this->pernyataan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Opsi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
