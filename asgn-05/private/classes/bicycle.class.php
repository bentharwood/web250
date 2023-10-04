<?php 
  class bicycle {

    public $brand;
    public $model;
    public $year;
    public $category;
    public $color;
    public $description;
    public $gender;
    public $price;
    protected $weightKg;
    protected $conditionId;
  
    public const TYPES = ['Road', 'Mountain', 'Hybrid', 'european', 'sport', 'BMX'];

    public const GENDERS = ['Mens', 'Womens', 'Unisex'];

    //this constant is used to define an array of conditions that the bikes could be in By using this constant in your code, you can reference these condition labels without hardcoding the values throughout your application, making it more maintainable and easier to understand.
    protected const CONDITION_OPTIONS = [
      1 => 'bad',
      2 => 'ok',
      3 => 'Good',
      4 => 'Great',
      5 => 'Like New'
    ];

    public function __construct($args=[]) {
      $this->brand = $args['brand'] ?? '';
      $this->model = $args['model'] ?? '';
      $this->year = $args['year'] ?? '';
      $this->category = $args['category'] ?? '';
      $this->color = $args['color'] ?? '';
      $this->description = $args['description'] ?? '';
      $this->gender = $args['gender'] ?? '';
      $this->price = $args['price'] ?? 0;
      $this->weightKg = $args['weightKg'] ?? 0.0;
      $this->conditionId = $args['condition_id'] ?? 3;
  }

  public function weightKg() {
    return number_format($this->weightKg, 2) . ' kg';
  }

  public function setWeightKg($value) {
    $this->weightKg = floatval($value);
  }

  public function weightLbs() {
    $weightLbs = floatval($this->weightKg) * 2.2046226218;
    return number_format($weightLbs, 2) . ' lbs';
  }

  public function setWeightLbs($value) {
    $this->weightKg = floatval($value) / 2.2046226218;
  }

  //this method get the conditionid and if it is more than zero returns it, if it is less than zero it returns 'unknown'.
  public function condition() {
    if($this->conditionId > 0) {
      return self::CONDITION_OPTIONS[$this->conditionId];
    } else {
      return "Unknown";
    }
  }
}
?>