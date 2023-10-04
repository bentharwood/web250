<?php
class parseCSV {


  public static $delimiter = ',';
  private $filename;
  private $header;
  private $data=[];
  private $rowCount = 0;

  //this method ensures that the filename is not empty it does this by checking if the filename is empty before passing it to the file method it is used to ensure that there is a file to pull data from.
  public function __construct($filename='') {
    if($filename != '') {
      $this->file($filename);
    }
  }

  //this method checks if a file exists and is readable before accepting the filename we use this so that filenames for files that dont exist arent used.
  public function file($filename) {
    if(!file_exists($filename)) {
      echo 'file does not exist.';
    }
    elseif(!is_readable($filename)) {
      echo 'file is not readable.';
    }
    $this->filename = $filename;
    return true;
  }

  //this parses the filename to determine if it is set then reads the data from the file we do this because we need to work with the data in the file
  public function parse() {
    if(!isset($this->filename)) {
      echo 'file not set.';
      return false;
    }

    $this->reset();

    $file = fopen($this->filename, 'r');
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if($row == [NULL] || $row === FALSE) { continue; }
      if(!$this->header) {
     	  $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->rowCount++;
     	}
    }
    fclose($file);
    return $this->data;
  }

  //returns the last results in the data array.
  public function lastResults() {
    return $this->data;
  }

  //returns the rowcount.
  public function rowCount() {
    return $this->rowCount;
  }

  //resets the header to null emptys the data array and sets rowcount equal to zero we do this so that we can start over with another file.
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->rowCount = 0;
  }

}

?>
