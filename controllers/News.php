<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class News extends Controller {

    private $page;

    public function __construct() {
        parent::__construct();
        $this->getPage();
    }


    
        public function index() {
        //выводим страничку согласно выбранному году и странице 
        if (($_SESSION['browser']['name'] == 'MSIE') and ((int)$_SESSION['browser']['version'] <= 9)) {  
            //если ие <=9 , то скрипт без blockUI            
          $ie = true;          
        } else {
          $ie =false;
        }    
        $currYear= date("Y");    
        $this->view->description = "Новости Гомельскоего отделения БЖД"; 
        $this->view->title = $this->view->description;
        $changeYear = new YearChange($year = $currYear,$page = $this->page ,$template = 'news/index', $this->view);
        $changeYear->script($handler = '/news/viewNewsByYear',$ie);
        $changeYear->show($fullpage = true, $script = $changeYear->script, $this->view);
    }
    
  
        public function viewNewsByYear() {        
        $changeYear = new YearChange( $_GET['year'], 1 ,'news/NewsByYear', $this->view);
        $changeYear->show($fullpage = false , $script = false);

        
    }

    /**
     * Action render content by news and list of comments related to this news.
     */
    public function view($id) {
        
        $newsMapper = new NewsMapper();
        $news =  $newsMapper->fetchById($id);
        $commentMapper = new CommentsMapper();
        $this->view->comments = $commentMapper->fetchByNewsId($id);
        $this->view->title = $news->getTitle();
        $this->view->description = $news->getShortText();
        $this->view->news = $news;
        $this->view->render('news/view');
    }

    /**
     * Service function for adding comments (addition AJAX via XMLHttpRequest)
     */
    public function commentAjax() {
        if ($_POST) {
            $commentMapper = new CommentsMapper();
            $commentMapper->insert($_POST['newsId'], $_POST['text']);
        }
    }

    /**
     * Service method getting page number by GET-string
     * @param $_GET['page']
     */
    public function getPage() {
        $this->page = (empty($_GET['page']) ? 1 : intval($_GET['page']));
    }

}
