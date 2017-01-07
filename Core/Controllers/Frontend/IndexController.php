<?php
namespace Core\Controllers\Frontend;
use \Core\Pages\Render;
class IndexController extends Render
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
