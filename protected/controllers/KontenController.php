<?php

class KontenController extends Controller
{
    public $layout ='//layouts/site';
	public function actionIndex($id)
	{
                $model = Konten::model()->findByAttributes(array('id'=>$id));
		$this->render('index',array('konten'=>$model));
	}

	        
        public function actionKategori($idcategory){                        
            $model = Konten::model()->findAllByAttributes(array('idcategory'=>$idcategory));
            $this->render('kontenList',array('model'=>$model));
        }
        
        public function actionSearch($keyword){              
            $model = Konten::search($keyword);
            $this->render('kontenList',array('model'=>$model));
        }
}