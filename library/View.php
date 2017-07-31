<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

class View {
    
    public $description;  
    public $title;
            
    function __construct() {
        $this->title = 'Райпрофсож Гомель';     // default meta title
        $this->description = '';                // default meta description
    }

    public function render($name, $full = true , $script = false) {
        if ($full) {
            require 'views/header.php';
            echo $script;
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
        else {
             require 'views/' . $name . '.php';
        }
    }

}
