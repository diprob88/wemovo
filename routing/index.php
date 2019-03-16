<?php
require_once 'src\php\class\Reader.php';
require_once 'src\php\class\Bus.php';

$reader  =  new Reader();
$reader->printBuses();


/*$bus = new Bus("1,5,7,8,9");

$bus->printBus();

if($bus->searchRoute(7,8))
{
    echo "OK";
}

*/

$reader->searchRoute(5,7);