<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class Stat extends Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['auth'])) {
            header('HTTP/1.1 200 OK');
            header('Location: /auth');
        }
    }

    /**
     * Render error page
     */
    public function index() {        
        $mapper = new BrowserMapper();
        $browserPercent = $mapper->fetchPercentBrowsers();
        $platformPercent = $mapper->fetchPercentPlatforms();
        $this->view->browsers = $browserPercent;
        $this->view->platforms = $platformPercent;
        $this->view->render('stat/index');
    }
    
    public function delete() {
        $mapper = new BrowserMapper();
        $mapper->delete();
        header('HTTP/1.1 200 OK');
        header('Location: /admin/');
    }

}
