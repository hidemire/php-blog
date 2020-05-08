<?php
    class TagController
    {
        private static $instance = null;

        public static function getInstance(): TagController
        {
            if (static::$instance === null) {
                static::$instance = new TagController();
            }

            return static::$instance;
        }

        public function getAll() {
            $tegs = TagRepository::getInstance()->getAll();
            return $tegs;
        }
    }
?>