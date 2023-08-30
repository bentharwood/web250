<?php
  class RoundCookie {
    var $weight;
    var $color;
    var $icing;

    function decorate() {
      return "drizzle ". $this->icing;
    }

    function consume() {

    }
  }

  //create a new RoundCookie object (instantiation)
  $cookie1 = new RoundCookie;
  $cookie1->weight = "2 oz,";
  $cookie1->color = "green";
  $cookie1->icing = "cream cheese icing";

  $cookie2 = new RoundCookie;
  $cookie2->weight = "24 oz,";
  $cookie2->color = "blue";
  $cookie2->icing = "no";


 echo "my first cookie is ".$cookie1->weight. "it is ".$cookie1->color."it has ".$cookie1->icing.".<br>";
 echo "i will " .$cookie1->decorate().".<br>";
 echo "my second cookie is ".$cookie2->weight."it is ".$cookie2->color."it has ".$cookie2->icing."icing."
?>
