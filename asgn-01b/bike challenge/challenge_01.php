<?php 

 class Bicycle {

  var $brand;
  var $model;
  var $year;
  var $description = 'a bicycle';
  var $kgWeight = 0.0;

  function name() {
    return $this->brand." ".$this->model." (".$this->year.")";
  }

  function weightCon() {
    return floatval($this->kgWeight) * 2.2046226218;
  }

  function setWeightLbs($weight) {
    $this->kgWeight = floatval($weight) / 2.2046226218;
  }
 }

 $ex1 = new Bicycle;
 $ex1->brand = 'canyon';
 $ex1->model = 'm1';
 $ex1->year = '1998';
 $ex1->kgWeight = 10.0;

 $ex2 = new Bicycle;
 $ex2->brand = 'giant';
 $ex2->model = 'super';
 $ex2->year = '2023';
 $ex2->kgWeight = 2.0;

 echo $ex1->name()."<br>";
 echo $ex2->name()."<br>";

 echo $ex1->kgWeight."<br>";
 echo $ex1->weightCon()."<br>";

 $ex1->setWeightLbs(2);
 echo $ex1->kgWeight."<br>";
 echo $ex1->weightCon()."<br>";
?>
