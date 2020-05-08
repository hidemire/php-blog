<?php
class Comment
{
    public $id;
    public $message;
    public $postId;
    public $userId;
    public $createdAt;

    function __construct($id, $message, $postId, $userId, $createdAt) {
        $this->id = $id;
        $this->message = $message;
        $this->postId = $postId;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
    }
}
?>