/*
-------------------------------- INSTRUÇÕES --------------------------------

Para melhorar a organização , siga o exemplo do arquivo Airport.php 
e ordene o código em: atributos, construtor, destrutor e métodos (em 
ordem getters, setters, funções), indicando com comentários a localização 
de cada parte do código. Além disso, comente as funções e atributos, 
explicando sucintamente a sua funcionalidade e observações.

Também se atente às TABULAÇÔES!!

Para este arquivo, segundo a UML, é necessário:

- travel_code: string 
- flight: Flight
- date: DateTime DATA DO VOO
- did_by: Airplane HERDA DE FLIGHT SE O AVIÃO NÃO FOR MUDADO NESTA TRAVEL ESPECÍFICA
- available_seats: array<bool>
- seat_price: int
- luggage_value: int HERDA DA COMPANHIA DO FLIGHT


+ set_travel_code():string FLIGT CODE + 4 DIGITOS (NÚMERO DO VOO REALIZADO)
+ buy_seat(int): void ALTERA AVAILABLE_SEATS
+ check_board(array<int seat>): void RECEBE UM VETOR E COMPARA SE CADA PRA CADA TICKET VENDIDO O PASAGEIRO APARECEU - ALTERANDO O ENUM STATUS

*/

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