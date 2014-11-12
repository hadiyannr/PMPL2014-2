<?php
/**  @var $model Konten*/
/**  @var $konten Konten*/

class KontenController extends Controller
{
    public $layout ='//layouts/site';
    private $pageSize = 9;
	public function actionIndex($id)
	{
        $criteria = new CDbCriteria();
        $criteria->compare('id',$id);

        if(!Yii::app()->user->isAdmin()){
            $criteria->compare('isPublished',1);
        }
        $contentModel = Konten::model()->find($criteria);
        $this->render('index',array('konten'=>$contentModel));
    }

	        
    public function actionKategori($idcategory){
        $criteria=new CDbCriteria;
        $criteria->compare('idcategory',$idcategory);
        $criteria->compare('isPublished',1);
        $count=Konten::model()->count($criteria);

        $pages=new CPagination($count);
        $pages->pageSize=$this->pageSize;
        $pages->applyLimit($criteria);

        $categoryModel = Kategori::model()->findByPk($idcategory);
        $contentModelList = Konten::model()->findAll($criteria);
        $this->render('kontenList',array('model'=>$contentModelList,'pages' => $pages,'title'=>$categoryModel->nama));
    }
        
    public function actionSearch($keyword){
        $criteria=new CDbCriteria;
        $criteria->compare('isi',$keyword,true,"OR");
        $criteria->compare('judul',$keyword,true,"OR");
        $criteria->compare('isPublished','1');
        $count=Konten::model()->count($criteria);


        $pages=new CPagination($count);
        $pages->pageSize=$this->pageSize;
        $pages->applyLimit($criteria);
        $model = Konten::model()->findAll($criteria);
        $searchMessage = "";
        if(!sizeof($model)){
            $searchMessage = 'Tidak ada konten dengan isi ataupun judul yang mengandung kata "'.$keyword.'"';
        }
        $this->render('kontenList',array('model'=>$model,'searchMessage'=>$searchMessage,'pages' => $pages,'title'=>'Hasil Pencarian'));
    }
}