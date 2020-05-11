<?php
  $prepearedPosts = array_map(function($p) {
    // Search first imaage in blocks
    $image = null;
    foreach($p["decoded_data"]["blocks"] as $b) {
      if ($b["type"] == "image") {
        $image = $b["data"];
        break;
      }
    }
    $p["image"] = $image;

    // Seeacrh first paragraph in blocks
    $paragraph = null;
    foreach($p["decoded_data"]["blocks"] as $b) {
      if ($b["type"] == "paragraph") {
        $paragraph = $b["data"];
        break;
      }
    }
    $p["paragraph"] = $paragraph;

    return $p;
  }, $posts);

  // var_dump($prepearedPosts);
?>

<?php foreach($prepearedPosts as $post) { ?>
  <article>
    <div class="blog-item-wrap">
      <div class="post-format">
        <span><i class="fa fa-camera"></i></span>
      </div>
      <h2 class="blog-title"><a href="<?=!$isAuth ? "login.php" : "single.php?id={$post["id"]}"?>"><?= "{$post["title"]}" ?></a></h2>
      <div class="entry-meta">
        <span class="meta-part"><i class="ico-user"></i> <a href="#"><?= "{$post["creator"]}" ?></a></span>
        <span class="meta-part"><i class="ico-calendar-alt-fill"></i> <a href="#">
          <?= date_format(new DateTime($post["createdAt"]),  'F d, Y') ?>
        </a></span>
        <span class="meta-part"><i class="ico-comments"></i><a href="#"><?= count($post["comments"]) ?></a></span>
        <span class="meta-part"><i class="ico-tag"></i> <a href="#"><?= "{$post["tag_name"]}" ?></a></span>
        <!-- <span class="meta-part"><i class="ico-star"></i> <a href="#">7.5</a></span> -->
      </div>
      <?php if (isset($post["image"])) { ?>
        <div class="feature-inner">
          <a data-lightbox="roadtrip" href="<?= $post["image"]["url"] ?>"><img alt="" src="<?= $post["image"]["url"] ?>"></a>
        </div>
      <?php } ?>
      <div class="post-content">
        <p><?= "{$post["paragraph"]["text"]}" ?></p>
      </div>
      <div class="entry-more">
        <div class="pull-left">
          <a class="btn btn-common" href="<?=!$isAuth ? "login.php" : "single.php?id={$post["id"]}"?>">
            <?=!$isAuth ? "Login for " : ""?>Read More <i class="ico-arrow-right"></i>
          </a>
        </div>
        <div class="share-icon pull-right">
          <span class="socialShare"></span>
        </div>
      </div>
    </div>
  </article>
<?php } ?>
