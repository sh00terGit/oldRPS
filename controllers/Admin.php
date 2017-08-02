<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class Admin extends Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['auth'])) {
            header('HTTP/1.1 200 OK');
            header('Location: /auth/');
        }
    }

    
    /**
     * index page admin kit , default load editNews
     * 
     */
    public function index() {
        $this->view->render('admin/index');
    }

    
    /**
     * editNews page render content
     * @return view 
     */
    public function editNews() {      
        $this->view->currYear = date("Y");
        // from bootstrap
        if (($_SESSION['browser']['name'] == 'MSIE') and ((int)$_SESSION['browser']['version'] <= 9)) {  
            $template = 'admin/ie';  // template for ie 7-9:(
            $ie = true;   
        } else {    
            $template = 'admin/stable';  //template for normal browser
            $ie = false;
        }       
        $changeYear = new YearChange($year = date("Y") ,$page = 1 ,$template, $this->view ,$countPerPage = 30, $countYears = LIMIT_VALUE); 
        $changeYear->script($handler = '/admin/yearchange' , $ie);
        $changeYear->show($fullpage = false, $script = $changeYear->script);
    }

    

    /**
     * Service method used Ajax via XMLHttpRequest for editNews
     * @param  $_GET['year'] year
     * return not full render page
     */
    public function yearchange() {
         $changeYear = new YearChange($year = $_GET['year'] ,$page = 1 ,$template = 'admin/stableAjax', $this->view,$countPerPage = 30, $countYears = LIMIT_VALUE); 
         $changeYear->show($fullpage = false,'');
    }
    

    /**
     * Service method non view! Action use AJAX via XMLHttpRequest.
     * @param id news     
     * @return string news object
     */
    public function selectAjax() {
        if (isset($_GET['id'])) {
            $mapper = new NewsMapper();
            $news = $mapper->fetchById($_GET['id']);
            $news = $mapper->to_json($news);
            header("Content-Type: application/json;");
            echo $news;
        }
    }

    /**
     * Service method non view! Action use AJAX via XMLHttpRequest.
     * @param  id news
     * @return void
     */
    public function deleteAjax() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mapper = new NewsMapper();
            $news = $mapper->fetchById($id);
            $mapper->delete($id);


            $imageMapper = new ImageMapper();
            $uploaddir = "public/images/news/data/";

            //удаляем старые картинки на это число и записи к новости  этих картинок
            $imageMapper->delete($id);
            $fileFilter = "img_" . $id . '*.*';
            $lst = glob($uploaddir . $fileFilter);
            foreach ($lst as $filename) {
                @unlink($filename);
            }
        }
    }

    public function deleteImageAjax() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $imageMapper = new ImageMapper();
            $uploaddir = "public/images/news/data/";
            $image = $imageMapper->fetchById($id);
            //  удаляем старые картинки на это число и записи к новости  этих картинок
            $imageMapper->delete($id);
            $filename = $uploaddir . $image->getFname();
            if (unlink($filename)) {
                echo 'deleted';
            }
        }
    }

    /**
     * Service method non view! Action use AJAX via XMLHttpRequest.
     * @param $_POST array
     * @return id news
     */
    public function saveAjax() {
        $date = $_POST['date'];
        $type = $_POST['type'];
        $text = $_POST['text'];
        $title = $_POST['title'];
        $id = $_POST['id'];

        $mapper = new NewsMapper();
        $id = $mapper->save($type, $text, $title, $id, $date);

        function getExtension($str) {
            $i = strrpos($str, ".");
            if (!$i) {
                return "";
            }
            $l = strlen($str) - $i;
            $ext = substr($str, $i + 1, $l);
            return $ext;
        }

        $imageMapper = new ImageMapper();
        $uploaddir = "public/images/news/data/";

        $valid_formats = array("jpg", "png", "gif", "bmp", "jpeg");


        if (($_FILES['file']['name'][0] != null) and $_SERVER['REQUEST_METHOD'] == "POST") {

            $imageResizer = new ImageResize();             




            foreach ($_FILES['file']['name'] as $name => $value) {

                $filename = stripslashes($_FILES['file']['name'][$name]);

                $size = filesize($_FILES['file']['tmp_name'][$name]);
                $ext = getExtension($filename);
                $ext = strtolower($ext);

                if (in_array($ext, $valid_formats)) {

                    //img_20170607_03

                    $image_name = "img_" . $id . "_" . rand() . ".$ext ";
                    $newname = $uploaddir . $image_name;

                    if (move_uploaded_file(($_FILES['file']['tmp_name'][$name]), $newname)) {
                        $imageResizer->smart_resize_image(null, file_get_contents($newname), 1024, 0, true, $newname, false, false, 70);
                        $imageMapper->insert($id, $image_name);
                    }
                }
            }
        }
       if (($_SESSION['browser']['name'] == 'MSIE') and ((int)$_SESSION['browser']['version'] <= 9)) {  
        

            header('HTTP/1.1 200 OK');
            header('Location: /admin/');
        } else {
            $mapper = new NewsMapper();
            $news = $mapper->fetchByPageYear(1, date('Y', strtotime($date)), 30);
            $this->view->news = $news;
            $this->view->render('admin/stableAjax', false);
        }
    }



}
