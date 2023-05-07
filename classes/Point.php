<?php

include_once("Global.php")

class Point extends Persist {
  //Attributes
  private Travel $travel;
  private int $value;
  private DateTime $creation_date;
  private bool $used;
  
  //Constructor
  public function __construct(Travel $travel, int $value, DateTime $creation_date, bool $used) {
    $this->travel = $travel;
    $this->value = $value;
    $this->creation_date = $creation_date;
    $this->used = $used;
  }

  //Destructor
  public function __destruct() {
    // Perform any necessary cleanup here
  }

  //Getters
  public function getTravel(): Travel {
    return $this->travel;
  }

  public function getValue(): int {
    return $this->value;
  }

  public function getCreationDate(): DateTime {
    return $this->creation_date;
  }

  public function isUsed(): bool {
    return $this->used;
  }

  //Setters
  public function setTravel(Travel $travel): void {
    $this->travel = $travel;
  }

  public function setValue(int $value): void {
    $this->value = $value;
  }

  public function setCreationDate(DateTime $creation_date): void {
    $this->creation_date = $creation_date;
  }

  public function setUsed(bool $used): void {
    $this->used = $used;
  }
}