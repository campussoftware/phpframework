<?php

class Core_Controllers_Api_IndexController extends Core_Controllers_NodeController
{
    //put your code here
    
    public function indexAction()
    {
        $output['status']="error";
        $output['data']="";
        $output['message']="No Request is Found";
        $this->returnJsonResponse($output);
    }
    public function  returnJsonResponse($output)
    {
        ob_clean();
        header('Content-Type: application/json');
        echo json_encode($output);      
    }
}