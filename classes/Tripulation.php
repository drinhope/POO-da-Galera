<?php
include_once("Global.php")
class Tripulation extends Persist {
  
  //Atributtes
  
  private string $job_title;
  private int $cht; 
  private string $address;
  private Flight_company $company;
  private Datetime $expiration_date;
  private Airport $bate_airport

  //Constructor
  
  public function __construct(
    string $p_job_title,
    int $p_cht,
    string $address,
    Flight_company $p_company,
    Datetime $p_expiration_date,
    Airport $p_base_airport
  ) {
  $this->job_title = $p_job_title;
  $this->cht = $p_cht;
  $this->address = $address;
  $this->company = $p_company;
  $this->expiration_date = $p_expiration_date;
  $this->base_airport = $p_base_airport;
  }

  //Destructor
  public function __destruct() {
    
  }

  // Getters:
  
  public function getJobTitle(): string {
    return $this->job_title;
  }
  
  public function getCht(): int {
    return $this->cht;
  }
    
  public function getAdress(): string {
    return $this->address;
  }
    
  public function getCompany(): Flight_company {
    return $this->company;
  }
    
  public function getExpirationDate(): Datetime {
    return $this->expiration_date;
  }
  public function getBaseAirport(): Airport {
    return $this->base_airport;
  }
  //Setters
    
  public function setJobTitle(string $job_title): void {
    $this->job_title = $job_title;
  }
  public function setCht(int $cht): void {
    $this->cht = $cht;
  }
  public function setAddress(string $address): void {
    $this->address = $address;
  }
  public function setCompany(Flight_company $company): void {
    $this->company = $company;
  }
  public function setExpirationDate(Datetime $expiration_date): void {
    $this->expiration_date = $expiration_date;
  }
 
  public function setBaseAirport(string $base_airport): void {
    $this->base_airport = $base_airport;
  }

  //Methods

}
?>