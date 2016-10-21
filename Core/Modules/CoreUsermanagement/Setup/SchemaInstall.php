<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchemaInstall
 *
 * @author ramesh
 */
class Core_Modules_CoreUsermanagement_Setup_SchemaInstall
{
    //put your code here
    function __construct() 
    {
        $this->setUp();
    }
    protected function setUp()
    {
        $nodesArray=array(            
            //User Management
            "CoreAccess"=>"CoreAccess",
            "CoreProfileLevel"=>"CoreProfileLevel",
            "CoreProfile"=>"CoreProfile",
            "CoreUsers"=>"CoreUsers",
            "CoreLoginhistory"=>"CoreLoginhistory",
            "CoreUseronline"=>"CoreUseronline",
            "CoreWebsiteloginhistory"=>"CoreWebsiteloginhistory",
            "CoreWebsiteusers"=>"CoreWebsiteusers",
        );
        foreach ($nodesArray as $node) 
        {
            $nodeClass="Core_Modules_CoreUsermanagement_Setup_".$node;
            $rnode=new $nodeClass();
            $rnode->execute();
        }               
    }
}
