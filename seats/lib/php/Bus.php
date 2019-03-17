<?php


class Bus
{
    private $seats;
    private $booking;
    private $available;
    private $requestBooking;


    public function __construct($seats = 100,$booking = 0)
    {
        $this->seats = $seats;
        $this->booking = $booking;
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
        return  $this->booking;
    }

    public function getAvailable()
    {
        return  $this->available;
    }


    public function checkAvailable($book = 0)
    {

        switch ($book)
        {
            case 0:
                if($this->available > 0)
                {
                    return true;
                }
                break;
            default:
                if($this->available < $book)
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
            $this->booking += $num;
            $this->updateAvailable();
        }
        $this->requestBooking["seats_request"] = $num;
        $this->requestBooking["booking_status"] =  $checkAvailable;
    }


   private function  updateAvailable()
   {
       $this->available = $this->seats - $this->booking;
   }


    public function printAvailable() {
        $json='{"seats":'.$this->getSeats().',"booking":'.$this->getBooking().',"available":'.$this->getAvailable().',"request":'.json_encode($this->requestBooking).'}';
        echo $json;
    }



}