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

- flight_code: string
- company: Flight_company
- departure: Airport
- arrival: Airport
- time: DateTime HORA QUE ACONTECE O VOO
- airplane: Airplane
- weekly_frequency: array<bool> ARRAY QUE CADA POSIÇAO (0 A 6) É UM DIA DA SEMANA - TRUE = TEM O VOO NAQUELE DIA
- duration: int
- ticket_price: int
- travel_history: Travel
- next_travels: array<Travel>
- active:bool

+ set_flight_code(): string SETA O CODE DO FLIGHT CONFORME PEDIDO PELO PROFESSOR
+ create_next_travels(): void SE O VOO TÁ ATIVO, CRIA AS TRAVELS PARA OS PROXIMOS 30 DIAS - NOTE QUE DEVE ANALISAR A FREQUENCIA SEMANAL

*/

include_once("Global.php");


class Flight extends Persist { 

  //Attributes

  private string $flight_code;
  private Flight_company $company;
  private Airport $departure;
  private Airport $arrival;
  private DateTime $time;
  private Airplane $airplane;
  private array $weekly_frequency; // Dias da semana (0=SEGUNDA a 6=SÁBADO) / true = ocorre vôo no dia
  private int $duration;
  private int $ticket_price;
  private array $flight_history;
  private array $next_travels;
  private bool $active;
  protected static $local_filename = "Flight.txt";


  // Constructor and destructor

  public function __construct(
    string $f_flight_code,
    Flight_company $f_company,
    Airport $f_departure,
    Airport $f_arrival,
    DateTime $f_time,
    Airplane $f_airplane,
    array $f_weekly_frequency,
    int $f_duration,
    int $f_ticket_price,
    bool $f_active,
    ){ 
      $this->flight_code = this->set_flight_code($f_company);
      $this->company = $f_company;
      $this->departure = $f_departure;
      $this->arrival = $f_arrival;
      $this->time = $f_time;
      $this->airplane = $f_airplane;
      $this->weekly_frequency = $f_weekly_frequency;
      $this->duration = $f_duration;
      $this->ticket_price = $f_ticket_price;
      $this->$travels;
      $this->active = $f_active;
  }

  public function __destruct() {
    
  }

  
  // Getters e setters

  public function getFlightCode() : string {
    return $this->flight_code;
  }

  public function getCompany() : Flight_company {
    return $this->company;
  }

  public function getDeparture() : Airport {
    return $this->departure;
  }

  public function getArrival() : Airport {
    return $this->arrival;
  }

  public function getTime() : DateTime {
    return $this->time;
  }

  public function getAirplane() : Airplane {
    return $this->airplane;
  }

  public function getWeeklyFrequency() : array {
    return $this->weekly_frequency;
  }

  public function getDuration() : int {
    return $this->duration;
  }

  public function getTicketPrice() : int {
    return $this->ticket_price;
  }

  public function getTravels() : array {
    return $this->travels;
  }

  public function getActive() : bool {
    return $this->active;
  }



  public function setFlightCode( string $f_flight_code) : void {
    $this->flight_code = $f_flight_code;
  }

  public function setCompany(Flight_company $f_company) : void {
    $this->company = $f_company;
  }

  public function setDeparture(Airport $f_departure) : void {
    $this->departure = $f_departure;
  }

  public function setArrival(Airport $f_arrival) : void {
    $this->arrival = $f_arrival;
  }

  public function setTime(DateTime $f_time) : void {
    $this->time = $f_time;
  }

  public function setAirplane(Airplane $f_airplane) : void {
    $this->airplane = $f_airplane;
  }

  public function setWeeklyFrequency(array $f_weekly_frequency) : void {
    $this->weekly_frequency = $f_weekly_frequency;
  }

  public function setDuration(int $f_duration) : void {
    $this->duration = $f_duration;
  }

  public function setTicketPrice(int $f_ticket_price) : void {
    $this->ticket_price = $f_ticket_price;
  }

  public function setTravels(array $f_travels) : void {
    $this->travels = $f_travels;
  }
  
  public function getActive(bool $f_active) : void {
    $this->active = $f_active;
  }


  // Methods
  static public function getFilename() 
  {
      return get_called_class()::$local_filename;
  }

  public function set_flight_code(Flight_company $f_company) : string {
    string $posicao = sprintf('%04d', array_search('$this', '$f_company.getFlights');
    return "$f_company.getShortName()" . "-" . "posicao";
  }

  static public function getFilename() 
  {
      return get_called_class()::$local_filename;
  }

  public function create_next_travels() : void {
    for ($days_to_add=0; $days_to_add<=30; $days_to_add++){
      $date = new DateTime();
      $date->add(new DateInterval('P'. $days_to_add . 'D'));
      $day_of_week = $date->format('N');
      if($this->weekly_frequency(intval($day_of_week) - 1) == true){
        for($i = 0; $i < count($this.getTravels()); $i++){
          if($this->getTravels[$i].getDate() == $date){
            break;
          }else{
            $new_travel = new Travel($this, $date);
            array_push($this.travels, $new_travel);
            break;
          }
        }
      }
    }
  }
  

/*

  public function create_next_travels () : void {
     //DEVE CRIAR OS VOOS DOS PRÓXIMOS 30 DIAS (ATENDENDO Á FREQUENÊNCIA)
  }

  public function save_flight(string $p_flight_code,Flight_company $p_company,Airport $p_airport1,Airport $p_airport2,DateTime $p_DateTime) :string
  {
    //Função que verifica se está dentro do prazo de 30 dias
    
    $current_date = new DateTime();
    $datetime1 = $p_DateTime;
    $interval = $datetime1->diff($current_date);

    if($interval->format('%a')>30){
      echo "Erro, a data a ser registrada é inválida. Tente novamente com                uma data válida.";
      throw new Exception;
      }

    return $flight_info = "Voo " . $this->flight_code . " da " . $p_company->name . ", entre "
      . $p_airport1->short_name . " e " . $p_airport2->short_name . ", executado no dia " . $p_DateTime . ".";
  }

*/
};
?>