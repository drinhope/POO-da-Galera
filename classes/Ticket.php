<?php
/*
-------------------------------- INSTRUÇÕES --------------------------------

Para melhorar a organização , siga o exemplo do arquivo Airport.php 
e ordene o código em: atributos, construtor, destrutor e métodos (em 
ordem getters, setters, funções), indicando com comentários a localização 
de cada parte do código. Além disso, comente as funções e atributos, 
explicando sucintamente a sua funcionalidade e observações.

Também se atente às TABULAÇÔES!!

Para este arquivo, segundo a UML, é necessário:

- ticket_code: int 
- arrival: Airport
- departure: Airport
- travel: Travel
- connection: Travel
- client: Client
- passenger: Passenger
- value: int PASSAGEN TRAVEL + CONEXAO + LUGGAGE
- seat: int
- connection_seat: int
- luggage_franchise: int
- ticket_status: enum; POSSIBILIDADES DE ACORDO COM PEDIDO DO PROFESSOR


+ set_ticket_code(): string TRAVEL CODE + SEAT (3 DIGITOS) [X]
+ buy_luggage_franchise(int): void [X]
+ change_status(string): void MUDA O ENUM DE STATUS DO TICKET [X]
+ add_prices (): void SOMA TRAVEL + CONNECTION + LUGGAGE [X]

*/
include_once("Global.php")


class Ticket extends Persist {
  
  enum ticket_status
  {
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
  private int $value;
  private int $luggage_franchise;
  private int $travel_seat;
  private int $connection_seat;
  private array $connections;
  private array $flights;
  private $status;
  protected static $local_filename = "Ticket.txt";

  //Constructor
  public function __construct(string $p_ticketcode, Airport $p_arrival, Airport $p_departure, Travel $p_travel,        Travel $p_connection, Client $p_client, Passenger $p_passenger, int $p_value, int $p_luggage_franchise = 0, int      $p_seat, array $p_connections [], array $p_flights []) {
      
  $this->ticketcode = $p_ticketcode;
  $this->arrival = $p_arrival;
  $this->departure = $p_departure;
  $this->travel = $p_travel;
  $this->connection = $p_connection;
  $this->client = $p_client;
  $this->passenger = $p_passenger;
  $this->value = $p_value;
  $this->luggage_franchise = $p_luggage_franchise;
  $this->travel_seat = $p_travel_seat;
  $this->connection_seat = $p_connection_seat;
  $this->connections = $p_connections;
  $this->flights = $p_flights;
  }

  public function buy_luggage_franchise(int $p_luggage_number){
     if ($p_luggage_number > 0  && $p_luggage_number <= 3){
       $this->$luggage_franchise += $p_luggage_number;
     }else{
       echo "Invalid quantity.";
     }       
  }

  //Getters
  public function getTicketCode():string{
    return this->ticketcode;
  }

  public function getArrival():Airport{
    return this->arrival;
  }

  public function getDeparture():Airport{
    return this->departure;
  }

  public function getClient():Client{
    return this->client;
  }

  public function getPassenger():Passenger{
    return this->passenger;
  }

  public function getValue():int{
    return this->value;
  }

  public function getLuggageFranchise():int{
    return this->luggage_franchise;
  }

  public function getSeat():int{
    return this->seat;
  }

  public function getConnections():array{
    return this->connections;
  }

  public function getFlights():array{
    return this->flights;
  }

  //public function getStatus():enum{
  //  return this->status;
  //}

  //Setters
  public function setArrival(Airport $arrival) {
    $this->arrival = $p_arrival;
  }

  public function setDeparture(Airport $departure) {
    $this->departure = $p_departure;
  }

  public function setTravel(Travel $travel) {
    $this->travel = $p_travel;
  }

  public function setConnection(Travel $connection) {
    $this->connection = $p_connection;
  }

  public function setConnection(Travel $connection) {
    $this->connection = $p_connection;
  }

  public function setClient(Client $client) {
    $this->client = $p_client;
  }

  public function setPassenger(Passenger $passenger) {
    $this->passenger = $p_passenger;
  }

  public function setValue(int $value) {
    $this->value = $p_value;
  }

  public function setLugaggeFranchise(int $lugagge_franchise) {
    $this->lugagge_franchise = $p_lugagge_franchise;
  }

  public function setSeat(int $seat) {
    $this->seat = $p_seat;
  }

  public function setConnections(array $connections) {
    $this->connections = $p_connections;
  }

  public function setFlights(array $flights) {
    $this->flights = $p_flights;
  }

  public function setStatus(ticket_status $status) {
    $this->status = ticket_status::ticket_acquired;
  }

  //Methods
  static public function getFilename()  {
      return get_called_class()::$local_filename;
  }
  public function setTicketCode(string $travel_code, int $seat){
    return this->ticket_code = travel_code().str_pad ( $seat, 3, "0", STR_PAD_LEFT);
  }

  public function addPrices(/*int $travel_price, int $connection_price*/,int $lugagge_franchise, int $lugagge_price){
    return this->value = /*$travel_price + $connection_price() +*/ $lugagge_franchise*$lugagge_price;
  }

  public function change_status() {
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

  
}
?>