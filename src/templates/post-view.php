<article class="single-post-content">
  <?php foreach ($post["decoded_data"]["blocks"] as $block) { ?>
    <?php if ($block["type"] == "image") { ?>
      <div class="blog-item-wrap">
        <a href="#"><img alt="" src="<?= $block["data"]["url"] ?>"></a>
      </div><br>
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
    <a class="heart" href="#" id="like-heart"><i class="ico-heart"></i>
      (<?= count($post["likes"]) ?>)</a>
  </div>
</article>

<article>
  <div id="comments">
    <ol class="comments-list">
      <?php foreach ($post["comments"] as $comment) { ?>
        <li>
          <div class="comment-box clearfix">
            <div class="comment-content">
              <div class="comment-meta">
                <h4 class="comment-by"><a href="#"><?= $comment["user_name"] ?></a></h4>
              </div>
              <p><?= $comment["message"] ?></p>
            </div>
          </div>
        </li>
      <?php } ?>
    </ol>
  </div>
</article>
<article>
  <div id="respond">
    <h2 class="respond-title">Add Comment</h2>
    <form action="#">
      <div class="row">
        <div class="col-md-12">
          <textarea class="form-control" cols="45" id="comment-textarea" name="comment" placeholder="Comment" rows="8"></textarea>
          <a class="btn btn-common btn-more" id="comment-submit" type="submit"><i class="fa fa-check"></i>Submit Comment</a>
        </div>
      </div>
    </form>
  </div>
</article>