<?php
class KontenKategori extends Portlet
{
    public $title='Konten Kategori';
 
    protected function renderContent()
    {        
        $model = Kategori::model()->findAll();
        $this->render('kontenKategori',array('model'=>$model));
    }
}