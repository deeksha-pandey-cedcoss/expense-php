<?php
session_start();
include_once("config.php");
$category = $_POST['Category'];
$expense = $_POST['Expense'] * 1;
if ($_POST['flag'] == 0) {
    // this section runs when the expense is being added for the first time
    array_push($_SESSION['expenses'], array($category => $expense));
    $_SESSION['totalExpense'] = $_SESSION['totalExpense'] + ($_POST['Expense'] * 1);
    $_SESSION['remaining'] = $_SESSION['income'] - $_SESSION['totalExpense'];
} else {
    // this section runs when the expense is being editted
    $idd = $_SESSION['idUpdate'];
    foreach ($_SESSION['expenses'] as $ekey => $evalue) {
        foreach ($evalue as $key => $value) {
            if ($ekey == $idd) {
                $_SESSION['totalExpense'] -= $value;
                $_SESSION['remaining'] += $value;
                $key = $_POST['Category'];
                $value = $_POST['Expense'];
                $_SESSION['expenses'][$ekey] = array($key => $value);
                $_SESSION['totalExpense'] += $value;
                $_SESSION['remaining'] -= $value;
            }
        }
    }
    unset($_SESSION['idUpdate']);
}
// creating an aray to send to ajax
$array = array(
    'totalExpense' => $_SESSION['totalExpense'],
    'remaining' => $_SESSION['remaining'],
    'income' => $_SESSION['income']
);
print_r(json_encode($array));
?>