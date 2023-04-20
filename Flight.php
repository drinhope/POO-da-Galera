<?php
include_once("Flight_Company");

class Flight {
  //attributes
  private string $flight_code;
  private Airport $departure;
  private Airport $arrival;
  private DateTime $time;
  private Flight_company $company;
  private Airplane $airplane;
  private array $weekly_frequency; //Ideia de struct substituida: 7 posições 0...6 (dias da semana)
  private int $duration;
  private array $flight_history;
  private array $next_travels;
  private bool $active;
  private array $seats;

  // Constructor
  public function __construct(
    string $p_flight_code, 
    Airport $p_departure, 
    Airport $p_arrival, 
    DateTime $p_time, 
    Flight_company $p_company, 
    Airplane $p_airplane, 
    array $p_weekly_frequency, 
    int $p_duration, 
    array $p_flight_history,
    array $p_next_travels,
    bool $p_active,
    array $p_seats
  ) {
    $this->flight_code = $p_flight_code;
    $this->departure = $p_departure;
    $this->arrival = $p_arrival;
    $this->time = $p_time;
    $this->company = $p_company;
    $this->airplane = $p_airplane;
    $this->weekly_frequency = $p_weekly_frequency;
    $this->duration = $p_duration;
    $this->flight_history = $p_flight_history;
    $this->seats = $p_seats;
    $this->active = $p_active;
    $this->next_travels = $p_next_travels; //NA VERDADE, DEVE CHAMAR A FUNÇÃO QUE CRIA OS TRAVELS (SE ACTIVE = TRUE)
  }

  // Getters
  public function getFlightCode(): string {
    return $this->flight_code;
  }

  public function getDeparture(): Airport {
    return $this->departure;
  }

  public function getArrival(): Airport {
    return $this->arrival;
  }

  public function getTime(): DateTime {
    return $this->time;
  }

  public function getCompany(): Flight_company {
    return $this->company;
  }

  public function getAirplane(): Airplane {
    return $this->airplane;
  }

  public function getWeeklyFrequency(): array {
    return $this->weekly_frequency;
  }

  public function getDuration(): int {
    return $this->duration;
  }

  public function getFlightHistory(): array {
    return $this->flight_history;
  }

  // Setters
  public function setDeparture(Airport $p_departure): void {
    $this->departure = $p_departure;
  }

  public function setArrival(Airport $p_arrival): void {
    $this->arrival = $p_arrival;
  }

  public function setTime(DateTime $p_time): void {
    $this->time = $p_time;
  }

  public function setCompany(Flight_company $p_company): void {
    $this->company = $p_company;
  }

  public function setAirplane(Airplane $p_airplane): void {
    $this->airplane = $p_airplane;
  }

  public function setWeeklyFrequency(array $p_weekly_frequency): void {
    $this->weekly_frequency = $p_weekly_frequency;
  }

  public function setDuration(int $p_duration): void {
    $this->duration = $p_duration;
  }

  public function setFlightHistory(array $p_flight_history): void {
    $this->flight_history = $p_flight_history;
  } 
  // Methods
  public function change_airplane(Airplane $p_new_airplane){
    $p_new_airplane = readline('Escolha o novo avião:');
    $this->airplane = $p_new_airplane;
  }

  public function set_flight_code(Flight_company $p_company) : string
    {
      return $this->flight_code = $p_company->short_name . rand(1000, 9999);
      // ERRADO, DEVE SER NOME DA COMPANHIA CONCATENADO COM SIZEOF(ARRAY DE TRAVELS DA COMPANHIA) + 1
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