
<h3 class="text-center text-primary"><?=$this->article->getTitle()?> </h3>
<p>
    <?=$this->article->getText();?>
</p>

<?php if ($this->article->getImageActive() ) :?>
<div class="row">
    <?php foreach ($this->article->getImageActive() as $image) : ?>

    <img src="<?=$image->getPath()?>" width="100%">
    <?php endforeach;  ?>
</div>
<?php endif; ?>