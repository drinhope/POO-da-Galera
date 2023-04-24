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

- VIP: bool
- name: string
- last_name: string
- id: sreing
- CPF: string
- nationality: string
- birth_date: DateTime
- email: string
- tickets_history: array<Ticket> TODOS OS TICKETS QUE ELE JA VIAJOU


+ birth_date_validation (string):bool
+ cpf_validation (string):bool
+ email_validation (string):bool

*/

class Passenger {
    //Attributes
    private string $CPF;
    private string $nationality;
    private DateTime $birth_date;
    private string $email;
    private bool $VIP;
    private array $ticket_history;

    // Constructor
    public function __construct(string $p_CPF, string $p_nationality, DateTime $p_birth_date, string $p_email, bool $p_VIP, array $p_ticket_history) {
        $this->CPF = $p_CPF;
        $this->nationality = $p_nationality;
        $this->birth_date = $p_birth_date;
        $this->email = $p_email;
        $this->VIP = $p_VIP;
        $this->ticket_history = $p_ticket_history;
    }
  
  public function __destruct() 
  {
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
function validateCPF(string $p_cpf): bool {
  //Remove non-digit inputs do parametro
    $p_cpf = preg_replace('/\D/', '', $p_cpf);

    // Check if the CPF has 11 digits
    if (strlen($p_cpf) != 11) {
        return false;
    }

    // Confere se o CPF nao é um numero invalido conhecido
    if (in_array($p_cpf, ['00000000000', '11111111111', '22222222222', '33333333333', '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999'])) {
        return false;
    }

    // Calcula o primeiro digito de verificação
    $sum = 0;
    for ($i = 0; $i < 9; $i++) {
        $sum += (int) $p_cpf[$i] * (10 - $i);
    }
    $digit1 = (($sum % 11) < 2) ? 0 : (11 - ($sum % 11));

    // Calcula o segundo digito de verificação
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        $sum += (int) $p_cpf[$i] * (11 - $i);
    }
    $digit2 = (($sum % 11) < 2) ? 0 : (11 - ($sum % 11));

    // Confere se os digitos de verificação computados se igualam ao input
    if ($digit1 == (int) $p_cpf[9] && $digit2 == (int) $p_cpf[10]) {
        return true;
    } else {
        return false;
    }
}

?>