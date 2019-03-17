<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/lib/php/Bus.php');
$booking = intval($_GET['booking']);


$bus = new Bus(100,32);

$bus->addBooking($booking );
$bus->printAvailable();

