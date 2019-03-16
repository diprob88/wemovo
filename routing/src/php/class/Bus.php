<?php



class Bus
{
    private $id;
    private $stations;
    private $legs;


    public function __construct($line)
    {
        $data=explode(",", $line);
        $this->id=intval($data[0]);
        $this->stations = array();
        for($i=1;$i<count($data);$i++)
        {
            array_push($this->stations,intval($data[$i]));

        }
        $this->legs=$this->makeLegs($this->stations);
    }

    public function getId()
    {
        return  $this->id;
    }

    public function getStations()
    {
        return  $this->stations;
    }

    public function getLegs()
    {
        return  $this->legs;
    }

    private function makeLegs($data)
    {
        $legs = array();
        for($i=0;$i<count($data)-1;$i++)
        {
            array_push($legs,[
                "origin"=>intval($data[$i]),
                "destination"=>intval($data[$i+1]),
            ]);

        }
        return $legs;
    }

    public function printBus() {
        $json='{"id":'.$this->getId().',"stations":'.json_encode($this->stations).',"legs":'.json_encode($this->legs).'}';
        echo $json;
    }

    public function searchRoute($origin,$destination) {
        foreach ($this->legs as $leg) {
           if($leg["origin"]==$origin && $leg["destination"]==$destination )
           {
               return true;
           }
        }
        return false;
    }


}