<?php

include_once("Flight.php");

class Flight extends Travel{
  //attributes
  private Flight $flight;
  private DateTime $date;
  private array $seats;
  private string $travel_code;
  private Airplane $travel_plane;
  private array<bool> $available_seats;
  private array< Ticket > $sold_tickets;
  
  //Constructor
  public function __construct(
    Flight $p_flight;
    DateTime $p_date;
    array $p_seats;
    string $p_travel_code;
    Airplane $p_travel_plane;
    array<bool> $p_available_seats;
  ) {
  $this->flight = $p_flight;
  $this->date = $p_date;
  $this->seats = $p_seats;
  $this->travel_code = $p_travel_code;
  $this->travel_plane = $p_travel_plane;
  
  //CHECAR ESTE LOOP
    for($i = 0; $i < this->travel_plane.get_passenger_capacity(); i++){
      $this->available_seats[$i] = true;
    }
  }

  public function __destruct() {
    
  }


  //getters
  public function getFlight() : Flight{
    return this->flight;
  }
 public function getAvailableSeats() : bool{
    return this->available_seats;
  }
  public function getTravelPlane() : Airplane{
    return this->travel_plane;
  }
  public function getDate() : DateTime{
    return this->date;
  }
  public function getSeats() : array{
    return this->seats;
  }
  public function getTravel_Code() : string{
    return this->travel_code;
  }

  //setters

  
 public function setAvailableSeats() : void{
    $this->available_seats = $p_available_seats;
   
  public function setFlight(Flight $p_flight): void {
    $this->flight = $p_flight;
  }
public function setTravelPlane() : void{
    $this->travel_plane = $p_travel_plane;
  }
  public function setDate(DateTime $p_date): void {
    $this->date = $p_date;
  }
  public function setSeats(array $p_seats): void {
    $this->seats = $p_seats;
  }

  //methods
  
  public function setTravelCode(string $p_travel_code): string {
    return $this->travel_code = flight_code()."-".sizeof($p_flight_history)+1;
  }
}
  public function boardRegister(Ticket $ticket) {

    $input = readline();
    if($input == "Passenger inside the plane"){
      $ticket->setStatus(ticket_status::board_plane);
    }
    else
    {
      $ticket->setStatus(ticket_status::no_show);
    }
    
}  
?>