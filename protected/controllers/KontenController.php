<?php
/**  @var $model Konten*/
/**  @var $konten Konten*/

class KontenController extends Controller
{
    public $layout ='//layouts/site';
	public function actionIndex($id)
	{
        $criteria = new CDbCriteria();
        $criteria->compare('id',$id);

        if(!Yii::app()->user->isAdmin()){
            $criteria->compare('isPublished',1);
        }
        $model = Konten::model()->find($criteria);
        $this->render('index',array('konten'=>$model));
    }

	        
        public function actionKategori($idcategory){                        
            $model = Konten::model()->findAllByAttributes(array('idcategory'=>$idcategory,'isPublished'=>1));
            $this->render('kontenList',array('model'=>$model));
        }
        
        public function actionSearch($keyword){              
            $model = Konten::search($keyword);
            $searchMessage = "";
            if(!sizeof($model)){
                $searchMessage = 'Tidak ada konten dengan isi ataupun judul yang mengandung kata "'.$keyword.'"';
            }
            $this->render('kontenList',array('model'=>$model,'searchMessage'=>$searchMessage));
        }
}