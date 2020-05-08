<?php
class Like
{
    public $id;
    public $postId;
    public $userId;

    function __construct($id, $postId, $userId) {
        $this->id = $id;
        $this->postId = $postId;
        $this->userId = $userId;
    }
}
?>