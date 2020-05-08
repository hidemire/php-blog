<?php
    session_start();
    require_once './controllers/AuthController.php';
    require_once './controllers/PostController.php';
    require_once './controllers/TagController.php';
    require_once './controllers/UserController.php';

    require_once './services/DatabaseConnectionProvider.php';
    require_once './services/Session.php';
    require_once './services/Redirect.php';
    require_once './services/Input.php';
    require_once './services/Cookie.php';

    require_once './repository/UserRepository.php';
    require_once './repository/PostRepository.php';
    require_once './repository/TagRepository.php';
    
    require_once './domain/User.php';
    require_once './domain/Post.php';
    require_once './domain/Tag.php';

    require_once './support/UserRole.php';
    require_once './support/Pagination.php';

    $ADMIN_ROLE = 1;
    $POSTS_PER_PAGE = 7;
?>