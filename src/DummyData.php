<?php 

namespace Jemer\FileDb;

class DummyData
{
    public $Title;
    public $Author;

    public function __construct($title, $author)
    {
        $this->Author = $author;
        $this->Title = $title;
    }
}

?>