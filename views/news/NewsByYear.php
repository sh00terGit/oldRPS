<div class="row featurette">
    <?php foreach ($this->news as $news) : ?>
        <div class="col-md-7">
            <h4 class="featurette-heading"> <?= $news->getTitle() ?></h4> 

            <div class="news_content_date col-md-2 col-sm-2 col-xs-4" style="background-color: #E5E5E5"><?= $news->getDate() ?></div>
            <div class="clearfix"></div>
            <p class="lead"><?= $news->getShortText() ?>
                <a href="<?= URL ?>news/view/<?= $news->getId() ?>"  class="btn btn-sm btn-primary" role="button">&nbsp;&nbsp;Подробнее....</a>
            </p>
        </div>
        <div class="col-md-5">        
            <img class="featurette-image img-responsive" src="<?= $news->getRandomImage()->getPath(); ?>">
        </div>
        <hr class="featurette-divider">
    <?php endforeach; ?>
</div>


<div style="text-align: center">
    <!--paginate navigator-->
    <?php if ($this->news != NULL) { ?>
        <div  class="pagination">
            <?php for ($i = 1; $i <= $this->countPages; $i++) : ?>
                <?php if ($i == $this->page) { ?>
                    <a class="active" href="<?= URL ?>news?page=<?= $this->page ?>">
                        <?= $this->page ?>
                    </a>
                <?php } else { ?>
                    <a href="<?= URL ?>news?page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                <?php } ?>
            <?php endfor; ?>
        </div>
    <?php } else { ?>
        <div class="col-md-5 col-md-offset-4">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Нет новостей за указанный год!</strong> 
            </div>
        </div>
    <?php } ?>
</div>

<!-- /paginate navigator -->
