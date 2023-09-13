<?php 
  class computer {
    public $cpu;
    public $ram;
    public $memory;
    public $motherboard;
    public $os;
    private $manufacturer;

    public function information() {
      return $this->cpu.", ".$this->ram.", ".$this->memory.", ".$this->motherboard.", ".$this->os.", ".$this->getManufacturer();
    }

    public function setManufacturer($value) {
      $this->manufacturer = $value;
    }

    public function getManufacturer() {
      return $this->manufacturer;
    }
  }

  class windows extends computer {
    public $os = 'Windows 11';
  }

  class linux extends computer {
    public $os = 'ubuntu 22.04';
  }

  class mac extends computer {
    public $os = 'macOS 14(Sonoma)';
  }

  $pc = new computer;
  $pc->cpu = 'intel i9 15000';
  $pc->ram = '32gb ddr5';
  $pc->memory = '128 gb ssd';
  $pc->motherboard = 'black';
  $pc->os = 'google os';
  $pc->setManufacturer('google');

  $pw = new windows;
  $pw->cpu = 'intel 19 15000';
  $pw->ram = '32gb ddr5';
  $pw->memory = '128 gb ssd';
  $pw->motherboard = 'blue';
  $pw->setManufacturer('dell');

  $pa = new mac;
  $pa->cpu = 'powerPC 7xx';
  $pa->ram = '16bg ddr4';
  $pa->memory = '128gb hdd';
  $pa->motherboard = 'white';
  $pa->setManufacturer('apple');

  echo $pc->information()."<br>";
  echo $pw->information()."<br>";
  echo $pa->information()."<br>";
?>
