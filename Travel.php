KAIQUE FUDIDO

<?php
include_once("Flight.php");

class Travel{
  //attributes
  private Flight $flight;
  private DateTime $date;
  private array $seats;
  private string $travel_code;

  //Constructor
  public function __construct(
    Flight $p_flight;
    DateTime $p_date;
    array $p_seats;
    string $p_travel_code;
  ) {
  $this->flight = $p_flight;
  $this->date = $p_date;
  $this->seats = $p_seats;
  $this->travel_code = $p_travel_code;
  }

  //getters
  public function getFlight() : Flight{
    return this->flight;
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
  public function setFlight(Flight $p_flight): void {
    $this->flight = $p_flight;
  }
  public function setDate(DateTime $p_date): void {
    $this->date = $p_date;
  }
  public function setSeats(array $p_seats): void {
    $this->seats = $p_seats;
  }

  //methods
  public function setTravel_Code(string $p_travel_code): string {
    return $this->travel_code = flight_code()."-".sizeof($p_flight_history)+1;
  }
}
  
?>