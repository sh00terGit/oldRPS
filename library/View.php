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
    /**
     * default title =  'Райпрофсож Гомель'
     * default description =  ''
     */
    function __construct() {
        $this->title = 'Райпрофсож Гомель';     // default meta title
        $this->description = '';                // default meta description
    }
    /**
     * 
     * @param template $name  - views/ *.php file
     * @param type $full - default true -  with header and footer
     * @param type $script - render script after header or script -> template , default =''
     */
    public function render($name, $full = true, $script = '') {
        if ($full) {
            require 'views/header.php';
            echo $script;
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        } else {
            echo $script;
            require 'views/' . $name . '.php';
        }
    }

}
