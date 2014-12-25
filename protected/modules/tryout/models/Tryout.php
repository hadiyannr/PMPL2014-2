<?php

/**
 * This is the model class for table "tryout".
 *
 * The followings are the available columns in table 'tryout':
 * @property integer $id
 * @property string $waktuMulai
 * @property integer $durasi
 * @property string $tanggal
 * @property string $nama
 * @property integer $idAdmin
 *
 * The followings are the available model relations:
 * @property AnswerSheet[] $pengerjaantryouts
 * @property Question[] $soals
 * @property User $idAdmin0
 */
class Tryout extends CActiveRecord
{
    public $FUTURE = 1;
    public $AVAILABLE = 0;
    public $PAST = -1;


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
			array('waktuMulai, durasi, tanggal, nama', 'required'),
			array('durasi,idAdmin', 'numerical', 'integerOnly'=>true,'min'=>'1'),
			array('nama', 'length', 'max'=>75),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, waktuMulai, durasi, tanggal, nama,idAdmin', 'safe', 'on'=>'search'),
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
			'pengerjaantryouts' => array(self::HAS_MANY, 'AnswerSheet', 'idTryout'),
			'soals' => array(self::HAS_MANY, 'Question', 'idTryout'),
            'idAdmin0' => array(self::BELONGS_TO, 'User', 'idAdmin'),
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
			'durasi' => 'Durasi(menit)',
			'tanggal' => 'Tanggal',
			'nama' => 'Nama',
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
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('nama',$this->nama,true);
                $criteria->compare('idAdmin',$this->idAdmin);

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
        public function status(){   
            $startTime = $this->getStartTime();
            $finishTime = $this->getFinishTime($startTime);
            $now = date('Y-m-d H:i:s');
            if($now < $startTime){
                return $this->FUTURE;
            }elseif($now > $finishTime){
                return $this->PAST;
            }else{
                return $this->AVAILABLE;
            }
        }

        public function getStartTime(){
            return $this->tanggal ." " . $this->waktuMulai;
        }

        public function getFinishTime($startTime){
            return date('Y-m-d H:i:s',  strtotime("+{$this->durasi} minutes",  strtotime($startTime)));
        }
        
        public function isRegistered($id){
            $model = AnswerSheet::model()->findByAttributes(array('idPengguna'=>$id,'idTryout'=>$this->id));
            return $model != null;
        }

        
        public function getDetailedFinishTime(){
            return date(strtotime("+{$this->durasi} minutes",  strtotime($this->getStartTime())));
        }


        public static function getSeparatedTryout($tryoutModelList){
            $pastTryout = array();
            $myTryout = array();
            $futureTO = array();
            foreach($tryoutModelList as $tryout){
                if($tryout->status() < 0){
                    $futureTO[] = $tryout;
                }else if($tryout->isRegistered(Yii::app()->user->id)){
                    $myTryout[] = $tryout;
                }else{
                    $pastTryout[] = $tryout;
                }
            }
            $tryoutModelList = array($myTryout,$pastTryout,$futureTO);
            return $tryoutModelList;
        }

        public static function getTryoutDone($userId){
            $criteria = new CDbCriteria();
            $criteria->join = 'JOIN pengerjaantryout p ON t.id = p.idTryout';
            $criteria->compare('idPengguna', $userId);
            $tryoutModelList = Tryout::model()->findAll($criteria);
            return $tryoutModelList;
        }

    public function getLastNumber(){
        $max= -1;
        foreach($this->soals as $question){
            if($question->nomor > $max){
                $max = $question->nomor;
            }
        }
        return $max;
    }
}
