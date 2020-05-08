<?php
  $userRole = isset($_SESSION["_urole"]) ? (int)$_SESSION["_urole"] : 0;
?>

<header class="site-header">
  <nav class="navbar navbar-default navbar-intimate role="
  data-offset-top="50" data-spy="affix">
    <div class="container">
      <div class="navbar-header">
        <!-- Start Toggle Nav For Mobile -->
          <button class="navbar-toggle" data-target="#navigation"
        data-toggle="collapse" type="button"><span class=
        "sr-only">Toggle navigation</span> <span class=
        "icon-bar"></span> <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
        <div class="logo">
          <a class="navbar-brand" href="index.php"><i class=
          "ico-3dglasses"></i></a>
        </div>
      </div>
      <!-- Navigation Start -->
      <div class="navbar-collapse collapse" id="navigation">
        <ul class="nav navbar-nav navbar-right">
          <li <?= $pageName == "Home" ? 'class="active"' : ""?>>
            <a href="index.php">Blog</a>
          </li>
          <?php if (!$isAuth) { ?>
            <li <?= $pageName == "Login" ? 'class="active"' : ""?>>
              <a href="login.php">Login</a>
            </li>
          <?php } else { ?>
            <li <?= $pageName == "UserInfo" ? 'class="active"' : ""?>>
              <a href="user-info.php">User Info</a>
            </li>
            <?php if (($userRole & $ADMIN_ROLE) == $ADMIN_ROLE) { ?>
              <li <?= $pageName == "AdminPanel" ? 'class="active"' : ""?>>
                <a href="admin-panel.php">AdminPanel</a>
              </li>
            <?php } ?>
            <li <?= $pageName == "Logout" ? 'class="active"' : ""?>>
              <a href="logout.php">Logout</a>
            </li>
          <?php } ?>
        </ul>
      </div><!-- Navigation End -->
    </div>
  </nav><!-- Mobile Menu Start -->
  <ul class="wpb-mobile-menu">
    <li <?= $pageName == "Home" ? 'class="active"' : ""?>>
      <a href="index.php">Blog</a>
    </li>
    <?php if (!$isAuth) { ?>
      <li <?= $pageName == "Login" ? 'class="active"' : ""?>>
        <a href="login.php">Login</a>
      </li>
    <?php } ?>
  </ul><!-- Mobile Menu End -->
</header><!-- Header Section End -->