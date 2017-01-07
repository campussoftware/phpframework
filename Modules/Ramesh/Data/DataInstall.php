<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataInstall
 *
 * @author ramesh
 */
namespace Modules\Ramesh\Data;
class DataInstall 
{
    //put your code here
    function __construct() 
    {
        $this->setDataUp();
    }
    protected function setDataUp()
    {
        $nodesArray=array(
            "MenuModuleCreate"=>"MenuModuleCreate",
            "Menu"=>"Menu",  			  			
            
        );
        foreach ($nodesArray as $node) 
        {
            $nodeClass="\Modules\Ramesh\Data\'".$node;
            $nodeClass=str_replace("'","",$nodeClass);
            $rnode=new $nodeClass();
            $rnode->execute();
        } 
        
    }
}
