<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Command
 *
 * @author venkatesh
 */
namespace Core;
class Command {

    //put your code here
    public $_inputArguments;
    public $wp;

    public function setInputParameters($inputParameters) {
        $this->_inputArguments = $inputParameters;
        $this->wp = new Core_WebsiteSettings();
    }

    public function execute() {
        switch (strtolower($this->_inputArguments[1])) {
            case "cache":
                \Core::delTree($this->wp->documentRoot . "Var/" . $this->wp->identity);
                \Core::checkCache();

                break;
            default :
                echo "No Commands Found";
                break;
        }
    }

}
