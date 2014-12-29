<?php

/**
 * This is the model class for table "soal".
 *
 * The followings are the available columns in table 'soal':
 * @property integer $id
 * @property integer $idtryout
 * @property string $pertanyaan
 * @property integer $nomor
 * @property integer $isHasJawaban
 *
 * The followings are the available model relations:
 * @property Answer[] $jawabans
 * @property Option[] $opsis
 * @property Tryout $idtryout0
 */
class Question extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'soal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtryout, pertanyaan, nomor', 'required'),
			array('idtryout, nomor, isHasJawaban', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idtryout, pertanyaan, nomor, isHasJawaban', 'safe', 'on'=>'search'),

                         array('idtryout+nomor+isHasJawaban', 'application.extensions.uniqueMultiColumnValidator'),
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
			'jawabans' => array(self::HAS_MANY, 'Question', 'idsoal'),
			'opsis' => array(self::HAS_MANY, 'Option', 'idsoal'),
			'idtryout0' => array(self::BELONGS_TO, 'Tryout', 'idtryout'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idtryout' => 'Idtryout',
			'pertanyaan' => 'Pertanyaan',
			'nomor' => 'Nomor',
            'isHasJawaban' => 'Soal Berjawaban',
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
		$criteria->compare('idtryout',$this->idtryout);
		$criteria->compare('pertanyaan',$this->pertanyaan,true);
		$criteria->compare('nomor',$this->nomor);
        $criteria->compare('isHasJawaban',$this->isHasJawaban);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
//        public static function isComplete($id){
//            return sizeof(Soal::model()->findByPk($id)->opsis)>0;
//        }
        
        public function getHtmlAdminOption(){
            $options = $this->opsis;
            $htmlOption = '';
            foreach($options as $option){
                $htmlOption .= $option->pernyataan.'<br>';
            }
            return $htmlOption;
        }

    public static function getQuestion($idTryout){
        $criteria = new CDbCriteria();
        $criteria->order = "nomor ASC,isHasJawaban ASC";
        $questionList = Question::model()->findAllByAttributes(array('idtryout' => $idTryout),$criteria);
        return $questionList;
    }

    public static function saveQuestion($questionModel,$questions,$options,$optionModelList){
        $questionModel->attributes = $questions;
        $transaction = Yii::app()->db->beginTransaction();
        try {
            if ($questionModel->validate() && $questionModel->save()){
                for ($i = 0; $i < 5; $i++) {
                    Question::saveOptions($optionModelList,$options,$questionModel, $i);
                }
            }else{
                throw new Exception("Soal rollback");
            }
            $transaction->commit();
            return true;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

    public static function saveOptions($optionModelList,$options,$questionModel, $i){
        $optionModelList[$i]->attributes = $options[$i];
        $optionModelList[$i]->idsoal = $questionModel->id;
        if($options['jawaban'] == $i){
            $optionModelList[$i]->isJawaban = 1;
        }else{
            $optionModelList[$i]->isJawaban = 0;
        }

        if(!($optionModelList[$i]->validate() && $optionModelList[$i]->save())){
            throw new Exception("Opsi rollback");
        }
    }
}
