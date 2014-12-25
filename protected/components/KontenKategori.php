<?php
class KontenKategori extends Portlet
{
    public $title='Konten Kategori';
 
    protected function renderContent()
    {        
        $model = KategoriKonten::model()->findAll();
        $this->render('kontenKategori',array('model'=>$model));
    }
}