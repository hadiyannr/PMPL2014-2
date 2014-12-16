<?php

/**
 * This is the model class for table "pengguna".
 *
 * The followings are the available columns in table 'pengguna':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property integer $isAdmin
 * @property integer $isActive
 *
 * The followings are the available model relations:
 * @property AnswerSheet[] $pengerjaantryouts
 * @property Profile[] $profils
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pengguna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password, isAdmin, isActive', 'required'),
			array('isAdmin, isActive', 'numerical', 'integerOnly'=>true),
			array('username, email, password', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password, isAdmin, isActive', 'safe', 'on'=>'search'),
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
			'pengerjaantryouts' => array(self::HAS_MANY, 'AnswerSheet', 'idPengguna'),
			'profils' => array(self::HAS_MANY, 'Profile', 'idpengguna'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'isAdmin' => 'Is Admin',
			'isActive' => 'Is Active',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('isAdmin',$this->isAdmin);
		$criteria->compare('isActive',$this->isActive);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Returns User model by its email
     *
     * @param string $email
     * @access public
     * @return User
     */
    public function findByEmail($email)
    {
        return self::model()->findByAttributes(array('email' => $email));
    }
}
