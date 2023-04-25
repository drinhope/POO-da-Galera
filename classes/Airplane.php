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

- manufacturer: string
- model: string
- passenger_capacity: int
- cargo_capacity: int
- plane_register: string

+ register_validation (string):bool FUNÇÃO QUE VALIDA O REGISTER CONFORME PEDIDO PELO PROFESSOR

*/

include_once("Global.php")

class Airplane extends Persist {
  //Attributes
  private string $manufacturer;
  private string $model;
  private int $passenger_capacity;
  private int $cargo_capacity;
  private string $plane_register;
  private string $short_name;
  protected static $local_filename = "Airplane.txt";
 
  //Constructor
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

  //Destructor 
  
  public function __destruct() {             
            
  }
  //Getters
  public function get_manufacturer() : string {
    return $this->manufacturer;
  }

  public function get_model() : string {
    return $this->model;
  }

  public function get_passenger_capacity() : int {
    return $this->passenger_capacity;
  }

  public function get_cargo_capacity() : int {
    return $this->cargo_capacity;
  }

  public function get_plane_register() : string {
    return $this->plane_register;
  }
    
  public function get_short_name() : string {
    return $this->short_name;
  }
  
  //Setters
  
  public function set_manufacturer($p_manufacture) : void   {
    $this->manufacturer = $p_manufacture;
  }
  
  public function set_model($p_model) : void {
    $this->model = $p_model;
  }

  public function set_passenger_capacity($p_passenger_capacity) : void {
    $this->passenger_capacity = $p_passenger_capacity;
  }
  
  public function set_cargo_capacity($p_cargo_capacity) : void {
    $this->cargo_capacity = $p_cargo_capacity;
  }
  
  public function set_plane_register($p_plane_register) : void {
    $this->plane_register = $p_plane_register;
  }

  public function set_short_name($p_short_name) : void {
    if ($this->sn_validation($p_short_name)) {
      $this->short_name = $p_short_name;
    } else {
      throw new Exception("Error! This Airplane Short Name is invalid.");
    }
  }

  //Methods 
  static public function getFilename() 
  {
      return get_called_class()::$local_filename;
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