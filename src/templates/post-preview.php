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
      <h2 class="blog-title"><a href="single.html"><?= "{$post["title"]}" ?></a></h2>
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
<!-- Blog Article Start-->
<article>
  <!-- Blog item Start -->
  <div class="blog-item-wrap">
    <!-- Post Format icon Start -->
    <div class="post-format">
      <span><i class="ico-bookmark"></i></span>
    </div><!-- Post Format icon End -->
    <h2 class="blog-title"><a href="#">Clean and
        Simplified UI/UX</a></h2><!-- Entry Meta Start-->
    <div class="entry-meta">
      <span class="meta-part"><i class="ico-user"></i> <a href="#">James
          Maclern</a></span> <span class="meta-part"><i class="ico-calendar-alt-fill"></i> <a href="#">January 7,
          2015</a></span> <span class="meta-part"><i class="ico-comments"></i>
        <a href="#">20</a></span> <span class="meta-part"><i class="ico-tag"></i> <a href="#">Tech</a></span> <span
        class="meta-part"><i class="ico-star"></i> <a href="#">7.5</a></span>
    </div><!-- Entry Meta End-->
    <!-- Post Content Start -->
    <div class="post-content">
      <p>The first day of work of 2016 brings with it
        the dread of a dawning realization for most…
        you’ve made New Year’s resolutions, and you
        have to stick to them. Or, at the very least,
        you should give it the old college try.
        According to a study by the University of
        Scranton published in the Journal of
        Psychology, 45 percent of Americans usually
        make resolutions, but only 8 percent are
        successful. It also found that those who
        explicitly make resolutions are ten times more
        likely to succeed in accomplishing them.</p>
    </div><!-- Post Content End -->
    <div class="entry-more">
      <div class="pull-left">
        <a class="btn btn-common" href="single.html">Read More <i class="ico-arrow-right"></i></a>
      </div>
      <div class="share-icon pull-right">
        <span class="socialShare"></span>
      </div>
    </div>
  </div><!-- Blog item End -->
</article><!-- Blog Article End-->