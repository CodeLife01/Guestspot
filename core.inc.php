<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function loggin(){
    if($_SESSION['loggin'] = true){
        return true;
    
    }else{
        return false;
    }
}
?>