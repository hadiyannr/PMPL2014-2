<?php

/**
 * This is the model class for table "jawaban".
 *
 * The followings are the available columns in table 'jawaban':
 * @property integer $id
 * @property integer $idpengerjaan
 * @property integer $idsoal
 * @property string $isiJawaban
 *
 * The followings are the available model relations:
 * @property Question $idsoal0
 * @property AnswerSheet $idpengerjaan0
 */
class Answer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jawaban';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpengerjaan, idsoal', 'required'),
			array('idpengerjaan, idsoal', 'numerical', 'integerOnly'=>true),
			array('isiJawaban', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idpengerjaan, idsoal, isiJawaban', 'safe', 'on'=>'search'),
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
			'idsoal0' => array(self::BELONGS_TO, 'Question', 'idsoal'),
			'idpengerjaan0' => array(self::BELONGS_TO, 'AnswerSheet', 'idpengerjaan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idpengerjaan' => 'Idpengerjaan',
			'idsoal' => 'Idsoal',
			'isiJawaban' => 'Isi Jawaban',
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
		$criteria->compare('idpengerjaan',$this->idpengerjaan);
		$criteria->compare('idsoal',$this->idsoal);
		$criteria->compare('isiJawaban',$this->isiJawaban,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Answer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
