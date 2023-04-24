<?php
include_once("Airplane.php");
include_once("Airport.php");
include_once("Flight_company.php");
include_once("Client.php");
include_once("Flight.php");
include_once("Ticket.php");
include_once("Passenger.php");

//Teste da Airplane

  $airplane = new Airplane('Boeing','737','300','600','1234', 'PR-GR1U');
  print_r($airplane);

//Teste da Airport
  
    $airport = new Airport('GR1U', 'Sao Paulo', 'SP');
    print_r($airport);

//Teste da Client

  $client = new Client('Manoel', 'Gomes', '12345678900');
  print_r($client);

//Teste da Flight Company
// Nesse teste, está faltando incluir o airplane_list, que nao está funcionando -- problema com arrays
// Assim, não dá para testar as funções da flight_company
  
  $flight_company = new Flight_company('LATAM Airlines Group', '1234', '56785678567856','LATAM', $airplane ,'80');
  print_r($flight_company);

//Teste da Flight

  $flight = new Flight ("1234","Aeroporto A","Aeroporto B","",);
  print_r($flight);

//Teste da Ticket

  $ticket = new Ticket('11', $client, 'TK000');
  print_r($ticket);

  $ticket.buy_luggage('1','100');
  print_r($ticket);

  //fuse_tickets('1','100'); Essa função será removida na sprint 3

//Teste da Passenger 
  $date_passenger = new DateTime();
  $teste_passenger = array("a","b","c");
  $passenger = new Passenger ("12345678-00","Brasileiro", $date_passenger,     "seila@gmail.com","False",$teste_passenger);
  print_r($passenger);


?>