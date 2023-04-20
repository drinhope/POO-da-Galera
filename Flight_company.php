
<?php
//CRIAR UM ARRAY DE VOOS DA COMPANHIA
//TEM ERRO NA CRIAÇÃO DE ARRAY AQUI!!!
// HÁ OUTROS PROBLEMAS NO CÓDIGO, LER OS COMENTARIOS
/* Mateus */
class flight_Company{ 
  //Properties
    private string $name;
    private string $code;
    private string $CNPJ;
    private string $short_name;
    private string $company_name;
    private array $airplane_list;
    private int $luggage_price;
  
  //Constructor
    public function __construct(string $p_name, string $p_code, string $p_CNPJ, string $p_short_name, array $p_airplane_list, int $p_luggage_price){
      $this->name = $p_name;
      $this->code = $p_code;
      $this->CNPJ = $p_CNPJ;
      if($this->sn_validation(p_short_name)){
         $this->short_name = $p_short_name;
      }else{
        //ADD MENSAGEM DE ERRO QUE VEM DA EXCEÇÃO
      }
      $this->airplane_list = $p_airplane_list;
      $this->luggage_price = $p_luggage_price;
    }


  
  // Getter methods

    public function getAirplaneList(): array {
    return $this->airplane_list;
  }
  
    public function getLuggagePrice(): int {
    return $this->luggage_price;
  }
  
    public function getName(): string {
      return $this->name;
    }
  
    public function getCode(): string {
      return $this->code;
    }
  
    public function getCNPJ(): string {
      return $this->CNPJ;
    }
  
    public function getShortName(): string {
      return $this->short_name;
    }
  
    // Setter methods
  
    public function setLuggagePrice(int $p_luggage_price): void {
    $this->luggage_price = $p_lugagge_price;;
  }
    public function setAirplaneList(array $p_airplane_list): void {
    $this->airplane_list = $p_airplane_list;
  }
    public function setName(string $p_name): void {
        $this->name = $p_name;
    }
  
    public function setCode(string $p_code): void {
        $this->code = $p_code;
    }
  
    public function setCNPJ(string $p_CNPJ): void {
        $this->CNPJ = $p_CNPJ;
    }
  
    public function setShortName(string $p_short_name): void {
    if ($this->sn_validation($p_short_name)) {
      $this->short_name = $p_short_name;
    } else {
      throw new Exception("Error! This Airplane Short Name is invalid.");
    }
  }
  
  
  //Methods
    public function sn_validation(string $p_short_name){  //Validate the flight company short name
          if(strlen($p_short_name) > 2){
     echo "Error! Airport Short Name has invalid length";
      }
        for ($i = 0; $i < strlen($p_string); $i++) {  
        $char[$i] = $p_short_name[$i];
        if (!ctype_alpha($char)) {
          echo "Error! Airport Short Name contains numbers";
        }
        }               
  }

    function add_airplane(Airplane $p_airplane): void{ //Add one airplane to the company's airplane list
        $airplane_list[] = $p_airplane;
    }

    function remove_airplane(Airplane $p_airplane){ //Remove one airplane from the company's airplane list
      if (($key = array_search($p_airplane, $airplane_list)) !== false) {
        unset($array[$key]);
      }                       
    }

  function view_airplane_list(): void {
    foreach ($this->airplane_list as $key => $airplane) {
        echo "$key = $airplane\n";
    }
}
}; 
  ?>

