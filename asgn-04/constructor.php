<?php 
  class Bird {
    public $commonName;
    public $latinName;

    public function __construct($commonName, $latinName) {
      $this->commonName = $commonName;
      $this->latinName = $latinName;
    }
  }

  $robin = new Bird("American Robin", "Turdus migratorius");

  echo "common name:".$robin->commonName."<br>";
  echo "latin name:".$robin->latinName."<br>";

  $towhee = new bird("Eastern towhee","Pipilo erythropthalmus");
  echo "common name:".$towhee->commonName."<br>";
  echo "latin name:".$towhee->latinName."<br>";
?>
