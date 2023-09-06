<?php 
 class Bird {
  var $name;
  var $food = 'bugs';
  var $nest = 'tree';
  var $conservationLvl;
  var $song;
  var $canFly;

  function info() {
    return $this->name."<br>".$this->food."<br>".$this->nest."<br>".$this->conservationLvl;
  }

  function behavior() {
    return $this->song."<br>".$this->canFly;
  }
 }

 $bird1 = new Bird;
 $bird1->name = 'Eastern Towhee';
 $bird1->food = 'seeds, fruits, insects, spiders';
 $bird1->nest = 'ground';
 $bird1->conservationLvl = 'low';
 $bird1->song = "drink-your-tea";
 $bird1->canFly = "this bird can fly";

 $bird2 = new Bird;
 $bird2->name = 'Indigo Bunting';
 $bird2->food = 'small seeds, berries, buds, and insects';
 $bird2->nest = 'roadsides, and railroad rights-of-wafields and on the edges of woods';
 $bird2->conservationLvl = 'low';
 $bird2->song = "what";
 $bird2->canFly = "this bird can fly";

 echo $bird1->info()."<br>";
 echo $bird1->behavior()."<br><br>";
 
 echo $bird2->info()."<br>";
 echo $bird2->behavior()."<br><br>";

?>
