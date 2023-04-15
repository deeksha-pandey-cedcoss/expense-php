<?php
session_start();
//  calculates and prints the total amount being spent on every category
$grocery = 0;
$travelling = 0;
$veggies = 0;
$miscellaneous = 0;
foreach ($_SESSION['expenses'] as $ekey => $evalue) {
    foreach ($evalue as $key => $value) {
        if ($key == 'Grocery') {
            $grocery += ($value * 1);
        } else if ($key == 'Travelling') {
            $travelling += ($value * 1);
        } else if ($key == 'Veggies') {
            $veggies += ($value * 1);
        } else if ($key == 'Miscellaneous') {
            $miscellaneous += ($value * 1);
        }
    }
}
echo "<tr><td style='border: 1px solid gray;'>$".$grocery."</td><td style='border: 1px solid gray;'>$".$veggies."</td><td style='border: 1px solid gray;'>$".$travelling."</td><td style='border: 1px solid gray;'>$".$miscellaneous."</td></tr>";
?>
