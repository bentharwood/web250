<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn02 Inheritance</title>
</head>
<body>
<h1>Inheritance Examples</h1>

<?php 
    include 'Bird.php';
    
    $bird = new Bird;
    echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';
    echo 'there are '.$bird::$instance_count.' instances of bird<br>';

    $fly_catcher = new YellowBelliedFlyCatcher;
    echo '<p>The song of the ' . $fly_catcher->name . ' on breeding grounds is "' . $fly_catcher->song . '".</p>';
    echo 'there are '.YellowBelliedFlyCatcher::$instance_count.' instances of yellowBelliedFlyCatcher<br><br>';


    $kiwi = new Kiwi;
    $kiwi->flying = "no";
    echo 'there are '.$kiwi::$instance_count.' instances of kiwi<br>';
    echo "<p>The " . $fly_catcher->name . " " . $fly_catcher->can_fly() . ".</p>";
    echo "<p>The " . $kiwi->name . " " . $kiwi->can_fly() . ".</p>";    


    $bird2 = bird::create() ;
    $bird2->song = 'new chirp';
    echo '<p>The generic song of any bird is "' . $bird2->song . '".</p>';
    echo 'there are '.$bird2::$instance_count.' instances of bird<br>';

    $flyCatcher2 = YellowBelliedFlyCatcher::create();
    $flyCatcher2->name = 'yellower-bellied flycatcher';
    $flyCatcher2->song = 'tweet';
    $flyCatcher2->flying = 'no';
    echo '<p>The song of the ' . $flyCatcher2->name . ' on breeding grounds is "' . $flyCatcher2->song . '".</p>';
    echo 'there are '.$flyCatcher2::$instance_count.' instances of yellowBelliedFlyCatcher<br><br>';

    $kiwi2 = kiwi::create();
    $kiwi2->name = 'new kiwi';
    $kiwi2->song = 'tweeeeeet';
    $kiwi2->flying = 'yes';
    echo 'there are '.$kiwi2::$instance_count.' instances of kiwi<br>';
    echo "<p>The " . $flyCatcher2->name . " " . $flyCatcher2->can_fly() . ".</p>";
    echo "<p>The " . $kiwi2->name . " " . $kiwi2->can_fly() . ".</p>";  




?>
    </body>
</html>

