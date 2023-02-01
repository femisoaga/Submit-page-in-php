<?php
echo "<strong>Hello Backend world!!</strong>";

//arrays and variables
$name = "jhamez";
define("Gbenga", "timothy Balogun");
echo "<p>Hello I'm $name</p>";
echo "<p>" . Gbenga ." is my friend</p>";
$variablename = "name";
echo $$variablename;
echo "<br><br>";

$favoriteMovies = array(
    "Fantansy" => "GOT",
    "comedy" => "friends",
    "comedy1" => "BBT"
);
echo sizeof($favoriteMovies);
echo $favoriteMovies["comedy"];

echo "<br><br>";

$age = 21;
$user = "Bayo";

//if statements
if ($age >= 21 && $user == "john") {
    echo "Welcome to the people Named John over 21 Club!<br>";
}
else {
    echo "Sorry, you aren't John, or you're not 21 yet!<br>";
}

//for loop
for($i = 10; $i >= 0; $i--){
    echo $i."<br>";
};

//while loop
$family = array("sade", "bola", "seyi", "gideon");
$i = 0;
while($i < sizeof($family)){
    echo "$family[$i]<br>";
    $i ++;
}

$i = 0; 
while($i <= 20){
    echo $i."<br>";
    $i += 2;
}
?>