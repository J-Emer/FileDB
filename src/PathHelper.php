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
}

?>