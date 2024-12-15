<?php 

namespace Jemer\FileDb;


class DBManager{
    
    private $storageDir;

    public function __construct($storage)
    {
        $this->storageDir = $storage;
    }

    public function AddCategory($name) : string
    {
        $path = PathHelper::BuildPath([$this->storageDir, $name]);

        if(!file_exists($path))
        {
            mkdir($path);
            return "Category: " . $name . " has been created";
        }

        return "Category: " . $name . " already exists";
    }

}

?>