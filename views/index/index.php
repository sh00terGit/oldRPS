            <!-- Carousel
            ================================================== -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">     
                    
                    <?php 
                    $i== 0;
                    foreach ($this->news as $news) : ?>
                    <?php                        
                       if ($i == 0){
                           
                           echo '<div class="item active">';
                       }
                       else 
                           echo '<div class="item ">'; 
                       $i++;
                    ?>
                     
                         
                    <img src="<?= $news->getRandomImage()->getPath()?>" style="margin: 0;">
                            <div class="carousel-caption">
                                <p><?= $news->getDate()?></p><h2 class="text-muted"> &nbsp;&nbsp;<?= $news->getTitle() ?></h2>
                                <p><?= $news->getShortText() ?></p>
                                <p> <a href="<?=URL?>news/view/<?=$news->getId()?>"  class="btn btn-sm btn-primary" role="button">&nbsp;&nbsp;Подробнее....</a></p>
                            </div>
                       
                    </div>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div><!-- /.carousel -->

        </div>

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
             
                <?php 
                    foreach ($this->news as $news) : ?>
                        <div class="col-lg-4">
                  
                    <img class="img-rounded " src="<?= $news->getRandomImage()->getPath()?>" style="width: 15em; height: 15em;">
                    <p><?= $news->getDate()?></p><h4> <?= $news->getTitle() ?></h4>
                    <p><?= $news->getShortText() ?></p>
                    <p><a class="btn btn-default" href="<?=URL?>news/view/<?=$news->getId()?>" role="button">Читать подробности</a></p>
           
                </div><!-- /.col-lg-4 -->
             <?php endforeach; ?>
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
            <div  style="margin-bottom: 60px;"><h2 class="text-center text-primary">Наша работа</h2></div>
   
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading"> Оздоровление</h2>
                    <p class="lead">
                        В течение 2015 года в соответствии с условиями Коллективного договора РУП «Гомельское отделение Белорусской железной дороги, в плане содействия администрации, профсоюзными работниками и профактивом Гомельского Райпрофсожа была проведена большая организационная работа по оздоровлению работников предприятий и их детей.
   
                    </p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="/public/images/news/children.jpg">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-5">
                    <img class="featurette-image img-responsive" src="/public/images/news/sport.jpg">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading">Спартакиады</h2>
                    <p class="lead">Проведение различных массовых спортивных соревнованих, по многим видам спорта.</p>
                </div>
            </div>


    