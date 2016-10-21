<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setup
 *
 * @author venkatesh
 */
class Core_Attributes_Setup 
{
    protected  $_attributeName;
    protected  $_attributeCode;
    protected  $_attributeType;
    
    //put your code here
    public function addAttribute()
    {
        $dp = new Core_DataBase_ProcessQuery();
        $dp->setTable("core_attribute_option");
        $dp->addField("id");
        $dp->addWhere("attribute_code='" . $this->_attributeCode . "'");
        $dp->buildSelect();
        $existingRow = $dp->getRow();
        
        $dp = new Core_DataBase_ProcessQuery();
        $dp->setTable("core_attribute_option");
        $dp->addFieldArray(array("name"=>$this->_attributeName));
        $dp->addFieldArray(array("attribute_code"=>$this->_attributeCode));
        $dp->addFieldArray(array("core_root_attributes_id"=>$this->_attributeType));
        if(count($existingRow)>0)
        {
            $dp->addWhere("id='" . $existingRow['id'] . "'");
            $dp->buildUpdate();
        }
        else
        {
            $dp->buildInsert();
        }
        $recordId=$dp->executeQuery();
    }
    public function deleteAttribute()
    {
        
    }
}
