<?php

use Jemer\FileDb\DBManager;
use Jemer\FileDb\DummyData;

require "vendor/autoload.php";


$db = new DBManager(__DIR__ . "/Storage");

$post = $db->GetFile("Test/First");
echo $post->Title; 

?>