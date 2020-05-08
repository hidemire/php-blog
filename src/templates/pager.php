<?php
  $currentPage = abs(isset($_GET["p"]) ? (int)$_GET["p"] : 1);
  $currentTag = isset($_GET["tag"]) ? (int)$_GET["tag"] : -1;

  $postsCount = PostController::getInstance()->getCount($currentTag);
  $maxPage = ceil($postsCount / $POSTS_PER_PAGE);

  $linksCount = 2;

  $start = ($currentPage - $linksCount) > 0 ? $currentPage - $linksCount : 1;
  $end = ($currentPage + $linksCount) < $maxPage ? $currentPage + $linksCount : $maxPage;

  // var_dump($currentTag, $postsCount);

  function formatTag($tg) {
    if ($tg < 0) {
      return "";
    }

    return "&tag=".$tg;
  }
?>

<ul class="pager">
  <?php if ($postsCount  == 0) { ?>
    <li class="list-style: none">
      <span>0</span>
    </li>
  <?php } ?>
  <?php if ($currentPage > 1) { ?>
    <li class="previous">
      <a href="<?= "index.php?p=".($currentPage - 1).formatTag($currentTag) ?>"><i class="ico-arrow-left"></i>
      Prev</a>
    </li>
  <?php } ?>
  <li style="list-style: none">
    <?php if ($start > 1) { ?>
      <span class="active"><a href="<?= "index.php?p=1".formatTag($currentTag) ?>">1</a></span>
      <span style="padding: 0px;">...</span>
    <?php } ?>
    <?php for($i = $start; $i <= $end; $i++) { ?>
      <span class="active"><a href="<?= "index.php?p={$i}".formatTag($currentTag) ?>"><?= $i ?></a></span>
    <?php } ?>
    <?php if ($end < $maxPage) { ?>
      <span style="padding: 0px;">...</span>
      <span class="active"><a href="<?= "index.php?p={$maxPage}".formatTag($currentTag) ?>"><?= $maxPage ?></a></span>
    <?php } ?>
  </li>
  <?php if ($currentPage < $maxPage) { ?>
    <li class="next">
      <a href="<?= "index.php?p=".($currentPage + 1).formatTag($currentTag) ?>"><i class="ico-arrow-right"></i>
      Next</a>
    </li>
  <?php } ?>
</ul>
