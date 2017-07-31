<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?=$this->description?>">
        <meta name="author" content="Shypul Andrey Anatolievich">
        <link rel="shortcut icon" href="/public/images/favicon.ico">

        <title><?=$this->title?></title>

        <!-- Bootstrap core CSS -->
        <link href="/public/css/roboto/roboto.css" rel="stylesheet">
        <link href="/public/css/bootstrap.min.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="/public/js/html5shiv.js"></script>
          <script src="/public/js/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
        <link href="/public/css/carousel.css" rel="stylesheet">
        <style>


            .nav {
                font-size: 18px;
            }
            img {
                margin:10px;
            }


        </style>
        <script> BASEURL = "<?= URL; ?>";</script>



        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/public/js/jquery18.min.js"></script>        
        <script src="/public/js/bootstrap.min.js"></script>
        <script src="/public/js/docs.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#menu li').each(function () {
                    var link = $(this).find('a').attr('href');
                    if (link == window.location.pathname) {
                        $(this).addClass('active');
                    } else {
                        $(this).removeClass('active');
                    }
                }

                );


            });
        </script>


    </head>
    <!-- NAVBAR
    ================================================== -->
    <body>
        <div class="container">


            <div class="header" style="margin-bottom: 20px; margin-top: 10px;">
                <div class="container"> 
                    <div class="col-sm-3 visible-lg visible-md">
                        <img style=" width: 100%;" src="/public/images/lblr.jpg">
                    </div>
                    <div class="col-sm-9 visible-lg visible-md">
                        <h3 style="color: #3DAAD3" ><strong><em>
                                    РАЙПРОФСОЖ
                                    РУП " Гомельское отделение
                                    Белорусской железной дороги"</em></strong></h3>
                    </div>

                </div>
            </div>

           
            <div class="navbar navbar-inverse " role="navigation">          
                <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand visible-xs" href="/index">РАЙПРОФСОЖ ГОМЕЛЬ</a>
        </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav" id="menu">
                        <li class="active" ><a href="/index">Главная</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Деятельность <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/index/dirwork">Направления</a></li>
                                <li><a href="/index/taskwork">Задачи</a></li>
                                <li><a href="/index/healthwork">Оздоровление</a></li>                               
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Фотогалерея <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/index/infoday">Информационный день</a></li>
                                <li><a href="/index/photosport">Спартакиада</a></li>
                                <li><a href="#">Оздоровление</a></li>                               
                            </ul>
                        </li>
                        <li><a href="/news">Новости</a></li>
                        <li><a href="/index/contacts">Контакты</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">О нас <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Структура</a></li>
                                <li><a href="#">Становление</a></li>                             
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
         
           

            <div id="content">