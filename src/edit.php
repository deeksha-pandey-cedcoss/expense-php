<?php
// this section sends the category and amount 
session_start();
include_once("config.php");
$_SESSION['idUpdate'] = $_POST['id'];
foreach ($_SESSION['expenses'] as $ekey => $evalue) {
   foreach ($evalue as $key => $value) {
    if($ekey == $_POST['id']){
        $arr = array('key'=> $key, 'value' => $value);
        print_r(json_encode($arr)) ;
        break;
    }
   }
}
?>