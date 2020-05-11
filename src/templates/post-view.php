<article class="single-post-content">
  <?php foreach ($post["decoded_data"]["blocks"] as $block) { ?>
    <?php if ($block["type"] == "image") { ?>
      <div class="blog-item-wrap">
        <a href="#"><img alt="" src="<?= $block["data"]["url"] ?>"></a>
      </div><!-- Blog item End --><br>
    <?php } ?>

    <?php if ($block["type"] == "paragraph") { ?>
      <p><?= $block["data"]["text"] ?></p>
    <?php } ?>

    <?php if ($block["type"] == "header") { ?>
      <<?= "h{$block["data"]["level"]}" ?> class="blog-title">
        <a href="">
          <?= $block["data"]["text"] ?>
        </a>
      </<?= "h{$block["data"]["level"]}" ?>><br>
    <?php } ?>

    <?php if ($block["type"] == "quote") { ?>
      <?php if ($block["data"]["alignment"] == "left") { ?>
        <div class="row">
          <blockquote class="capton">
            <p><?= $block["data"]["text"] ?></p>
          </blockquote>
        </div>
      <?php } ?>

      <?php if ($block["data"]["alignment"] == "center") { ?>
        <div class="row">
          <blockquote class="quote">
            <p><?= $block["data"]["text"] ?></p><span><i class="ico-quote"></i></span>
          </blockquote>
        </div>
      <?php } ?>
    <?php } ?>

    <?php if ($block["type"] == "list") { ?>
      <?php if ($block["data"]["style"] == "unordered") { ?>
        <ul class="list" style="margin-left: 20px;"y>
          <?php foreach ($block["data"]["items"] as $li) { ?>
            <li style="list-style: disc;"><?= $li ?></li>
          <?php } ?>
        </ul><br>
      <?php } ?>

      <?php if ($block["data"]["style"] == "ordered") { ?>
        <ol class="list" style="margin-left: 20px;padding: 0px;list-style: decimal;"y>
          <?php foreach ($block["data"]["items"] as $li) { ?>
            <li><?= $li ?></li>
          <?php } ?>
        </ol><br>
      <?php } ?>
    <?php } ?>
  <?php } ?>
  <div class="links">
    <a class="heart" href="#"><i class="ico-heart"></i>
      (<?= count($post["likes"]) ?>)</a>
  </div>
</article><!-- Blog Article End-->
