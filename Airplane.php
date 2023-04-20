<?php
class Airplane {
  //Attributes
  private string $manufacturer;
  private string $model;
  private int $passenger_capacity;
  private int $cargo_capacity;
  private string $plane_register;
  private string $short_name;
 
  //Methods
  public function __construct(string $p_manufacturer, string $p_model, int $p_passenger_capacity, 
  int $p_cargo_capacity, string $p_plane_register, string $p_short_name) {
    $this->manufacturer = $p_manufacturer;
    $this->model = $p_model;
    $this->passenger_capacity = $p_passenger_capacity;
    $this->cargo_capacity = $p_cargo_capacity;
    $this->plane_register = $p_plane_register;
    if ($this->sn_validation($p_short_name)) {
      $this->short_name = $p_short_name;
    } else {
      throw new Exception("Error! This Airplane Short Name is invalid.");
    }
  }
  
  public function get_manufacture() : string {
    return $this->manufacturer;
  }
  
  public function set_manufacture($p_manufacture) : void {
    $this->manufacturer = $p_manufacture;
  }

  public function get_model() : string {
    return $this->model;
  }
  
  public function set_model($p_model) : void {
    $this->model = $p_model;
  }

  public function get_passenger_capacity() : int {
    return $this->passenger_capacity;
  }
  
  public function set_passenger_capacity($p_passenger_capacity) : void {
    $this->passenger_capacity = $p_passenger_capacity;
  }

  public function get_cargo_capacity() : int {
    return $this->cargo_capacity;
  }
  
  public function set_cargo_capacity($p_cargo_capacity) : void {
    $this->cargo_capacity = $p_cargo_capacity;
  }

  public function get_plane_register() : string {
    return $this->plane_register;
  }
  
  public function set_plane_register($p_plane_register) : void {
    $this->plane_register = $p_plane_register;
  }
    
  public function get_short_name() : string {
    return $this->short_name;
  }
  
  public function set_short_name($p_short_name) : void {
    if ($this->sn_validation($p_short_name)) {
      $this->short_name = $p_short_name;
    } else {
      throw new Exception("Error! This Airplane Short Name is invalid.");
    }
  }

  public function __destruct() {             
            
  }
  public function sn_validation($a_short_name) : bool{ //Validate Airplane short name
//tem que fazer o try catch caso a verificacao de errado
    if($a_short_name[0] != 'P'){
      return false;
    }else{
      if($a_short_name[1] != 'T' && $a_short_name[1] != 'R' 
      && $a_short_name[1] != 'P' && $a_short_name[1] != 'S'){
        return false;
      }else{
        if($a_short_name[2] != '-'){
          return false;
        }else{
          for ($i = 3; $i < 5; $i++) {
            if (!ctype_alpha($a_short_name[$i])){
              return false;
            }else
            {
              return true;
            }
          }
        }
      }
    }
  }
};
?>