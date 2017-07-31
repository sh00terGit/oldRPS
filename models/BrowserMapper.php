<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

Class BrowserMapper extends Mapper {

    public function __construct() {
        parent::__construct();
    }


    public function save($platform, $browser, $version) {
        $query = "INSERT INTO browsers (platform,browser,version,view) VALUES ('$platform','$browser','$version',1) 
ON DUPLICATE KEY UPDATE view =view+1, date = now()";

        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        return mysql_insert_id();
    }

    
    //platform , view , percent
    public function fetchPercentPlatforms() {
        $query = "SELECT platform,SUM(view) as view ,ROUND( (SELECT SUM(view) from browsers br WHERE br.platform = browsers.platform) /(SELECT SUM(view) FROM browsers)*100,0) AS percent FROM browsers GROUP BY `platform`";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
        $platformPercent = array();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);               
            $bp = new stdClass();
            $bp->platform= $row['platform'];
            $bp->view = $row['view'];
            $bp->percent = $row['percent'];
            $platformPercent[] = $bp;
        }
        return $platformPercent;
        
    }

    public function fetchPercentBrowsers() {
        $query = "SELECT CONCAT(browser,' ver ',version) as browser,view,ROUND(view/(SELECT SUM(view) FROM browsers)*100,0) AS percent FROM browsers ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());        
            
        }
        $browserPercent = array();
        for ($i = 0; $i < mysql_num_rows($result); $i++) {
            $row = mysql_fetch_array($result, MYSQL_ASSOC);               
            $bp = new stdClass();
            $bp->browser= $row['browser'];
            $bp->view = $row['view'];
            $bp->percent = $row['percent'];
            $browserPercent[] = $bp;
        }
        return $browserPercent;
        
    }

    //  SELECT DAY(`date`),platform,SUM(view) FROM browsers GROUP BY DAY(`date`),platform

    /**
     * Delete news by id from database
     * @param int $id
     */
    public function delete() {
        $query = "DELETE FROM browsers ";
        $result = mysql_query($query);
        if (!$result) {
            exit(mysql_error());
        }
    }

}
