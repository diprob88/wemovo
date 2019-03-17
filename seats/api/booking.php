<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/lib/php/Bus.php');
$booking = $_GET['booking'];


$bus = new Bus(100,79);

echo $booking;