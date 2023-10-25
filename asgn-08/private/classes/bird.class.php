<?php

class Bird {

  static public $database;

  static public function set_database($database) {
    self::$database = $database;
  }

  static public function find_by_sql($sql) {
    $result = self::$database->query($sql);
    if(!$result) {
      exit("Database query failed :(");
    }

    $object_array = [];
    while($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }
    $result->free();


    return $object_array;
  }

  static public function find_all() {
    $sql = "SELECT * FROM birds";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id) {
    $sql = "SELECT * FROM birds ";
    $sql.= "WHERE id='". self::$database->escape_string($id)."'";
    $obj_array = self::find_by_sql($sql);
    if(!empty($obj_array)) {
      return array_shift($obj_array);
    }
    else {
      return false;
    }
  }

  static protected function instantiate($record) {
    $object = new self;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

/*
Use the wnc-birds.csv file to create the properties
Make all of the properties public.
*/
public $id;
public $common_name;
public $habitat;
public $food;
private $conservation_id;
public $backyard_tips;



 
  /*
  Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
  Use the CONDITION_OPTIONS from the bicycle.class.php file

  1 = Low concern
  2 = Moderate concern
  3 = Extreme concern
  4 = Extinct
  */

  public const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

 

 /*
   - Create a public __contruct that accepts a list of $args[]
   - Use the Null coalescing operator
   - Create a default value of 1 for conservation_id
 */

 public function __construct($args=[]) {
  $this->commonName = $args['commonName'] ?? '';
  $this->habitat = $args['habitat'] ?? '';
  $this->food = $args['food'] ?? '';
  $this->conservationId = $args['conservationId'] ?? 1;
  $this->backyardTips = $args['backyardTips'] ?? '';
 }



/*
  Create a public method called conservation(). This method should mimic the
    public function condition() from the bicycle.class.php file


*/

public function conservation() {
  if($this->conservation_id > 0) {
    return self::CONSERVATION_OPTIONS[$this->conservation_id];
  }else {
    return "unknown";
  }
}

public function name() {
  return " {$this->common_name} {$this->habitat} {$this->food}";
}

}
