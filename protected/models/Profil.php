<?php

/**
 * This is the model class for table "profil".
 *
 * The followings are the available columns in table 'profil':
 * @property integer $id
 * @property string $nama
 * @property string $fotoUrl
 * @property integer $jenisKelamin
 * @property integer $idPengguna
 * @property string $tanggalLahir
 * @property string $targetJurusan
 * @property string $asalSma
 *
 * The followings are the available model relations:
 * @property Pengguna $idPengguna0
 */
class Profil extends CActiveRecord
{
        public $image;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jenisKelamin, idPengguna', 'numerical', 'integerOnly'=>true),
                        array('idPengguna, nama','required'),
			array('nama', 'length', 'max'=>100),
			array('fotoUrl, asalSma', 'length', 'max'=>255),
			array('targetJurusan', 'length', 'max'=>200),
			array('tanggalLahir', 'safe'),
//                        array('image', 'file', 'types'=>'jpg, gif, png','wrongType'=>'Format gambar harus jpg, gif, png'),
//                        array('image', 'file', 'maxSize'=>1024*1024*15, 'tooLarge'=>'File harus kurang dari 15MB'),
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, fotoUrl, jenisKelamin, idPengguna, tanggalLahir, targetJurusan, asalSma', 'safe', 'on'=>'search'),
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
			'idPengguna0' => array(self::BELONGS_TO, 'Pengguna', 'idPengguna'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'fotoUrl' => 'Foto Url',
			'jenisKelamin' => 'Jenis Kelamin',
			'idPengguna' => 'Id Pengguna',
			'tanggalLahir' => 'Tanggal Lahir',
			'targetJurusan' => 'Target Jurusan',
			'asalSma' => 'Asal Sma',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('fotoUrl',$this->fotoUrl,true);
		$criteria->compare('jenisKelamin',$this->jenisKelamin);
		$criteria->compare('idPengguna',$this->idPengguna);
		$criteria->compare('tanggalLahir',$this->tanggalLahir,true);
		$criteria->compare('targetJurusan',$this->targetJurusan,true);
		$criteria->compare('asalSma',$this->asalSma,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getJenisKelamin(){
            return ($this->jenisKelamin==0)?"Perempuan":"Laki - Laki";
        }
}
