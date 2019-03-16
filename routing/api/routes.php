<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/src/php/class/Reader.php');

$origin = $_GET['origin'];
$destination =  $_GET['destination'];

$reader  =  new Reader();
$reader->searchRoute($origin,$destination);

