<?php
  $currentPage = abs(isset($_GET["p"]) ? (int)$_GET["p"] : 1);
?>

<div class="entry-widget">
  <h5 class="widget-title">Categories</h5>
  <div class="accordion">
    <div class="panel-group" id="accordion">
      <?php foreach($tags as $tag) { ?>
        <div class="panel panel-default">
          <h4 class="panel-title">
            <a href="<?= "index.php?p={$currentPage}&tag={$tag->id}" ?>"><i class=
            "ico-keyboard_arrow_right">
            </i> <?=$tag->name?></a>
          </h4>
        </div>
      <?php } ?>
    </div>
  </div>
</div>