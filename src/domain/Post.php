<?php
class Post
{
    public $id;
    public $author;
    public $title;
    public $createdAt;
    public $tag;

    function __construct($id, $author, $title, $createdAt, $tag) {
        $this->id = $id;
        $this->authorId = $author;
        $this->title = $title;
        $this->createdAt = $createdAt;
        $this->tag = $role;
    }
}
?>