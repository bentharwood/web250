<?php 
  class Bird {
    public $commonName;
    public $latinName;

    public function __construct($args=[]) {
      $this->commonName = $args['CommonName'] ?? NULL;
      $this->latinName = $args['latinName'] ?? NULL;
    }
  }

  class acadian extends Bird {
    public $commonName = 'Acadian Flycatcher';
    public $latinName = 'Turdus migratorius';
  }

  class towhee extends Bird {
    public $commonName = 'Eastern Towhee';
    public $latinName = 'Pipilo erythrophthalmus';
  }

  $acadian = new Bird(['CommonName' => 'Acadian Flycatcher', 'latinName' => 'Turdus migratorius']);

  $towhee = new Bird(['CommonName' => 'Eastern Towhee', 'latinName' => 'erythrophthalmus']);

  echo "common name:".$acadian->commonName."<br>";
  echo "latin name:".$acadian->latinName."<br>";
  echo "common name:".$towhee->commonName."<br>";
  echo "latin name:".$towhee->latinName."<br>";

  
?>
