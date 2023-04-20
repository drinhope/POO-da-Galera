<?php

include_once("Flight_company.php");

class Client {
    // Attributes
    private string $name;
    private string $last_name;
    private string $id;
    private array $tickets;
    

    // Constructor
    public function __construct(string $p_name, string $p_last_name, string $p_id) {
        $this->name = $p_name;
        $this->last_name = $p_last_name;
        $this->id = $p_id;
        $this->tickets = array();
    }

    // Methods
    public function purchase_ticket(string $p_name, string $p_last_name, string $p_id, flight_Company $p_flight_company, bool $p_vip_status)
  {     
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

  // Getters and Setters 
    public function getName(){
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getLastName(): string {
        return $this->last_name;
    }

    public function setLastName(string $last_name){
        $this->last_name = $last_name;
    }

    public function getId(){
        return $this->id;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function getTickets(){
        return $this->tickets;
    }

    public function setTickets(array $tickets){
        $this->tickets = $tickets;
    }
};
