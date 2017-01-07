<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreClass
 *
 * @author ramesh
 */
class CoreClass 
{
    static public $node=NULL;
    
    static function getController($node,$module=NULL,$action=NULL,$actionSourceFrom=NULL)
    {
        $cc = new \CoreClass();
        $wp=$cc->getObject("\Core\WebsiteSettings");
        $className="\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)))."\'".str_replace(" ","",ucwords(str_replace("_", " ",$action)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Core\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        else
        {
            return new \Core\Controllers\NodeController($node,$action);
        }        
        
    }
    static function getModel($node,$action=NULL)
    {
        if($node=="")
        {
            return false;
        }
        $np=new \Core\Model\RameshAbstract();
        $np->setNodeName($node);
        $module=$np->_currentNodeModule;
        $className="\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Models"."\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));       
        //Core::Log($className,"models.log");
        $className=  str_replace("'", "", $className);
        if(Core::fileExists(str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Core\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Models"."\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));       
        //Core::Log($className,"models.log");
        $className=  str_replace("'", "", $className);
        if(Core::fileExists(str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        else
        {
            return new \Core\Model\Node($node,$action);
        }        
        
    }
    static function getHelper($moduleName=NULL,$helperNode="Data")
    {
        $cc = new \CoreClass();
        $wp=$cc->getObject("\Core\WebsiteSettings");        
	if($moduleName==NULL)
	{
		return new Core_Helper_Data();
	}
        else
	{
		$className="\Modules\'".$moduleName."\Helper\'".$helperNode;
                $className=  str_replace("'", "", $className);
		if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
		{
			return new $className();
		}
		else
		{           
			return new Core_Helper_Data();
		}  
	}			
        
    }
    static function getMethod($object,$action,$node=NULL,$FieldName=NULL)
    {        
        if($node=="")
        {
            return false;
        }
        $methodName=lcfirst(str_replace(" ","",ucwords(str_replace("_", " ",$node))).str_replace(" ","",ucwords(str_replace("_", " ",$FieldName))).ucwords($action));
        if(Core::methodExists($object, $methodName))
        {
            return   $methodName;
        }
        $methodName=lcfirst(str_replace(" ","",ucwords(str_replace("_", " ",$node))).ucwords($action));
       
        if(Core::methodExists($object, $methodName))
        {
            return  $methodName;
        }
        return false;
    }
    static function getFrontController($node,$module=NULL,$action=NULL)
    {
        $cc = new \CoreClass();
        $wp=$cc->getObject("\Core\WebsiteSettings");
        $className="\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\Frontend_".str_replace(" ","",ucwords(str_replace("_", " ",$node)))."\'".str_replace(" ","",ucwords(str_replace("_", " ",$action)));
        $className=  str_replace("'", "", $className);
        $wp->documentRoot.str_replace("_","/",$className).".php";
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\Frontend\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Core\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\Frontend\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        else
        {
           return new \Core\Controllers\Frontend\IndexController($node,$action);
        }
    }
    static function getApiController($node,$module=NULL,$action=NULL)
    {
        $cc = new \CoreClass();
        $wp=$cc->getObject("\Core\WebsiteSettings");
        $className="\Modules_".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\'"."Api\'".str_replace(" ","",ucwords(str_replace("_", " ",$node))."\'".str_replace(" ","",ucwords(str_replace("_", " ",$action))));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\Api\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        $className="\Core\Modules\'".str_replace(" ","",ucwords(str_replace("_", " ",$module)))."\Controllers"."\Api\'".str_replace(" ","",ucwords(str_replace("_", " ",$node)));
        $className=  str_replace("'", "", $className);
        if(Core::fileExists($wp->documentRoot.str_replace("_","/",$className).".php"))
        {
            return new $className($node,$action);
        }
        else
        {
           return new \Core\Controllers\Api\IndexController($node,$action);
        }
    }
    static  function getObject($className,$construcParams=NULL)
    {
        return new $className($construcParams);
    }
        
    //put your code here
}
