<div class="col-md-2">
    <div class="form-group-lg">
        <label class="sr-only" for="year">Год:</label>&nbsp;
        <select  class="form-control" name="year" id="year" style="background-color:#E5E5E5; ">
            <?php foreach ($this->years as $key => $year) { ?>
                <option <?php echo '' . ($year != $this->currYear ? '' : 'selected') ?> value="<?= $year ?>"><?= $year ?></option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="clearfix"></div>

<div id="newsCol">
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

<?php if($this->news != NULL) { ?>
<div style="text-align: center">
    <!--paginate navigator-->
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
</div>
    
    <?php } ?>
</div>
<!-- /paginate navigator -->



<style>
    .pagination {
        text-align: center;
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        font-size: larger;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: #3DAAD3;
        color: white;
        border: 1px solid #3DAAD3;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}
</style>


