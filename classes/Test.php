<?php

include_once("Flight.php");
include_once("Airplane.php");
include_once("Travel.php");
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

// Teste da Travel
   $flight = new Flight ("1234","Aeroporto A","Aeroporto B","");
   $date = new Datetime();
   $airplane = new Airplane('Boeing','737','300','600','1234', 'PR-GR1U');
 $array_ = array();
 $tripulation = array();
 $travel = new Travel ("1234",$flight,$date,$airplane,$array_, 200,$tripulation);
  print_r($travel);
?>