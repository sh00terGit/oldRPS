<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

Class PageMapper extends Mapper {

    public function __construct() {
        parent::__construct();
    }


    /**
     * Fetched one object of news by id     * 
     * @param int $id
     * @return ArticleModel object
     */
    public function fetchByAction($controller,$action) {
        $controller = strtolower($controller);
        $action = strtolower($action);
        $query = "SELECT block,value,enabled FROM building WHERE controller ='".$controller."' and
                  action ='".$action."' ORDER BY block ASC";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
       $result = mysql_query($query);
        $page = new PageModel();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $page->setPagePart($row['block'], $row['value'],$row['enabled']);
        }       
        return $page->getPage();
    }
    
    
    
        public function fetchByTitle($title) {
        $query = "SELECT id,title,text,date FROM articles WHERE title ='".$title."' LIMIT 1";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $row = mysql_fetch_row($result, MYSQL_ASSOC);
        $nextNews = new ArticleModel();
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
        $query = "SELECT id,title,text,date FROM articles ORDER by date DESC ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $news = array();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            $nextNews = new ArticleModel();
            $nextNews->setId($row['id'])
                    ->setDate($row['date'])
                    ->setText($row['text'])
                    ->setTitle($row['title']);
            $news[] = $nextNews;
        }
        return $news;
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
        $query = "INSERT INTO articles (title,text,date) VALUES ('$title','$text','$date')";
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
        $query = "UPDATE articles SET title ='$title' ,text = '$text', date='$date' WHERE id = $id";
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
        $query = "DELETE FROM articles WHERE id = $id";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
    }



}
