<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class ImageMapper extends Mapper {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Create new data in DB
     * @param int $newsId 
     * @param string $path 
     * @return $id 
     */
    public function insert($newsId, $path) {
        $newsId = strip_tags($newsId);
        $path = strip_tags($path);
        $query = "INSERT INTO news_img (news_id, path) VALUES ('$newsId','$path')";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        return mysql_insert_id();
    }

    public function update($array) {
        
    }

    public function delete($id) {
        $id = strip_tags($id);
        $query = "DELETE FROM news_img WHERE id= $id";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
    }

    /**
     * Fetched one object of news by id     * 
     * @param int $id
     * @return NewsModel object
     */
    public function fetchByNewsId($id) {
        $query = "SELECT id,news_id,path FROM news_img WHERE news_id =$id  ORDER BY id ASC ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $images = array();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {            
            $row = mysql_fetch_array($result, MYSQL_ASSOC);            
            $image = new ImageModel();
            $image->setId($row['id'])
                    ->setNewsId($row['news_id'])
                    ->setPath($row['path']);
            $images[] = $image;
        }
        return $images;
    }
    
    
    public function fetchById($id){
        $query = "SELECT id,news_id,path FROM news_img WHERE id =$id  LIMIT 1 ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $row = mysql_fetch_assoc($result);
        $image = new ImageModel();
        $image->setId($row['id'])
                ->setNewsId($row['news_id'])
                ->setPath($row['path']);
        return $image;
    }

}
