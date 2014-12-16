<?php

/**
 * This is the model class for table "pengerjaantryout".
 *
 * The followings are the available columns in table 'pengerjaantryout':
 * @property integer $id
 * @property integer $nilai
 * @property integer $isSubmitted
 * @property integer $idPengguna
 * @property integer $idTryout
 *
 * The followings are the available model relations:
 * @property Answer[] $jawabans
 * @property User $idPengguna0
 * @property Tryout $idTryout0
 */
class AnswerSheet extends CActiveRecord
{
    public $avg;
    public $max;
    public $min;
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
			array('nilai,isSubmitted, idPengguna, idTryout', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nilai,isSubmitted, idPengguna, idTryout', 'safe', 'on'=>'search'),
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
			'jawabans' => array(self::HAS_MANY,'Answer', 'idpengerjaan'),
			'idPengguna0' => array(self::BELONGS_TO, 'User', 'idPengguna'),
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
                        'isSubmitted' => 'Is Submitted',
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
		$criteria->compare('nilai',$this->nilai);   
                $criteria->compare('isSubmitted',$this->isSubmitted);
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
	 * @return AnswerSheet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function hitungNilai(){
            $nilai = 0;
            foreach($this->jawabans as $jawaban){
                if($jawaban->idsoal0->opsis[$jawaban->isiJawaban]->isJawaban == 1){
                    $nilai+=3; 
                }else{
                    $nilai--;
                }
            }            
            $this->nilai = $nilai;
        }
        
        public function getDetail($idTryout){            
            //Cari ranking
            $criteria = new CDbCriteria;
            $criteria->order = 'nilai DESC';        
            $criteria->compare('idTryout',$idTryout);
            $model = AnswerSheet::model()->findAll($criteria);
            $rank = 1;
            for($i = 0; $i < sizeof($model);$i++){
                if($model[$i]->idPengguna == $this->idPengguna){
                    $rank = $i+1;
                }
            }
            
            //cari detail
            $true = 0;
            $false = 0;
            foreach($this->jawabans as $answer){
                if($answer->idsoal0->opsis[$answer->isiJawaban]->isJawaban == 1){
                    $true++;
                }else{
                    $false++;
                }
            }
            $empty = sizeof(Question::model()->findAllByAttributes(array('idtryout'=>$idTryout)))  - ($true + $false);
            
            return array(
                'rank' =>$rank,
                'benar' =>$true,
                'salah' =>$false,
                'kosong' =>$empty,
            );
        }
}
