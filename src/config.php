<?php
session_start();
// this initializes the expenses remaining and totalexpense in session 
if (!isset($_SESSION['expenses'])) {
    $_SESSION['expenses'] = array();
}
if(!isset($_SESSION['remaining'])){
    $_SESSION['remaining'] = $_SESSION['income'];
}
if(!isset($_SESSION['totalExpense'])){
    $_SESSION['totalExpense'] = 0;
}
?>