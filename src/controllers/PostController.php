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

        public function get($offset, $count) {
            $pagination = new Pagination($offset, $count);
            $posts = PostRepository::getInstance()->get("", $pagination);
            return $posts;
        }

        public function getCount($tag) {
            return PostRepository::getInstance()->getCount($tag);
        }
    }
?>