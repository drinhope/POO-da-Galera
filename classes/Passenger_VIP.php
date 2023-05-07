<?php

include_once("Global.php")

class Passenger_VIP extends Passenger {
  //Attributes
  private Mileage_Category $mileage_category;
  private array $mileage_points;
  private DateTime $upgrade_date;
  
  // Constructor
  public function __construct(string $p_name, string $p_last_name, string $p_id, string $p_CPF, string $p_nationality, DateTime $p_birth_date, string $p_email, bool $p_VIP, Mileage_Category $p_mileage_category, DateTime $p_upgrade_date) {
    parent::__construct($p_name, $p_last_name, $p_id, $p_CPF, $p_nationality, $p_birth_date, $p_email, $p_VIP, $p_ticket_history);
    $this->mileage_category = $p_mileage_category;
    $this->mileage_points = array();
    $this->upgrade_date = $p_upgrade_date;
  }

  //Destructor
  public function __destruct() {
    // Perform any necessary cleanup here
  }

  //Getters
  public function getMileageCategory(): Mileage_Category {
    return $this->mileage_category;
  }

  public function getMileagePoints(): array {
    return $this->mileage_points;
  }

  public function getUpgradeDate(): DateTime {
    return $this->upgrade_date;
  }

  //Setters
  public function setMileageCategory(Mileage_Category $mileage_category): void {
    $this->mileage_category = $mileage_category;
  }

  public function setMileagePoints(array $mileage_points): void {
    $this->mileage_points = $mileage_points;
  }

  public function setUpgradeDate(DateTime $upgrade_date): void {
    $this->upgrade_date = $upgrade_date;
  }
}
}