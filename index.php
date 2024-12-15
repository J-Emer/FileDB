<?php

use Jemer\FileDb\DBManager;

require "vendor/autoload.php";


$db = new DBManager(__DIR__ . "/Storage");
echo $db->AddCategory("Test");


?>