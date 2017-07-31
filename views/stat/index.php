

<div class="col-lg-12">
    <div class="row">
        <h3>browser-view-percent</h3>
<?php
foreach ($this->browsers as $browser) {
    echo ' <div class="col-lg-4">';
    echo '<b>'.$browser->browser."   ( просмотров   ".$browser->view.')</b>'; 
    echo '</div>';    
    ?>
 <div class="col-lg-8">
<div class="progress">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?=$browser->percent?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?=$browser->percent?>%">
    <?=$browser->percent?>
  </div>
</div>
</div>
        
        <?php  }  ?>
    </div>
    <div class="row">
        <h3>platform-view-percent</h3>
    <?php

foreach ($this->platforms as $platform) {
    echo ' <div class="col-lg-4">';
    echo '<b>'.$platform->platform."   ( просмотров   ".$platform->view.')</b>'; 
    echo '</div>';
    ?>
 <div class="col-lg-8">
<div class="progress">
  <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?=$platform->percent?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?=$platform->percent?>%">
    <?=$platform->percent?>
  </div>
</div>
</div>
        
        <?php  }  ?>
    </div>
    
    
</div>


