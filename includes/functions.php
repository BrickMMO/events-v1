<?php

function secure(){
    if(!isset($_SESSION['id'])){
        header('Location: admin-login.php');
        die();
    }
}

function validate_image($value)
{
    if($value['error'] != '0') return false;
    elseif(!in_array($value['type'], array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'))) return false;
    else return true;   
}