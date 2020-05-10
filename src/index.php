<?php
  require_once "./core/imports.php";
  $pageName = "Home";
  $isAuth = AuthController::getInstance()->checkAuth();
  $currentPage = abs(isset($_GET["p"]) ? (int)$_GET["p"] : 1);
  $currentTag = isset($_GET["tag"]) ? (int)$_GET["tag"] : -1;


  $offset = ($POSTS_PER_PAGE * $currentPage) - $POSTS_PER_PAGE;
  $posts = PostController::getInstance()->get($offset, $POSTS_PER_PAGE, $currentTag);
  $tags = TagController::getInstance()->getAll();

  // var_dump(session_id(), $_SESSION);
  var_dump($offset, $posts);
?>

<head>
  <?php include "./templates/head.php" ?>
</head>
<body>
  <?php include "./templates/header.php" ?>
  <?php include "./templates/hero.php" ?>
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
        <?php include "./templates/post-preview.php" ?>
          <article>
            <?php include "./templates/pager.php" ?>
          </article>
        </div>
        <div class="col-md-4">
          <div class="sidebar">
            <?php include "./templates/categories.php" ?>
          </div>
        </div>
      </div>
    </div>
  </div><!-- Content End -->
  <?php include "./templates/footer.php" ?>
  <?php include "./templates/scripts/common.php" ?>
</body>