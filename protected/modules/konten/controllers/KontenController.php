<?php
/**  @var $model Konten*/
/**  @var $konten Konten*/

class KontenController extends Controller
{
    public $layout ='//layouts/site';
    private $pageSize = 8;
    
    public function actionIndex($id)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('id',$id);

        if(!Yii::app()->user->isAdmin()){
            $criteria->compare('isPublished',1);
        }
        
        $contentModel = Konten::model()->find($criteria);
        $this->render('index',array('contentModel'=>$contentModel));
    }

	        
    public function actionViewByCategory($idcategory){
        if(isset($_GET["search"])){
            $this->redirect(array('searchKonten','keyword'=>$_GET['keyword']));
        }
        $criteria=new CDbCriteria;
        $criteria->compare('idcategory',$idcategory);
        $criteria->compare('isPublished',1);
        
        $contentModelList = Konten::model()->findAll($criteria);
        $count = count($contentModelList);

        $pages = $this->setPage($criteria, $count, $this->pageSize);

        $categoryModel = ContentCategory::model()->findByPk($idcategory);
        $this->render('contentList',array('contentModelList'=>$contentModelList,'pages' => $pages,'title'=>$categoryModel->nama));
    }
        
    public function actionSearchKonten($keyword){
        $criteria=new CDbCriteria;
        $criteria->compare('isi',$keyword,true,"OR");
        $criteria->compare('judul',$keyword,true,"OR");
        $criteria->compare('isPublished','1');
        
        $contentModelList = Konten::model()->findAll($criteria);
        $count = count($contentModelList);
        
        $pages = $this->setPage($criteria, $count, $this->pageSize);
        
        $searchMessage = "";
        
        if(!sizeof($contentModelList)){
            $searchMessage = 'Tidak ada konten dengan isi ataupun judul yang mengandung kata "'.$keyword.'"';
        }
        $this->render('contentList',array('contentModelList'=>$contentModelList,'searchMessage'=>$searchMessage,'pages' => $pages,'title'=>'Hasil Pencarian'));
    }
    
    public function setPage($criteria, $count, $pagesize){
        $pages = new CPagination($count);
        $pages->pageSize = $pagesize;
        $pages->applyLimit($criteria);
        
        return $pages;
    }
}