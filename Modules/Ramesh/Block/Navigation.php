<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Navigation
 *
 * @author Venkatesh
 */
namespace Modules\Ramesh\Block;
use \Core\Block\Block;
class Navigation extends Block {
    //put your code here
    public function getMenuDetails()
    {
        $menu=\CoreClass::getObject("\Core\Model\TreeNode");
        $menu->setNodeName("ramesh_menu");
        $menu->addFilter("ramesh_menu.is_active");
        return $menu->getTreeRecords();
    }
}
