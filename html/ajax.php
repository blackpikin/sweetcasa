<?php
include "../includes/Model.php";
$Model = new Model();

$action = $_POST['action'];

if ($action == 'LoadQuarters'){
    $city = $_POST['City'];
    $result = $Model->GetDistinct('properties', 'quarter', ['city' => $city]);
    $data = "";
    if(empty($result)){
        $data =  '<option value="" >Select one</option>';
    }else{
        $data =  '<option value="" >Select one</option>';
        foreach($result as $r){
            $data .= '<option value="'.$r['quarter'].'" >'.$r['quarter'].'</option>';
        }
    }
    echo $data;
}
