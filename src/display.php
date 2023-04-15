<?php
//  displays the expenses
session_start();
include_once("config.php");
foreach ($_SESSION['expenses'] as $expensekey => $expensevalue) {
    foreach ($expensevalue as $key => $value) {
        echo "<tr><td>".$key."</td><td>$".$value."</td><td><button id='$expensekey' onclick='editExpense(this.id)' style='background-color: lightgreen; border-color: lightgreen; color: green;'>Edit</button></td><td><button id='$expensekey' onclick='deleteExpense(this.id)' style='background-color:pink; border-color:pink; color: red;'>Delete</button></td></tr>";
    }
}
?>