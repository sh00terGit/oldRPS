<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class ImageModel {
    
    public $id;
    public $path;
    public $newsId;
    public $fname;


    public function getId() {
        return $this->id;
    }

    public function getPath() {
        return $this->path;
    }

    public function getNewsId() {
        return $this->newsId;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setPath($name,$dir = "/public/images/news/data/") {
        if($name != NULL) {
            $this->setFname($name);
            $this->path = $dir . $this->getFname();
        }
        return $this;
    }

    public function setNewsId($newsId) {
        $this->newsId = $newsId;
        return $this;
    }
    
    public function getFname() {
        return $this->fname;
    }

    public function setFname($fname) {
        $this->fname = $fname;
        return $this;
    }




}