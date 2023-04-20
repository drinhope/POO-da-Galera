<?php

class Airport{
//Attributes
private string $short_name;
private string $city;
private string $state;

//Methods
  public function snvalidation($p_short_name): void{
    
    if(strlen($p_short_name) > 3){
        echo "Error! Airport Short Name has invalid length";
      }
        for ($i = 0; $i < strlen($p_string); $i++) {  
          $char[$i] = $p_short_name[$i];
        if (!ctype_alpha($char)) {
          echo "Error! Airport Short Name contains numbers";
        }
        }
  }
  
  public function __construct(string $p_short_name, string $p_city, string  $p_state){  
    $this->short_name = $p_short_name;
    $this->snvalidation($p_short_name);
    $this->city = $p_city;
    $this->state = $p_state;
  }
  public function getShortName(): string{
    return $this-> short_name;
}

  public function getCity(): string{
    return $this-> city;
  }

  public function getState(): string{
    return $this-> state;
  }

  public function setShortName(string $p_short_name): void {
   $this->short_name = $p_short_name;
  }

  public function setCity(string $p_city): void  {
    $this->short_name = $p_city;
  }

  public function setState(string $p_state): void  {
    $this->short_name = $p_state;
  }

}
?>
