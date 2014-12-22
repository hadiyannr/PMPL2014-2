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


    public function getSortedAnswerSheetsByMark($idTryout){
        $criteria = new CDbCriteria;
        $criteria->order = 'nilai DESC';
        $criteria->compare('idTryout',$idTryout);
        $model = AnswerSheet::model()->findAll($criteria);
        return $model;
    }

    public function getRank($listOfAnswerSheet){
        $rank = 1;
        for($i = 0; $i < sizeof($listOfAnswerSheet);$i++){
            if($listOfAnswerSheet[$i]->idPengguna == $this->idPengguna){
                $rank = $i+1;
            }
        }
        return $rank;
    }

        public function countingMark(){
            $mark = 0;
            foreach($this->jawabans as $answer){
                if($answer->idsoal0->opsis[$answer->isiJawaban]->isJawaban == 1){
                    $mark+=3;
                }else{
                    $mark--;
                }
            }            
            $this->nilai = $mark;
        }

        public function countTrueFalse($idTryout){
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
            return array($true,$false,$empty);
        }


        public function getDetail($idTryout){
            $model = $this->getSortedAnswerSheetsByMark($idTryout);
            $rank = $this->getRank($model);
            $detailedTrueFalse = $this->countTrueFalse($idTryout);
            
            return array(
                'rank' =>$rank,
                'benar' =>$detailedTrueFalse[0],
                'salah' =>$detailedTrueFalse[1],
                'kosong' =>$detailedTrueFalse[2],
            );
        }

    public static function getTryoutsStatisticSetting($id,$pageSize){
        $criteria = AnswerSheet::getDescendingSubmittedTryoutCriteria($id);
        $count = AnswerSheet::countBasedOfCriteria($criteria);
        $pages=AnswerSheet::getPaginationSetting($count,$pageSize,$criteria);
        $answerSheetList = AnswerSheet::model()->findAll($criteria);
        $tryoutStatistic = AnswerSheet::getStatistic($id);
    }

    public static function getPaginationSetting($count,$pageSize,$criteria){
        $pages=new CPagination($count);
        $pages->pageSize=$pageSize;
        $pages->applyLimit($criteria);
        return $pages;
    }

    public static function getDescendingSubmittedTryoutCriteria($id){
        $criteria = new CDbCriteria;
        $criteria->order = 'nilai DESC';
        $criteria->compare('idTryout',$id);
        $criteria->compare('isSubmitted',1);
        return $criteria;
    }
    public static function getStatistic($id){
        $criteria = new CDbCriteria;
        $criteria->select = array("MAX(nilai) as max","MIN(nilai) as min","AVG(nilai) as avg");
        $criteria->compare('idTryout',$id);
        $tryoutStatistic =AnswerSheet::model()->find($criteria);
        return $tryoutStatistic;
    }
    public static function countBasedOfCriteria($criteria){
        $count = AnswerSheet::model()->count($criteria);
        return $count;
    }
    public static function getAnswerSheet($userId,$idTryout){
        return AnswerSheet::model()->findByAttributes(array('idPengguna'=>$userId,'idTryout'=>$idTryout));
    }

    public function checkingAnswer($userAnswerList,$questionList,$correctAnswerList){
        foreach($questionList as $question){
            if(isset($userAnswerList[$question->nomor])){
                $correctAnswerList[$question->nomor]->isiJawaban = $userAnswerList[$question->nomor];
                $correctAnswerList[$question->nomor]->save();
            }
            else{
                if(Answer::model()->findAllByAttributes(array('idsoal'=>$question->id)) != null){
                    $correctAnswerList[$question->nomor]->delete();
                }
            }
        }
        $this->countingMark();
        $this->save();
    }

}

