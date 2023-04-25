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

- short_name: string
- city: string
- state: string

+ sn_validation (string):bool FUNÇÃO QUE VALIDA O SHORTNAME CONFORME PEDIDO PELO PROFESSOR

*/
include_once("Global.php");

class Airport extends Persist {

  //Attributes
  
  private string $short_name;
  private string $city;
  private string $state;
  protected static $local_filename = "Airport.txt";

  //Constructor and drestructor
  
  public function __construct(string $p_short_name, string $p_city, string  $p_state){  
    $this->short_name = $p_short_name;
    $this->snvalidation($p_short_name);
    $this->city = $p_city;
    $this->state = $p_state;
  }

  public function __destruct() {
    
  }


  //Getters e setters

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


  //Methods

  static public function getFilename() 
  {
      return get_called_class()::$local_filename;
  }
  
  public function setState(string $p_state): void  {
    $this->short_name = $p_state;
  }
  public function snvalidation($p_short_name): void{
    
    if(strlen($p_short_name) > 3){
        echo "Error! Airport Short Name has invalid length";
      }
        for ($i = 0; $i < strlen($p_short_name); $i++) {  
          $char[$i] = $p_short_name[$i];
        if (!ctype_alpha($char)) {
          echo "Error! Airport Short Name contains numbers";
        }
        }
  }

}

?>
