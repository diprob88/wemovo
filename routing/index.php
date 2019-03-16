<?php
require_once 'src\php\class\Reader.php';
require_once 'src\php\class\Bus.php';

$reader  =  new Reader();
$bus = new Bus("1,5,7,8,9");
$reader->printLineFile();
$bus->printBus();