<?php
//  adds income to the existing income
session_start();
if (!isset($_SESSION['income'])) {
    $_SESSION['income'] = $_POST['income'];
}else{
    $_SESSION['income'] += ($_POST['income'] * 1);
    $_SESSION['remaining'] += ($_POST['income'] * 1);
}
include_once("config.php");
$array = array(
    'totalExpense'=>$_SESSION['totalExpense'],
    'remaining' => $_SESSION['remaining'],
    'income' => $_SESSION['income']
);
print_r(json_encode($array));
?>