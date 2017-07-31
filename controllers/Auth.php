<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class Auth extends Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Render error page
     */
    public function index() {
        if ($_POST) {
            $login = $_POST['login'];
            $pass = $_POST['password'];
            if ($login == 'admin' && $pass == 'admin') {
                $_SESSION['auth'] = true;
                header('HTTP/1.1 200 OK');
                header('Location: /admin/');
            }
        }
        
//    if (($_SESSION['browser']['name'] == 'MSIE') and ((int)$_SESSION['browser']['version'] < 9)) {  
       if (($_SESSION['browser']['name'] == 'MSIE')) {  
        $this->view->render('auth/auth_ie');
       } else {
          $this->view->render('auth/auth_stable'); 
       }
    }

}
