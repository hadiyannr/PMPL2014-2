<?php

/**
 * This is the model class for table "konten".
 *
 * The followings are the available columns in table 'konten':
 * @property integer $id
 * @property integer $idcategory
 * @property string $isi
 * @property string $judul
 * @property integer $isPublished
 * @property integer $idAdmin
 *
 * The followings are the available model relations:
 * @property Pengguna $idAdmin0
 * @property Kategori $idcategory0
 */
class Konten extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'konten';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcategory, judul,isPublished, idAdmin', 'required'),
			array('idcategory, isPublished', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>99),
			array('isi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idcategory, isi, judul, isPublished, idAdmin', 'safe', 'on'=>'search'),
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
                        'idAdmin0' => array(self::BELONGS_TO, 'Pengguna', 'idAdmin'),
			'kategori' => array(self::BELONGS_TO, 'Kategori', 'idcategory'),                        
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idcategory' => 'Kategori',
			'isi' => 'Isi',
			'judul' => 'Judul',
			'isPublished' => 'Status Publikasi',
                        'idAdmin' => 'Editor',
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
		$criteria->compare('idcategory',$this->idcategory);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('isPublished',$this->isPublished);
                $criteria->compare('idAdmin',$this->idAdmin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Konten the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
