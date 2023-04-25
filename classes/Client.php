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

- name: string
- last_name: string
- id: string
- tickets: array<Tickets>

+ purchase_ticket(): Ticket
+ change_flight(Flight): void DEPENDE DE VIP
+ cancel_flight(Flight): void DEPENDE DE VIP
+ check-in(Ticket): void DEVE CHAMAR A FUNÇÃO DO TICKET QUE ALTERA SEU ENUM PASSADO CHECKIN COMO PARAMETRO

*/

include_once("Global.php")

class Client extends Persist {
    // Attributes
    private string $name;
    private string $last_name;
    private string $id;
    private array $tickets;
    protected static $local_filename = "Client.txt";
    

    // Constructor
    public function __construct(string $p_name, string $p_last_name, string $p_id) 
    {
        $this->name = $p_name;
        $this->last_name = $p_last_name;
        $this->id = $p_id;
        $this->tickets = array();
    }
    
    public function __destruct() 
  {
    
  }

    // Getters
    public function getName(){
        return $this->name;
    }
    
    public function getLastName(): string {
        return $this->last_name;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getTickets(){
        return $this->tickets;
    }
    
    // Setters
    public function setName(string $name): void {
        $this->name = $name;
    }
    
    public function setLastName(string $last_name){
        $this->last_name = $last_name;
    }
    
    public function setId(string $id): void {
        $this->id = $id;
    }
    
    public function setTickets(array $tickets){
        $this->tickets = $tickets;
    }
    // Methods
  static public function getFilename() 
  {
      return get_called_class()::$local_filename;
  }
    public function purchase_ticket(string $p_name, string $p_last_name, string $p_id, flight_Company $p_flight_company, bool $p_vip_status)
  {     
        //IMPLEMENTAR LOGICA DOS AVAILABLE SEATS AQUI
        $passenger_seat = intval(readline("Choose seat: "));
        
        $ticket = new Ticket($passenger_seat, $this,"3232");
        if ($p_vip_status){
          $luggage_number = min((int)readline("The selected passenger is a VIP, you get one free luggage and a 50% discount. Choose how many luggage franchises you want(up to 3)."), 3);
          $luggage_price = $p_flight_company->getLuggagePrice();
          if ($luggage_number > 0)
          {
            $total_cost = ($luggage_price * 0.5) * ($luggage_number - 1);
          }
          else
          {
            $total_cost = 0;
          }
          $ticket->setLugaggeFranchise($luggage_number + 1);
          array_push($this->tickets, $ticket);
        else
        {
          $luggage_number = min((int)readline("How many luggage franchises(0 up to 3)?"), 3);
          $luggage_price = $p_flight_company->getLuggagePrice();
          $total_cost = $luggage_price * $luggage_number;
          $ticket->setLugaggeFranchise($luggage_number);
          array_push($this->tickets, $ticket);
        }
    
    }
};
