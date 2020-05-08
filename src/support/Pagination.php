<?php
class Pagination {
    public $offset;
    public $count;

    public function __construct($offset, $count)
    {
        $this->offset = $offset;
        $this->count = $count;
    }
}
?>