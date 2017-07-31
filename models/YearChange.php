<?php

/*
 *
 * @author Shipul Andrey 
 *  @position Nod-4 ivc
 * 
 */

Class YearChange extends View {

    public $view, $template, $script, $years, $currYear;  // db pointer

    //connection with DB

    public function __construct($year, $page, $template,$view, $countPerPage = LIMIT_VALUE, $countYears =LIMIT_VALUE ) {
        $this->currYear = $year;        
        $this->view = $view;
        $this->view->currYear = $year;
        $this->template = $template;
        $this->years = array();
        for ($i = $year - $countYears; $i <= $year; $i++) {
            $this->years[] = $i;            
        }


        $mapper = new NewsMapper();
        $news = $mapper->fetchByPageYear($page, $year, $countPerPage);
        $this->view->news = $news;
        $this->view->countPages = floor((($mapper->getCountNews($year) - 1) / $countPerPage)) + 1;
        $this->view->page = $page;
        //get diff years

        $this->view->years = $this->years;
    }

    public function show($fullPage = false, $script) {
        $this->view->render($this->template, $fullPage, $script);
    }

    public function script($handlerUrl, $ieHandled = false) {
        if ($ieHandled) {
        $this->script = " <script src='/public/js/jquery.blockUI.min.js'></script>
                         <script>

                            $(document).on('change', '#year', function () {
                                $.ajax({
                                    url: '" . $handlerUrl . "',
                                    data: 'year=' + $('#year').val(),
                                    cache: false,                                    
                                    complete: function (data) {
                                       $('#newsCol').html(data.responseText);
                                    }
                                });
                            });
                        </script>";
        } else {
           $this->script = " <script src='/public/js/jquery.blockUI.min.js'></script>
                         <script>

                            $(document).on('change', '#year', function () {
                                $.ajax({
                                    url: '" . $handlerUrl . "',
                                    data: 'year=' + $('#year').val(),
                                    cache: false,
                                    beforeSend: function () {
                                        $.blockUI({message: '<h1> Подождите</h1>', timeout: 400} );
                                    },
                                    complete: function (data) {
                                        $.unblockUI();
                                       $('#newsCol').html(data.responseText);
                                    }
                                });
                            });
                        </script>";
            
            
        }
    }
  
    
}