<?php

use Jemer\FileDb\DBManager;
use Jemer\FileDb\DummyData;

require "vendor/autoload.php";


$db = new DBManager(__DIR__ . "/Storage");

var_dump($db->GetCategories("Test"));

?>