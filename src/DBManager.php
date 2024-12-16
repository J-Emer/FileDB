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

    /**
     * Retrieves the contents of a file
     * @param $path relative path from the Storage directory. Excludes file extension
     * @returns object
     */
    public function GetFile($path) : object
    {
        $filePath = PathHelper::BuildPath([$this->storageDir, $path . ".json"]);
        return json_decode(file_get_contents($filePath));
    }

    /**
     * Retrieves all files in a path
     * @param $path -> relative path from Storage directory
     * @returns array of file names
     */
    public function GetFiles($path) : array
    {
        $filePath = PathHelper::BuildPath([$this->storageDir, $path]);

        $files = array_diff(scandir($filePath), array(".", ".."));

        $cache = [];

        foreach ($files as $file) 
        {
            $_path = PathHelper::BuildPath([$filePath, $file]);
            
            if(is_file($_path))
            {
                array_push($cache, $file);
            }
        }

        return $cache;
    }

    /**
     * Updates an existing file
     * @param $obj -> the new object data to be saved
     * @param $path -> relative path from Storage directory, excluding extension
     * @returns string indicating if file was updated or not
     */
    public function UpdateFile($obj, $path) : string
    {
        $path = PathHelper::BuildPath([
            $this->storageDir, 
            $path . ".json"
        ]);

        if(!file_exists($path))
        {
            return "File does not exist: terminating operation";
        }

        $json = json_encode($obj);

        file_put_contents($path, $json);
        
        return "File updated at: " . $path;
    }

}

?>