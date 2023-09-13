<?php

use Bicycle as GlobalBicycle;

 class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'a bicycle';
  private $kgWeight = 0.0;
  protected $wheels = 2;

  public function name() {
    return $this->brand." ".$this->model." (".$this->year.")";
  }

  public function wheelDetails() {
    if($this->wheels == 1) {
      return 'it has 1 Wheel';
    }
    else
      return 'it has '.$this->wheels.' wheels';
  }

  public function weightCon() {
    return floatval($this->kgWeight) * 2.2046226218." lbs";
  }

  public function returnWeight() {
    return $this->kgWeight ." kg";
  }

  public function setWeight($value) {
    $this->kgWeight = floatval($value);
  }

  public function setWeightLbs($weight) {
    $this->kgWeight = floatval($weight) / 2.2046226218;
  }

 }

 class unicycle extends Bicycle {
  protected $wheels = 1;
 }

 $ex1 = new Bicycle;
 $ex1->brand = 'canyon';
 $ex1->model = 'm1';
 $ex1->year = '1998';
 $ex1->setWeight(10);

 $ex2 = new Bicycle;
 $ex2->brand = 'giant';
 $ex2->model = 'super';
 $ex2->year = '2023';
 $ex2->setWeight(2);

 $ex3 = new unicycle;
 $ex3->brand = 'club';
 $ex3->model = 'orange';
 $ex3->year = '2023';
 $ex3->setWeight(4);


 echo $ex1->name()."<br>";
 echo $ex2->name()."<br>";

 echo $ex1->returnWeight()."<br>";
 echo $ex1->weightCon()."<br>";

 $ex1->setWeightLbs(2);
 echo $ex1->returnWeight()."<br>";
 echo $ex1->weightCon()."<br>";

 echo $ex1->wheelDetails()."<br>";
 echo $ex3->wheelDetails()."<br>";
?>
