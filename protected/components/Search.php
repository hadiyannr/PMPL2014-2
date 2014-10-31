<?php
class Search extends Portlet
{
    public $title='Login';
 
    protected function renderContent()
    {                
        if(isset($_POST['keyword']))
        {            
            $this->owner->redirect(array('konten/konten/search','keyword'=>$_POST['keyword']));
        }
        
        $this->render('search');
    }
}