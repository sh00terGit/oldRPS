<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

Class ArticleModel {

    public $id;
    public $title;
    public $text;
    public $date;
    public $shortText;  // full text trimmed to 200 char value 
    public $img_id;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setText($text) {
        $this->text = $text;
        $this->setShortText($text);
        return $this;
    }

    public function setShortText($text) {
        $this->shortText = $this->my_substr($text);
//        $this->shortText = mb_substr($text, 0, 200, 'UTF-8');
        return $this;
    }

    public function getShortText() {
        return $this->shortText;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    //выдаем список файлов, если нету выводим картинку "нет картинки"
    function getImage() {
        $mapper = new ImageMapper($type='menu');
        $images = $mapper->fetchByNewsId($this->getId());
        if ($images == NULL) {
            $image = new ImageModel();
            $image->setPath('none.jpg')->setNewsId($this->getId())->setId(1);
            $images [] = $image;
        }
        return $images;
    }

    //выдаём список файлов
    function getImageActive() {
        $mapper = new ImageMapper($type='menu');
        $images = $mapper->fetchByNewsId($this->getId());

        return $images;
    }

    //выбираем случайную картинку
    function getRandomImage() {
        $images = $this->getImage();
        return $images[array_rand($images, 1)];
    }

    function setImage($img_id) {
        $this->img_id = $img_id;
    }

    function my_substr($text, $symbols = 200) {
        $symbols = (int) $symbols;
        if (strlen($text) <= $symbols) {
            return $text;
        }

        $pos = mb_strpos($text,' ', $symbols,'UTF-8');
        return mb_substr($text, 0, (int) $pos, 'UTF-8')."....";
    }

}
