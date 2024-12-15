<?php 

namespace Jemer\FileDb;


class DBManager{
    
    private $storageDir;

    public function __construct($storage)
    {
        $this->storageDir = $storage;
    }

    /**
     * Adds a new Category (subdirectory inside of Storage directory)
     * @param: name of new Category
     * @returns: returns message indicating if category was successfully created or not
     */
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
    /**
     * Saves a new file. 
     * @param: $obj -> the object to be saved
     * @param: $path -> relative path starting from Storage. Exclude file extension
     * @returns: message indicating if file was successfully saved or not 
     */
    public function AddFile($obj, $path) : string
    {
        $json = json_encode($obj);
        $path = PathHelper::BuildPath([
                                        $this->storageDir, 
                                        $path . ".json"
                                    ]);
        file_put_contents($path, $json);
        
        return "File created at: " . $path;
    }

}

?>