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

    public function getLikesCount() {
      return PostRepository::getInstance()->getLikesCount();
    }

    public function addComment($postId, $userId, $message) {
      return PostRepository::getInstance()->addComment($postId, $userId, $message);
    }

    public function deleteComment($commentId) {
      return PostRepository::getInstance()->deleteComment($commentId);
    }

    public function addLike($postId, $userId) {
      return PostRepository::getInstance()->addLike($postId, $userId);
    }

    public function update($post, $data, $title, $tagId) {
      return PostRepository::getInstance()->update($post, $data, $title, $tagId);
    }

    public function deleteById($postId) {
      return PostRepository::getInstance()->deleteById($postId);
    }
  }
?>