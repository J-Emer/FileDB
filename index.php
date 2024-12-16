<?php

use Jemer\FileDb\DBManager;
use Jemer\FileDb\DummyData;

require "vendor/autoload.php";


$db = new DBManager(__DIR__ . "/Storage");

echo $db->UpdateFile(
                new DummyData("First Post", "Bob Smith"), 
                "Test/First"
                );

?>