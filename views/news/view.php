<div style="display: table">
<div style="display: table-cell">
    <h4  style="padding-bottom: 0px;background-color: #E5E5E5;"><?=$this->news->getDate()?></h4>
</div>
<div style="display: table-cell; padding-left: 1em;">
<h2>
   <?=$this->news->getTitle()?>
    </h2>
</div>
</div>
    <div class="news_content_text lead">
        <p><?=$this->news->getText()?></p>
    </div>  

<?php if ($this->news->getImageActive() ) :?>
<div class="row">
    <?php foreach ($this->news->getImageActive() as $image) : ?>

    <img src="<?=$image->getPath()?>" width="100%">
    <?php endforeach;  ?>
</div>
<?php endif; ?>


<!--<div id="commentForm">  
    <input type="text" size="100" name="comment" id="comment" placeholder="Your comment">
    <input type="submit" value="Comment" onclick="commentMe(<?=$this->news->getId()?>)">
</div>

<div id="commentBlock">
    <?php foreach ($this->comments as $comment) : ?>     
        <div class="comment"><?=$comment->getText()?></div>
    <?php endforeach;?>
</div>-->



<script src="/public/js/functions.js"></script>