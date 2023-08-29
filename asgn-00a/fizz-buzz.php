<?php 

$i = 1;

while($i <= 100) {
  if($i % 3 == 0 && $i % 5 ==0) {
    print "fizzbuzz\n";
  }
  elseif($i % 5 == 0) {
    print "buzz\n";
  }
  elseif($i % 3 == 0) {
    print "fizz\n";
  }
  else {
    print "$i\n";
  }
  $i++;
}
