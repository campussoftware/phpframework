<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreSetupschema
 *
 * @author venkatesh
 */
class Core_Modules_CoreDevelopmentsettings_Setup_V102_CoreNodeActions
{
    //put your code here
    function execute()
    {
        $setup=new Core_DataBase_Setup();   
        $setup->setTable("core_node_actions");
        if($setup->tableExists($setup->getTable()))
        {
            $setup->addColumnName(["name"=>"is_layout",
                "displayValue"=>"Is Layout",                
                "type"=>"tinyint",
                "size"=>"1",
                "after"=>"short_code"
                ]);
            $setup->alterTable();
        }
        
    }
}
