<?php

/**
 * This is the model class for table "opsi".
 *
 * The followings are the available columns in table 'opsi':
 * @property integer $id
 * @property integer $idsoal
 * @property integer $isJawaban
 * @property string $nomor
 * @property string $pernyataan
 *
 * The followings are the available model relations:
 * @property Soal $idsoal0
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
			array('idsoal, nomor, pernyataan', 'required'),
			array('idsoal, isJawaban', 'numerical', 'integerOnly'=>true),
			array('nomor', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idsoal, isJawaban, nomor, pernyataan', 'safe', 'on'=>'search'),
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
			'idsoal0' => array(self::BELONGS_TO, 'Soal', 'idsoal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idsoal' => 'Idsoal',
			'isJawaban' => 'Is Jawaban',
			'nomor' => 'Nomor',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('idsoal',$this->idsoal);
		$criteria->compare('isJawaban',$this->isJawaban);
		$criteria->compare('nomor',$this->nomor,true);
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
        
        public function getOption($no){
            return chr($no + 97).".".$this->pernyataan;
        }                
}
