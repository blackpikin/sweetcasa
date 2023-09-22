<?php
session_start();

if (!isset($_SESSION["username"]) or $_SESSION['username'] === "" ){
    echo json_encode("not logged in");
}else{
    echo json_encode($_SESSION["username"]);
}