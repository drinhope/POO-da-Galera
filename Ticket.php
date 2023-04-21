
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


+ set_ticket_code(): string TRAVEL CODE + SEAT (3 DIGITOS)
+ buy_luggage_franchise(int): void
+ change_status(string): void MUDA O ENUM DE STATUS DO TICKET
+ add_prices (): void SOMA TRAVEL + CONNECTION + LUGGAGE

*/


<?php

include_once("Flight.php");

class Ticket {
  
  enum passenger_status
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
              static::board_plane => 'Passenger aboard the plane',
              static::no_show => 'Passenger did not check-in and/or board the plane',
          };
      }
  }
    //Properties
    private int $luggage_franchise;
    private Passenger $passenger;
    private Client $client;
    private Travel $travel;
    private int $travel_seat;
    private Travel $connection;
    private int $connection_seat;
    private string $ticketcode;
    private array $connections;
    private array $flights;
    // private array $flights;

    //Constructor
    public function __construct(int $p_luggage_franchise = 0, int $p_passenger_seat, Client $p_client, int $p_ticketcode, array $p_connections = [], array $p_flights = []) {
        $this->lugagge_franchise = $p_luggage_franchise;
        $this->passenger_seat = $p_passenger_seat;
        $this->client = $p_client;
        $this->ticketcode = $p_ticketcode;
        $this->connections = $p_connections;
        $this->flights = $p_flights;
    }

 public function buy_luggage(int $p_luggage_number, int $luggage_price){
     if ($p_luggage_number > 0  && $p_luggage_number <= 3){
       $this->$luggage_franchise += p_luggage_number;
     }else{
       echo "Invalid quantity.";
     }       
    }

  public function fuse_tickets(array $p_connections, array $p_flights){
  if (sizeof($p_connections) > 0 && sizeof($p_flights)>1){
    $p_fused_prices=(111+222);
    $p_fused_info="Primeiro voo:".$p_flight_info[1]." Segundo voo:".$p_flight_info[2];
    }
  }

    //Getters
    public function getLuggageFranchise(): int {
        return $this->lugagge_franchise;
    }

    public function getPassengerSeat(): int {
        return $this->passenger_seat;
    }

    public function getClient(): Client {
        return $this->client;
    }

    public function getTicketcode(): int {
        return $this->ticketcode;
    }

    public function getConnections(): array {
        return $this->connections;
    }

    //Setters
    public function setLugaggeFranchise(int $p_lugagge_franchise) {
        $this->lugagge_franchise = $p_lugagge_franchise;
    }

    public function setPassengerSeat(int $p_passenger_seat) {
        $this->passenger_seat = $p_passenger_seat;
    }

    public function setClient(Client $p_client) {
        $this->client = $p_client;
    }

    public function setTicketcode(int $p_ticketcode) {
        $this->ticketcode = $p_ticketcode;
    }

    public function setConnections(array $p_connections) {
        $this->connections = $p_connections;
    }
}
?>