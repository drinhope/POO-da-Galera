<?php
/*Mateus*/

class Passenger{
  
  
 //Attributes
  private string $CPF;
  private string $nationality;
  private DateTime $birth_date;
  private string $email;
  private bool $VIP;
  private array $ticket_history;


// Constructor
  public function __construct(string $p_CPF,string $p_nationality, DateTime $p_birth_date, string $p_email, bool $p_VIP,array $p_ticket_history){

  //Methods

  public function birth_date_validation(DateTime $p_birth_date, int $min_age = 0): bool
  {
    $currentDate = new DateTime();
    $age = $currentDate->diff($birth_date)->y;

    return $age >= $min_age; // Return true if age is greater than or equal to the minimum age, false otherwise
  }
    
  public function email_validation(string $p_email): bool
  {
    if (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", $p_email)) 
    {
    return false;
    } else
    {
      return true;
    }
  }
    
  public function cpf_validation (string $p_CPF) : bool {
  
  $this->CPF = $p_CPF;
  $this->nationality = $p_nationality;
  
  //public function birth_date_validation( DateTime $p_birth_date){
  //   check()
  // }
    
  $this->birth_date = $p_birth_date;
  
  /*public function email_validation (string $p_email){
    
  }*/
  
  $this->email = $p_email;
  $this->VIP = $p_VIP;
  $this->ticket_history = $p_ticket_history;
}

  
// Getters
  public function getCPF(): string {
    return $this->CPF;
  }

  public function getNationality(): string {
    return $this->nationality;
  }

  public function getBirthDate(): DateTime {
    return $this->birth_date;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function isVIP(): bool {
    return $this->VIP;
  }

  public function getTicketHistory(): array {
    return $this->ticket_history;
  }

  // Setters
  public function setCPF(string $CPF): void {
    $this->CPF = $CPF;
  }

  public function setNationality(string $nationality): void {
    $this->nationality = $nationality;
  }

  public function setBirthDate(DateTime $birth_date): void {
    $this->birth_date = $birth_date;
  }

  public function setEmail(string $email): void {
    $this->email = $email;
  }

  public function setVIP(bool $VIP): void {
    $this->VIP = $VIP;
  }

  public function setTicketHistory(array $ticket_history): void {
    $this->ticket_history = $ticket_history;
  }
};
?>