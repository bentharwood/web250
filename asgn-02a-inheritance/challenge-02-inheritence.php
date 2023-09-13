<?php 
  class computer {
    var $cpu;
    var $ram;
    var $memory;
    var $motherboard;
    var $os;
    var $manufacturer;

    function information() {
      return $this->cpu.", ".$this->ram.", ".$this->memory.", ".$this->motherboard.", ".$this->os.", ".$this->manufacturer;
    }
  }

  class windows extends computer {
    var $os = 'Windows 11';
    var $manufacturer = 'Dell';
  }

  class linux extends computer {
    var $os = 'ubuntu 22.04';
    var $manufacturer = 'Framework';
  }

  class mac extends computer {
    var $os = 'macOS 14(Sonoma)';
    var $manufacturer = 'apple';
  }

  $pc = new computer;
  $pc->cpu = 'intel i9 15000';
  $pc->ram = '32gb ddr5';
  $pc->memory = '128 gb ssd';
  $pc->motherboard = 'black';
  $pc->os = 'google os';
  $pc->manufacturer = 'google';

  $pw = new windows;
  $pw->cpu = 'intel 19 15000';
  $pw->ram = '32gb ddr5';
  $pw->memory = '128 gb ssd';
  $pw->motherboard = 'blue';

  $pa = new mac;
  $pa->cpu = 'powerPC 7xx';
  $pa->ram = '16bg ddr4';
  $pa->memory = '128gb hdd';
  $pa->motherboard = 'white';

  echo $pc->information()."<br>";
  echo $pw->information()."<br>";
  echo $pa->information()."<br>";
?>
