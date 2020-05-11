<?php
  class PostController
  {
    private static $instance = null;

    public static function getInstance(): PostController
    {
      if (static::$instance === null) {
        static::$instance = new PostController();
      }

      return static::$instance;
    }

    public function getById($postId) {
      return PostRepository::getInstance()->getById($postId);
    }

    public function get($offset, $count, $tag) {
      $pagination = new Pagination($offset, $count);
      $posts = PostRepository::getInstance()->get("", $pagination, $tag);
      return $posts;
    }

    public function getCount($tag) {
      return PostRepository::getInstance()->getCount($tag);
    }

    public function create($authorId, $title, $data, $tagId) {
      return PostRepository::getInstance()->create(
        $authorId,
        $title,
        $data,
        $tagId
      );
    }
  }
?>