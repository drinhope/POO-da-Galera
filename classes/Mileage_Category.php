<?php

include_once("Global.php")

class Mileage_Category extends Persist{
  //Attributes
  
  private array $passengers;

  public function __construct(array $m_passengers []){
    $this->passengers=$m_passengers;
  }

  //Destructor
  
  public function __destruct() {
  }

  //Getters
  
  public function getPassengers():array{
    return $this->passengers;
  }

  //Setters

  public function setPassengers(array $m_passengers):void{
    $this->passengers = $m_passengers;
  }

  
}