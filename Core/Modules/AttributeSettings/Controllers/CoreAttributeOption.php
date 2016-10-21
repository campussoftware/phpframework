<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreAttributeOption
 *
 * @author venkatesh
 */
class Core_Modules_AttributeSettings_Controllers_CoreAttributeOption extends Core_Controllers_NodeController
{
    //put your code here
    public function coreAttributeOptionNodeDataValidateBefore($errorsArray)
    {
        $requestedData=$this->_requestedData;
        if(Core::getValueFromArray($requestedData, 'attribute_code'))
        {
            $attribute_code=$requestedData['attribute_code'];
            $pattern = '/^[a-z_]+$/';
            if(!preg_match($pattern, $attribute_code))
            {
                $errorsArray['attribute_code']="Please Enter Characters (a-z) Only";
            }
        }
        return $errorsArray;
    }
}
