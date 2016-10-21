<?php

class Core_Controllers_Frontend_IndexController extends Core_Pages_Render
{
    //put your code here
    
    public function indexAction()
    {
        $this->getLayout();
        $this->renderLayout();
    }
    public function  returnJsonResponse($output)
    {
        ob_clean();
        header('Content-Type: application/json');
        echo json_encode($output);      
    }
}
