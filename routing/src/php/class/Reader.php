<?php
require_once 'src\php\class\Bus.php';
class Reader
{

    const path="txt/routing.txt";
    private $buses;


    public function __construct()
    {
        $buses = array();
        $rows= file(self::path, FILE_IGNORE_NEW_LINES);
        if (!($rows)) {
            die("Origin file not found");
        }

        foreach ($rows as $row) {
            array_push($buses,new Bus($row));

        }
        $this->buses = $buses;
    }


    public function getBuses()
    {
        return  $this->buses;
    }


    public function printBuses()
    {
        foreach ($this->buses as $bus) {
            $bus->printBus();
            echo"<br>";
        }
    }

    public function searchRoute($origin,$destination) {

        $bus_routes_ids = array();
        foreach ($this->buses as $bus) {
            if($bus->searchRoute($origin,$destination))
            {
                array_push($bus_routes_ids,$bus->getId());
            }
        }

        $json='{"bus_routes_ids:'.json_encode($bus_routes_ids ).'}';
        echo $json;


    }
}
