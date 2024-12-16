<?php 

namespace Jemer\FileDb;


class PathHelper
{

    public static function DirectoryName(string $path) : string 
    {
        return pathinfo($path)['dirname'];
    }
    public static function NamewithExtension(string $path) : string 
    {
        return pathinfo($path)['basename'];
    }
    public static function NamewithoutExtension(string $path) : string 
    {
        return pathinfo($path)['filename'];
    }
    public static function Extension(string $path) : string 
    {
        return pathinfo($path)['extension'];
    }    
    public static function BuildPath(array $arr) : string
    {
        $str = "";

        foreach ($arr as $key) 
        {
            $str .= $key . DIRECTORY_SEPARATOR;
        }

        return rtrim($str, DIRECTORY_SEPARATOR);
    }
    public static function GetFiles($path) : array
    {
        $files = array_diff(scandir($path), array(".", ".."));

        $cache = [];

        foreach ($files as $file) 
        {
            $_path = PathHelper::BuildPath([$path, $file]);
            
            if(is_file($_path))
            {
                array_push($cache, $file);
            }
        }

        return $cache;
    }
    public static function GetDirectories($path) : array
    {
        $files = array_diff(scandir($path), array(".", ".."));

        $cache = [];

        foreach ($files as $file) 
        {
            $_path = PathHelper::BuildPath([$path, $file]);
            
            if(is_dir($_path))
            {
                array_push($cache, $file);
            }
        }

        return $cache;
    }
}

?>