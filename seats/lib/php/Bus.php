<?php


class Bus
{
    private $seats;
    private $booking;
    private $available;


    public function __construct()
    {
       $this->seats = 100;
       $this->booking = 0;
       $this ->updateAvailable();
    }

    public function __construct1($seats,$booking)
    {
        $this->seats = $seats;
        $this->booking = $booking;
        $this ->updateAvailable();
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
                    return true;
                }
                break;

        }

        return false;
    }

   private function  updateAvailable()
   {
       $this->available = $this->seats - $this->booking;
   }

}