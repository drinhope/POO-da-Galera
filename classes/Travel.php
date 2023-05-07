<?php

include_once("Global.php");

class Travel extends Persist {
  //attributes
  private string $travel_code;
  private Flight $flight;
  private DateTime $date;
  private Airplane $travel_plane;
  private array $available_seats;
  private int $seat_price;
  private array tripulation;
  protected static $local_filename = "Travel.txt";
  
  //Constructor
  public function __construct(
    String $p_travel_code,
    Flight $p_flight,
    DateTime $p_date,
    Airplane $p_travel_plane,
    array $p_available_seats,
    int $p_seat_price,
    array $p_tripulation
  ) {
  $this->travel_code = $p_travel_code;
  $this->flight = $p_flight;
  $this->date = $p_date;
  $this->travel_plane = $p_travel_plane;
  $this->available_seats = $p_available_seats;
  $this->seat_price = $p_seat_price;
  $this->tripulation = $p_tripulation;

  public function __destruct() {
    
  }


  // Getters:
  
  public function getTravelCode(): string {
    return $this->travel_code;
  }
  
  public function getFlight(): Flight {
    return $this->flight;
  }
  
  public function getDate(): DateTime {
    return $this->date;
  }
  
  public function getTravelPlane(): Airplane {
    return $this->travel_plane;
  }
  
  public function getAvailableSeats(): array {
    return $this->available_seats;
  }
  
  public function getSeatPrice(): int {
    return $this->seat_price;
  }
  
  public function getTripulation(): array {
    return $this->tripulation;
  }
  
  // Setters:
  
  public function setTravelCode(string $travel_code): void {
    $this->travel_code = $travel_code;
  }
  
  public function setFlight(Flight $flight): void {
    $this->flight = $flight;
  }
  
  public function setDate(DateTime $date): void {
    $this->date = $date;
  }
  
  public function setTravelPlane(Airplane $travel_plane): void {
    $this->travel_plane = $travel_plane;
  }
  
  public function setAvailableSeats(array $available_seats): void {
    $this->available_seats = $available_seats;
  }
  
  public function setSeatPrice(int $seat_price): void {
    $this->seat_price = $seat_price;
  }
  
  public function setTripulation(array $tripulation): void {
    $this->tripulation = $tripulation;
  }

  //methods
  static public function getFilename() 
  {
      return get_called_class()::$local_filename;
  }
    
  public function setTravelCode(string $p_travel_code): string {
    return $this->travel_code = flight_code()."-".sizeof($p_flight_history)+1;
  }

  public function buy_seat(Ticket $ticket, int $num) : void{ // Recebe um Ticket e coloca na posição do assento na available seats
    for($i=0;$i<sizeof($available_seats);$i++){
      if($available_seat[i] == 0 && $i==$num){ //Checo se ta available e se o valor é igual ao numero do assento colocado pelo cliente, o valor padrão de vazio para inteiro é 0;
      $available_seat[$i] = 1;
      $this->setSeat($i);                            
      }else{
        throw Exception;
      }
    }
  }

  public function add_mileage(int $p_mileage_points) : void
  { // Anda no array de Tickets e adiciona pontos de milhagem para o passageiro que o Ticket aponta
   // available_seats is an array of ticket objects.
    for($i=0; $i < sizeof($available_seats); $i++)
    {
      if($available_seat[$i] != 0)  //Se o assento tiver ocupado, procuro o passageiro que possui o ticket desse assento
      {
        $ticket = $available_seat[$i]; //isso aqui vai atribuir o objeto ticket a variavel ticket, a partir dai conseguimos usar o Passenger que existe dentro desse objeto
                                      // e adicionar as milhas
        
// Se o passageiro for VIP, ele receberá uma certa quantidade de pontos. Caso contrário, receberá outro valor.

      }
    }
}
  
  public function board_register(Ticket $ticket) {

    $input = readline();
    if($input == "Passenger inside the plane"){
      $ticket->setStatus(ticket_status::board_plane);
    }
    else
    {
      $ticket->setStatus(ticket_status::no_show);
    }
  }
}  
?>