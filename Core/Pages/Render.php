<?php
namespace Core\Pages;
use \Core\Model\Node;
class Render extends Node
{
    public $_layout;
    
    function __construct() 
    {
        parent::__construct();
    }
    public function getAdminLayout()
    {        
        global $rootObj;
        $wp=$rootObj;        
        $layout="";        
        $flag=0;
        $module=\Core::convertStringToFileName($this->_currentNodeModule);
        $node=\Core::convertStringToFileName($this->_nodeName);
        $layout=$wp->documentRoot."pages/adminhtml/".$wp->themeName."/layout/".$module."/".$node."_".$this->_currentAction.".xml";
        if(\Core::fileExists($layout))
        {
            $flag=1;
        }
        else 
        {
            if($this->_nodeName && $flag==0)
            {
                $layout=$wp->documentRoot."pages/adminhtml/".$wp->themeName."/layout/"."CoreActions"."/".$this->_currentAction.".xml";
                if(\Core::fileExists($layout))
                {
                    $flag=1;
                }
            }
        }
        if($flag==0)
        {
            $layout=$wp->documentRoot."pages/adminhtml/".$wp->themeName."/layout/".$module."/".$node.".xml";
            if(\Core::fileExists($layout))
            {
                $flag=1;
            }
        }
        if($flag==0)
        {
            if($this->_nodeName)
            {
                $layout=$wp->documentRoot."pages/adminhtml/".$wp->themeName."/layout/404.xml";
            }
            else
            {
                $layout=$wp->documentRoot."pages/adminhtml/".$wp->themeName."/layout/home.xml";
            }            
        }
        $this->_layout=$layout; 
        
       
    }
    public function getLayout()
    {
        
        $layout="";
        global $rootObj;
        $wp=$rootObj; 
        $flag=0;
        
        $layout=$wp->documentRoot."pages/frontend/".$wp->themeName."/layout/".$this->_nodeName."_".$this->_currentAction.".xml";
        if(\Core::fileExists($layout))
        {
            $flag=1;
        }
        if($flag==0)
        {
            $layout=$wp->documentRoot."pages/frontend/".$wp->themeName."/layout/".$this->_nodeName.".xml";
            if(\Core::fileExists($layout))
            {
                $flag=1;
            }
        }
        if($flag==0)
        {
            $layout=$wp->documentRoot."pages/frontend/".$wp->themeName."/layout/default.xml";
        }
        $this->_layout=$layout;
    } 
    public function renderLayout()
    {
        $fileContent=\Core::getFileContent($this->_layout);        
        if($fileContent)
        {
            $blockSettings = \Core::convertXmlToArray($fileContent);  
            if(\Core::keyInArray("body", $blockSettings))  
            {
                $blockSettings=$blockSettings['body'];
            }
            if(\Core::countArray($blockSettings)>0)
            {
                foreach ($blockSettings as $tagType=>$blockData)
                {
                    if(\Core::countArray($blockData)>0)
                    {
		    	if(\Core::keyInArray('@attributes', $blockData))
			{
				$blockData=array($blockData);
			}
			foreach ($blockData as $blockProperties)
                        {
                            if(\Core::countArray($blockProperties)>0)
                            {                                
                                $parentBlockHasTemplate=1;                                
                                
                                if(\Core::keyInArray('@attributes', $blockProperties))
                                {                                    
                                    $blockConfigData=$blockProperties['@attributes'];
                                    $class=$blockConfigData['class'];
                                    $blockTemplate=$blockConfigData['template'];
                                    if($blockTemplate=="")
                                    {
                                        $parentBlockHasTemplate=0;
                                    }                                   
                                    if($class)
                                    {                                        
                                        try
                                        {
                                            
                                            $block=new $class($this);   
                                            $block->setLayout($this->_layout);
                                            $block->setBlockName($blockConfigData['name']);
                                            $block->setTemplate($blockConfigData['template']);
                                            $block->execute();
                                            if($parentBlockHasTemplate==0)
                                            {                                                 
                                                $block->loadChildBlock();
                                            }
                                        }
                                        catch (Exception $ex)
                                        {
                                           echo $ex->getMessage();
                                        }
                                    }                                        
                                    
                                }                                
                                
                            }
                        }
                    }
                }
            }
        }
    }   
}