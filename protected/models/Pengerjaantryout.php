<?php

/**
 * This is the model class for table "pengerjaantryout".
 *
 * The followings are the available columns in table 'pengerjaantryout':
 * @property integer $id
 * @property string $nilai
 * @property integer $idPengguna
 * @property integer $idTryout
 *
 * The followings are the available model relations:
 * @property Opsi[] $opsis
 * @property Pengguna $idPengguna0
 * @property Tryout $idTryout0
 */
class Pengerjaantryout extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengerjaantryout';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idPengguna, idTryout', 'required'),
			array('idPengguna, idTryout', 'numerical', 'integerOnly'=>true),
			array('nilai', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nilai, idPengguna, idTryout', 'safe', 'on'=>'search'),
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
			'opsis' => array(self::HAS_MANY, 'Opsi', 'idPengerjaan'),
			'idPengguna0' => array(self::BELONGS_TO, 'Pengguna', 'idPengguna'),
			'idTryout0' => array(self::BELONGS_TO, 'Tryout', 'idTryout'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nilai' => 'Nilai',
			'idPengguna' => 'Id Pengguna',
			'idTryout' => 'Id Tryout',
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
		$criteria->compare('nilai',$this->nilai,true);
		$criteria->compare('idPengguna',$this->idPengguna);
		$criteria->compare('idTryout',$this->idTryout);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pengerjaantryout the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
