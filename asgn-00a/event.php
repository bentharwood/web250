<?php

function check_capacity( $capacity, $attendees = 0 ) {
	if ($capacity > $attendees) {
    return "tickets are still available.";
  }
  else {
    return "tickets are sold out.";
  }
}

$venues = array( 
	'Cantina' => [100, 20],
	'Dorsia' => [74, 74], 
	'The Max'=> [98, 100], 
	'MacLaren\'s' => [53, 127],
	'The Banana Stand' => [2, 0],
);

foreach ( $venues as $name => $numbers ) {
	echo $name . ' - ' . check_capacity($numbers[0], $numbers[1]) . '<br/>';
}
