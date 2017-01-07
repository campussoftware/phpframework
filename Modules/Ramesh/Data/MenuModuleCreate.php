<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreActionType
 *
 * @author ramesh
 */
namespace Modules\Ramesh\Data;
class MenuModuleCreate
{
    //put your code here
    public function execute()
    {
        try
        {            
            $registerController=\CoreClass::getController("core_registernode", "core_developmentsettings");
            $registerController->setNodeFileName("Ramesh");
            $registerController->setNodeNameData("ramesh");
            $registerController->setDisplayValue("Ramesh");
            $registerController->setIsModule("1");
            $registerController->setSortValue("60");
            $registerController->setIcon("");
            $registerController->setMenu("1");
            $registerController->setIsNotification("0");
            $registerController->dataSave();
            
            $registerController=\CoreClass::getController("core_registernode", "core_developmentsettings");
            $registerController->setNodeFileName("Menu");
            $registerController->setNodeNameData("ramesh_menu_module");
            $registerController->setDisplayValue("Menu");
            $registerController->setIsModule("1");
            $registerController->getRootModuleId("ramesh");
            $registerController->setSortValue("60");
            $registerController->setIcon("");
            $registerController->setMenu("1");
            $registerController->setIsNotification("0");
            $registerController->dataSave();
        }
        catch (\Exception $ex)
        {
            \Core::Log($ex->getMessage(),"installdataexception.log");
        }
    }
}
