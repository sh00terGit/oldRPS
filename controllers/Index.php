<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class Index extends Controller {

    public function __construct() {
        parent::__construct();
        $this->view->description = 'Райпрофсож Гомель';
    }


    public function index() {        
        $mapper = new NewsMapper();
        $news = $mapper->fetchByPageYear(1,date('Y'));
        $this->view->news = $news;
        $this->view->render('index/index');
    }
    
   /**
    * Деятельность -->Направления
    */ 
   public function dirwork() {
       $this->view->description = 'Направления деятельности РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $mapper = new ArticleMapper();
       $this->view->article = $mapper->fetchByTitle('Направления деятельности');
        $this->view->render('index/article');
    }
   
  /**
    * Деятельность --> Задачи
    */   
    
   public function taskwork() {
        $this->view->description = 'Задачи перед РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $mapper = new ArticleMapper();
       $this->view->article = $mapper->fetchByTitle('Основные задачи');
        $this->view->render('index/article');
    } 
    
    
      /**
    * Деятельность --> Оздоровление
    */   
    
   public function healthwork() {
        $this->view->description = 'Оздоровление с  РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
       $mapper = new ArticleMapper();
       $this->view->article = $mapper->fetchByTitle('Оздоровление');
        $this->view->render('index/article');
    } 

    
        
      /**
    * Фотогалерея --> Инфо
    */   
    
   public function infoday() {
        $this->view->description = 'Информационный день РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $mapper = new ArticleMapper();
       $this->view->article = $mapper->fetchByTitle('Информационный день');
        $this->view->render('index/article');
    } 

      /**
    * Фотогалерея --> Спартакиада
    */   
    
   public function photosport() {
        $this->view->description = 'Спортакиады с  РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $mapper = new ArticleMapper();
       $this->view->article = $mapper->fetchByTitle('Спортакиады');
        $this->view->render('index/article');
    } 


    public function contacts(){
         $this->view->description = 'Контакты РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
       $mapper = new ArticleMapper();
       $this->view->article = $mapper->fetchByTitle('Контакты');
        $this->view->render('index/article');
    }
    
    
}
