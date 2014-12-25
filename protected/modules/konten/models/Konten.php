<?php

/**
 * This is the model class for table "konten".
 *
 * The followings are the available columns in table 'konten':
 * @property integer $id
 * @property integer $idcategory
 * @property string $isi
 * @property string $judul
 * @property string $imagepath
 * @property integer $isPublished
 * @property integer $idAdmin
 *
 * The followings are the available model relations:
 * @property User $idAdmin0
 * @property KategoriKonten $idcategory0
 */
class Konten extends CActiveRecord
{
    public $image;
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
			array('idcategory, judul, idAdmin', 'required'),
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
                        'idAdmin0' => array(self::BELONGS_TO, 'User', 'idAdmin'),
			'kategorikonten' => array(self::BELONGS_TO, 'KategoriKonten', 'idcategory'),                        
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
            'imagepath' => 'Lokasi Gambar',
			'isPublished' => 'Status Publikasi',
            'idAdmin' => 'Editor',
		);
	}

	
	public static function search($keyword)
	{		
		$criteria=new CDbCriteria;		                
		$criteria->compare('isi',$keyword,true,"OR");
		$criteria->compare('judul',$keyword,true,"OR");
        $criteria->compare('isPublished','1');

		return Konten::model()->findAll($criteria);
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
