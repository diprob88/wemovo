<?php


class Bus
{
    private $seats;
    private $seats_booked;
    private $seats_available;
    private $requestBooking;


    public function __construct($seats = 100,$seats_booked = 0)
    {
        $this->seats = $seats;
        $this->seats_booked = $seats_booked;
        $this ->updateAvailable();
        $this->requestBooking = [
            "seats_request" => 0,
            "booking_status" => $this->checkAvailable()
        ];
    }


    public function getSeats()
    {
        return  $this->seats;
    }

    public function getBooking()
    {
        return  $this->seats_booked;
    }

    public function getAvailable()
    {
        return  $this->seats_available;
    }


    public function checkAvailable($book = 0)
    {

        switch ($book)
        {
            case 0:
                if($this->seats_available> 0)
                {
                    return true;
                }
                break;
            default:
                if($this->seats_available < $book)
                {
                    return false;
                }
                else
                {
                    return true;
                }
                break;

        }
    }

    public function  addBooking($num)
    {
        $checkAvailable=$this->checkAvailable($num);
        if($checkAvailable) {
            $this->seats_booked += $num;
            $this->updateAvailable();
        }
        $this->requestBooking["seats_request"] = $num;
        $this->requestBooking["booking_status"] =  $checkAvailable;
    }


   private function  updateAvailable()
   {
       $this->seats_available = $this->seats - $this->seats_booked;
   }


    public function printAvailable() {
        $json='{"seats":'.$this->getSeats().',"booking":'.$this->getBooking().',"available":'.$this->getAvailable().',"request":'.json_encode($this->requestBooking).'}';
        echo $json;
    }



}