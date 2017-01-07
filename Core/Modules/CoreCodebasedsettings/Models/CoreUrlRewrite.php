<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreUrlRewrite
 *
 * @author venkatesh
 */
namespace Core\Modules\CoreCodebasedsettings\Models;
use Core\Model\Node;
class CoreUrlRewrite extends Node {
    //put your code here
    protected $coreRegisternodeId;   
    protected $primaryId;
    protected $requestPath;
    protected $targetPath;
    protected $description;
    protected $isAutogenerated;
    protected $metadata;
    protected $_existingRecord;
    protected $_currentValue;
    
    public function setCoreRegisternodeId($coreRegisternodeId)
    {
        $this->coreRegisternodeId=$coreRegisternodeId;
        return $this;
    }
    public function setPrimaryId($primaryId)
    {
        $this->primaryId=$primaryId;
        return $this;
    }
    public function setRequestPath($requestPath)
    {
        $this->requestPath=\Core::convertStringToUrlSlug($requestPath).".html";
        return $this;
    }
    public function setTargetPath($targetPath)
    {
        $this->targetPath=$targetPath;
        return $this;
    }
    public function setDescription($description)
    {
        $this->primaryId=$description;
        return $this;
    }
    public function setIsAutogenerated($isAutogenerated)
    {
        $this->isAutogenerated=$isAutogenerated;
        return $this;
    }
    public function setMetadata($metadata)
    {
        $this->metadata=$metadata;
        return $this;
    }
    public function setCurrentValue($currentValue)
    {
        $this->_currentValue=$currentValue;
        return $this;
    }
    public function getCoreRegisternodeId()
    {
        return $this->coreRegisternodeId;        
    }
    public function getPrimaryId()
    {
        return $this->primaryId;
    }
    public function getRequestPath()
    {
        return $this->requestPath;
    }
    public function getTargetPath()
    {
        return $this->targetPath;
    }
    public function getDescription()
    {
        return $this->primaryId;
    }
    public function getIsAutogenerated()
    {
        return $this->isAutogenerated;
    }
    public function getMetadata()
    {
        return $this->metadata;
    }
    public function dataSave()
    {
        $this->requestPathExist();
        $nodeSave=new \Core\Model\NodeSave();
        $nodeSave->setNode($this->_nodeName);
        if(\Core::keyInArray("id", $this->_existingRecord))
        {
            $nodeSave->setData("id", $this->_existingRecord['id']);
        }
        else 
        {
            if($this->_currentValue)
            {
                $nodeSave->setData("id", $this->_currentValue);
            }
        }
        $nodeSave->setData("request_path", $this->getRequestPath());
        $nodeSave->setData("target_path", $this->getTargetPath());
        $nodeSave->setData("metadata", $this->getMetadata());
        $nodeSave->setData("is_autogenerated", $this->getIsAutogenerated());   
        $nodeSave->setData("description", $this->getDescription());
        $nodeSave->setData("primary_id", $this->getPrimaryId());
        $nodeSave->setData("core_registernode_id", $this->getCoreRegisternodeId());        
        $nodeSave->save();
    }
    public function requestPathExist()
    {
        $this->_existingRecord=$this->loadByField($this->getRequestPath(),"request_path");        
    }
      
}