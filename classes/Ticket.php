<?php

include_once("Global.php");

class Ticket extends Persist {
  
  enum ticket_status {
    case ticket_acquired;
    case ticket_cancelled;
    case check_in;
    case board_plane;
    case no_show;
      public function status(): string
      {
        return match($this) {
            static::ticket_acquired => 'Ticket acquired',
            static::ticket_cancelled => 'Ticket cancelled',
            static::check_in => 'Check-in complete',
            static::board_plane => 'Passenger inside the plane',
            static::no_show => 'Passenger did not check-in and/or board the plane',
        };
      }
    }

//Properties
  private string $ticketcode;
  private Airport $arrival;
  private Airport $departure;
  private Travel $travel;
  private Travel $connection;
  private Client $client;
  private Passenger $passenger;
  private Passenger $passenger_vip;
  private int $value;
  private int $luggage_franchise;
  private int $travel_seat;
  private int $connection_seat;
  private $status;
  protected static $local_filename = "Ticket.txt";


//Constructor
  public function __construct(string $p_ticketcode, Airport $p_arrival, Airport $p_departure, 
                              Travel $p_travel, Travel $p_connection = NULL , Client $p_client, 
                              Passenger $p_passenger = NULL, Passenger_VIP $p_passenger_vip = NULL, 
                              int $p_value, int $p_luggage_franchise = 0, int $p_t_seat, int $p_c_seat){
      
    $this->vip_status = $p_vip_status;
    $this->passenger_vip = $p_passenger_vip;
    $this->passenger = $p_passenger;
    $this->ticketcode = this->$setTicketCode;
    $this->arrival = $p_arrival;
    $this->departure = $p_departure;
    $this->travel = $p_travel;
    $this->connection = $p_connection;
    $this->client = $p_client;
    $this->value = $p_value;
    $this->luggage_franchise = $p_luggage_franchise;
    $this->travel_seat = $p_travel_seat;
    $this->connection_seat = $p_connection_seat;
    $this->connections = $p_connections;
    $this->flights = $p_flights;
  }

//Destructor
  public function __destruct() {
  }

//Getters
  public function getTicket_code():string{
    return $this->ticketcode;
  }

  public function getArrival():Airport{
    return $this->arrival;
  }

  public function getDeparture():Airport{
    return $this->departure;
  }

  public function getTravel():Travel{
    return $this->travel;
  }

  public function getConnection():Travel{
    return $this->connection;
  }

  public function getClient():Client{
    return $this->client;
  }
  
  public function getPassenger_vip():Passenger_VIP{
    return $this->passenger_vip;
  }

  public function getPassenger():Passenger{
    return $this->passenger;
  }

  public function getValue():int{
    return $this->value;
  }

  public function getLuggage_franchise():int{
    return $this->seat;
  }

  public function getTravel_seat():int{
    return $this->seat;
  }

  public function getConnection_seat():int{
    return $this->seat;
  }

//Setters
  public function setTicket_code(string $p_ticket_code): void {
    $this->ticketcode = $p_ticket_code;
  }

  public function setArrival(Airport $p_arrival): void {
      $this->arrival = $p_arrival;
  }

  public function setDeparture(Airport $p_departure): void {
      $this->departure = $p_departure;
  }

  public function setTravel(Travel $p_travel): void {
      $this->travel = $p_travel;
  }

  public function setConnection(Travel $p_connection): void {
      $this->connection = $p_connection;
  }

  public function setClient(Client $p_client): void {
      $this->client = $p_client;
  }

  public function setPassenger_vip(Passenger_VIP $p_passenger_vip): void {
      $this->passenger_vip = $p_passenger_vip;
  }

  public function setPassenger(Passenger $p_passenger): void {
      $this->passenger = $p_passenger;
  }

  public function setValue(int $p_value): void {
      $this->value = $p_value;
  }

  public function setLuggage_franchise(int $p_luggage_franchise): void {
      $this->luggage_franchise = $p_luggage_franchise;
  }

  public function setTravel_seat(int $p_travel_seat): void {
      $this->travel_seat = $p_travel_seat;
  }

  public function setConnection_seat(int $p_connection_seat): void {
      $this->connection_seat = $p_connection_seat;
  }


//Methods
  static public function getFilename()  {
      return get_called_class()::$local_filename;
  }
  public function creat_ticket_code(string $travel_code, int $seat) : string{
    return this->ticket_code = travel_code().str_pad ($seat, 3, "0", STR_PAD_LEFT);
  }

  public function full_price() :int{
    return $this->travel.getSeatPrice() +
           $this->connection.getSeatPrice() +
           $this->getLuggage_franchise() * $this->travel.getFlight().getCompany().getLuggagePrice();
  }

  public function change_status() :void{
    $input = readline();
    if($input == "Passenger inside the plane"){
      $ticket->setStatus(ticket_status::board_plane);
    }
    if($input == "Passenger cancelled the flight"){
      $ticket->setStatus(ticket_status::ticket_cancelled);
    }
    if($input == "Passenger checked in"){
      $ticket->setStatus(ticket_status::check_in);
    }
    else
    {
      $ticket->setStatus(ticket_status::no_show);
    }
  }

  public function passenger_is_vip(): bool{ //Retorna se o passageiro é vip
    if($this->getPassenger_vip == null){
      return false;
    }else{
      return true;
    }
  }

  
}
?>