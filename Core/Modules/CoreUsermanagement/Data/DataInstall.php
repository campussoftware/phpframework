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
class Core_Modules_CoreUsermanagement_Data_DataInstall 
{
    //put your code here
    function __construct() 
    {
        $this->setDataUp();
    }
    protected function setDataUp()
    {
        $nodesArray=array(
            "CoreModuleCreate"=>"CoreModuleCreate",
            "CoreAccess"=>"CoreAccess",
            "CoreLoginhistory"=>"CoreLoginhistory",
            "CoreProfile"=>"CoreProfile",
            "CoreProfileLevel"=>"CoreProfileLevel",
            "CoreUsers"=>"CoreUsers",
            
        );
        foreach ($nodesArray as $node) 
        {
            $nodeClass="Core_Modules_CoreUsermanagement_Data_".$node;
            $rnode=new $nodeClass();
            $rnode->execute();
        } 
        
    }
}
