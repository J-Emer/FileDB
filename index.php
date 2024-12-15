<?php

use Jemer\FileDb\DBManager;
use Jemer\FileDb\DummyData;

require "vendor/autoload.php";


$db = new DBManager(__DIR__ . "/Storage");
echo $db->AddFile(new DummyData("Second", "Jemer"), "Test/Second");


?>