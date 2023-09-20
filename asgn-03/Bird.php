<?php

class Bird {
    var $habitat;
    var $food;
    var $nesting = "tree";
    var $conservation;
    var $song = "chirp";
    var $flying = "yes";
    static $instance_count = 0;
    static $egg_num = 0;

    function can_fly() {
      ($this->flying == "yes") ? $flying_string = "can fly": $flying_string = "is stuck on the ground";
        return  $flying_string ;
    }

    static function create() {
      $class = get_called_class();
      $new_obj = new $class;
      self::$instance_count++;
      return $new_obj;
    }


}

class YellowBelliedFlyCatcher extends Bird {
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";
    static $egg_num = '3-4 sometimes 5';
}

class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    var $flying = "no";
}
