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
    
   /**    public function index() {
        $this->view->render('index/index');
    }
    * Деятельность -->Направления
    */ 
   public function dirwork() {
       $this->view->description = 'Направления деятельности РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $this->view->render('index/dirwork');
    }
   
  /**
    * Деятельность --> Задачи
    */   
    
   public function taskwork() {
        $this->view->description = 'Задачи перед РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $this->view->render('index/taskwork');
    } 
    
    
      /**
    * Деятельность --> Оздоровление
    */   
    
   public function healthwork() {
        $this->view->description = 'Оздоровление с  РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $this->view->render('index/healthwork');
    } 

    
        
      /**
    * Фотогалерея --> Инфо
    */   
    
   public function infoday() {
        $this->view->description = 'Информационный день РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $this->view->render('index/infoday');
    } 

      /**
    * Фотогалерея --> Спартакиада
    */   
    
   public function photosport() {
        $this->view->description = 'Спортакиады с  РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $this->view->render('index/photosport');
    } 


    public function contacts(){
         $this->view->description = 'Контакты РАЙПРОФСОЖ';
       $this->view->title = $this->view->description;
        $this->view->render('index/contacts');
    }
    
    
}
