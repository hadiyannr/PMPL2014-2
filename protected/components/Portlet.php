<?php

class Portlet extends CWidget
{
    public $title; // the portlet title
    public $visible=true; // whether the portlet is visible
    // ...other properties...
 
    public function init()
    {
        if($this->visible)
        {
            // render the portlet starting frame
            // render the portlet title
        }
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
            // render the portlet ending frame
        }
    }
 
    protected function renderContent()
    {
        // child class should override this method
        // to render the actual body content
    }
}