<?php

class Bird extends DatabaseObject {

  static protected $table_name = 'birds';
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

  public $id;
  public $commonName;
  public $habitat;
  public $food;
  public $conservationId;
  public $backyardTips;

  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct',
  ];

 
  public function __construct($args=[]) {
    $this->commonName = $args['commonName'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->conservationId = $args['conservationId'] ?? '';
    $this->backyardTips = $args['backyardTips'] ?? '';
  }

  
  public function conservation() {
    if($this->conservationId > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservationId];
    } else {
      return "Unknown";
    }
  }


  protected function validate() {
    $this->errors = [];

    if(is_blank($this->commonName)) {
      $this->errors[] = "Bird name cannot be blank.";
    }
   
    return $this->errors;
  }


}

?>
