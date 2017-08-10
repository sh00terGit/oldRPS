<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

Class PageModel {


    public $controller;
    public $action;
    public $page;

 
    public function __construct() {
        $this->page = array();
    }


    public function getPage() {
        return $this->page;
    }




    public function setPagePart($block,$value,$enabled) {
        $this->page []=  array("block"=> "$block", "value"=>"$value", "enabled"=>"$enabled");
        return $this;
    }


}