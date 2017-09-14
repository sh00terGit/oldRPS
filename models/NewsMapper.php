<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

Class NewsMapper extends Mapper {

    public function __construct() {
        parent::__construct();
    }

    /**
     *  function fetched news by page . LIMIT_VALUE = 5
     * @param $page   page id
     * @return array news objects
     */
    public function fetchByPageYear($page,$year ,$countPerPage =  LIMIT_VALUE ) {
        $query = "SELECT id,title,text,date FROM news WHERE year(date) =  '$year'  ORDER BY date DESC LIMIT " . $countPerPage . " OFFSET " . $countPerPage * ($page - 1);
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $news = array();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $nextNews = new NewsModel();
            $nextNews->setId($row['id'])
                    ->setDate($row['date'])
                    ->setText($row['text'])
                    ->setTitle($row['title']);
            $news[] = $nextNews;
        }
        return $news;
    }

    /**
     * function get count of news in DB
     * @return int count
     */
    public function getCountNews($year) {
        $query = "SELECT count(*) as countRows FROM news WHERE year(date) =  '$year'";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $row = mysql_fetch_assoc($result);
        $count = $row['countRows'];
        return $count;
    }

    /**
     * Saving news data by type operation. 
     * @param array $data  
     * @return int $id   
     */
    public function save($type, $text, $title, $id, $date) {
        switch ($type) {
            case 'update':
                $this->update($title, $text, $id, $date);
                return $id;
            case 'add':
                $id = $this->insert($title, $text, $date);
                return $id;
        }
    }

    /**
     * Create new data in DB
     * @param string $title 
     * @param string $text 
     * @return $id 
     */
    public function insert($title, $text, $date) {
//        $title = strip_tags($title);
//        $text = strip_tags($text);
//        $date = strip_tags($date);
        $query = "INSERT INTO news (title,text,date) VALUES ('$title','$text','$date')";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        return mysql_insert_id();
    }

    /**
     * Update data news in database
     * @param string $title
     * @param string $text 
     * @param int $id 
     * @return void
     */
    public function update($title, $text, $id, $date) {
//        $title = strip_tags($title);
//        $text = strip_tags($text);
//        $date = strip_tags($date);
        $query = "UPDATE news SET title ='$title' ,text = '$text', date='$date' WHERE id = $id";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
    }

    /**
     * Delete news by id from database
     * @param int $id
     */
    public function delete($id) {
        $query = "DELETE FROM news WHERE id = $id";
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
    public function fetchById($id) {
        $query = "SELECT id,title,text,date FROM news WHERE id =$id LIMIT 1";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $row = mysql_fetch_assoc($result);
        $nextNews = new NewsModel();
        $nextNews->setId($row['id'])
                ->setDate($row['date'])
                ->setText($row['text'])
                ->setTitle($row['title']);
        return $nextNews;
    }

    /**
     * Fetch all news by database 
     * @return array $news objects
     */
    public function fetchAll() {
        $query = "SELECT id,title,text,date FROM news ORDER by date DESC ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $news = array();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $nextNews = new NewsModel();
            $nextNews->setId($row['id'])
                    ->setDate($row['date'])
                    ->setText($row['text'])
                    ->setTitle($row['title']);
            $news[] = $nextNews;
        }
        return $news;
    }

    public function to_json(NewsModel $news) {
        return json_encode(array(
            "id" => $news->getId(),
            "title" => $news->getTitle(),
            "text" => $news->getText(),
            "date" => $news->getDate(),
            "image" => $news->getImageActive()
        ));
    }

}
