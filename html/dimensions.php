<?php 
include "./includes/loginRow.php";
$store_id = $_GET['ref'];
$store = $Model->GetOne('properties', $store_id);
$name = $store['name'];
$type = $store['p_type'];
$result = '';
$err = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($type == 'Room(simple)'){
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        $data_u = [
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Room(modern)'){
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_k = $Model->test_input($_POST['length_k']);
        $width_k = $Model->test_input($_POST['width_k']);
        $length_b = $Model->test_input($_POST['length_b']);
        $width_b = $Model->test_input($_POST['width_b']);
        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_k) || $length_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_k) || $width_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_b) || $length_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_b) || $width_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];
        $data_u = [
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }

    }elseif($type == 'Studio(simple)'){
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_p = $Model->test_input($_POST['length_p']);
        $width_p = $Model->test_input($_POST['width_p']);
        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_p) || $length_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_p) || $width_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => $length_p,
            'wid_parlour' => $width_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        $data_u = [
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => $length_p,
            'wid_parlour' => $length_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Studio(modern)'){
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_k = $Model->test_input($_POST['length_k']);
        $width_k = $Model->test_input($_POST['width_k']);
        $length_p = $Model->test_input($_POST['length_p']);
        $width_p = $Model->test_input($_POST['width_p']);
        $length_b = $Model->test_input($_POST['length_b']);
        $width_b = $Model->test_input($_POST['width_b']);
        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_k) || $length_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_k) || $width_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_p) || $length_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_p) || $width_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_b) || $length_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_b) || $width_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => $length_p,
            'wid_parlour' => $length_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];
        $data_u = [
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => $length_p,
            'wid_parlour' => $width_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Duplex'){
        $num_p = $Model->test_input($_POST['num_p']);
        $num_r = $Model->test_input($_POST['num_r']);
        $num_b = $Model->test_input($_POST['num_b']);
        $num_k = $Model->test_input($_POST['num_k']);
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_k = $Model->test_input($_POST['length_k']);
        $width_k = $Model->test_input($_POST['width_k']);
        $length_p = $Model->test_input($_POST['length_p']);
        $width_p = $Model->test_input($_POST['width_p']);
        $length_b = $Model->test_input($_POST['length_b']);
        $width_b = $Model->test_input($_POST['width_b']);

        if(empty($num_p) || $num_p <= 0){
            $result = 'Number of parlours';
            $err = true;
        }

        if(empty($num_r) || $num_r <= 0){
            $result = 'Number of rooms';
            $err = true;
        }

        if(empty($num_b) || $num_b <= 0){
            $result = 'Number of bathrooms';
            $err = true;
        }

        if(empty($num_k) || $num_k <= 0){
            $result = 'Number of kitchens';
            $err = true;
        }

        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_k) || $length_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_k) || $width_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_p) || $length_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_p) || $width_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_b) || $length_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_b) || $width_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $length_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];
        $data_u = [
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $width_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Apartment'){
        $num_p = $Model->test_input($_POST['num_p']);
        $num_r = $Model->test_input($_POST['num_r']);
        $num_b = $Model->test_input($_POST['num_b']);
        $num_k = $Model->test_input($_POST['num_k']);
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_k = $Model->test_input($_POST['length_k']);
        $width_k = $Model->test_input($_POST['width_k']);
        $length_p = $Model->test_input($_POST['length_p']);
        $width_p = $Model->test_input($_POST['width_p']);
        $length_b = $Model->test_input($_POST['length_b']);
        $width_b = $Model->test_input($_POST['width_b']);

        if(empty($num_p) || $num_p <= 0){
            $result = 'Number of parlours';
            $err = true;
        }

        if(empty($num_r) || $num_r <= 0){
            $result = 'Number of rooms';
            $err = true;
        }

        if(empty($num_b) || $num_b <= 0){
            $result = 'Number of bathrooms';
            $err = true;
        }

        if(empty($num_k) || $num_k <= 0){
            $result = 'Number of kitchens';
            $err = true;
        }

        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_k) || $length_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_k) || $width_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_p) || $length_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_p) || $width_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_b) || $length_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_b) || $width_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $length_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];
        $data_u = [
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $width_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Villa'){
        $cpd_size = $Model->test_input($_POST['cpd_size']);
        $num_p = $Model->test_input($_POST['num_p']);
        $num_r = $Model->test_input($_POST['num_r']);
        $num_b = $Model->test_input($_POST['num_b']);
        $num_k = $Model->test_input($_POST['num_k']);
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_k = $Model->test_input($_POST['length_k']);
        $width_k = $Model->test_input($_POST['width_k']);
        $length_p = $Model->test_input($_POST['length_p']);
        $width_p = $Model->test_input($_POST['width_p']);
        $length_b = $Model->test_input($_POST['length_b']);
        $width_b = $Model->test_input($_POST['width_b']);

        if(empty($cpd_size) || $cpd_size <= 0){
            $result = 'Invalid compound size';
            $err = true;
        }
        if(empty($num_p) || $num_p <= 0){
            $result = 'Number of parlours';
            $err = true;
        }

        if(empty($num_r) || $num_r <= 0){
            $result = 'Number of rooms';
            $err = true;
        }

        if(empty($num_b) || $num_b <= 0){
            $result = 'Number of bathrooms';
            $err = true;
        }

        if(empty($num_k) || $num_k <= 0){
            $result = 'Number of kitchens';
            $err = true;
        }

        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_k) || $length_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_k) || $width_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_p) || $length_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_p) || $width_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_b) || $length_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_b) || $width_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $length_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => $cpd_size
        ];
        $data_u = [
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $width_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => $cpd_size
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Office'){
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        $data_u = [
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Warehouse'){
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        $data_u = [
            'num_parlour' => 0,
            'num_room' => 0,
            'num_bath' => 0,
            'num_kitchen' => 0,
            'len_parlour' => 0,
            'wid_parlour' => 0,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => 0,
            'wid_bath' => 0,
            'len_kitchen' => 0,
            'wid_kitchen' => 0,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }elseif($type == 'Guest house'){
        $num_p = $Model->test_input($_POST['num_p']);
        $num_r = $Model->test_input($_POST['num_r']);
        $num_b = $Model->test_input($_POST['num_b']);
        $num_k = $Model->test_input($_POST['num_k']);
        $length = $Model->test_input($_POST['length']);
        $width = $Model->test_input($_POST['width']);
        $length_k = $Model->test_input($_POST['length_k']);
        $width_k = $Model->test_input($_POST['width_k']);
        $length_p = $Model->test_input($_POST['length_p']);
        $width_p = $Model->test_input($_POST['width_p']);
        $length_b = $Model->test_input($_POST['length_b']);
        $width_b = $Model->test_input($_POST['width_b']);

        if(empty($num_p) || $num_p <= 0){
            $result = 'Number of parlours';
            $err = true;
        }

        if(empty($num_r) || $num_r <= 0){
            $result = 'Number of rooms';
            $err = true;
        }

        if(empty($num_b) || $num_b <= 0){
            $result = 'Number of bathrooms';
            $err = true;
        }

        if(empty($num_k) || $num_k <= 0){
            $result = 'Number of kitchens';
            $err = true;
        }

        if(empty($length) || $length <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width) || $width <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_k) || $length_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_k) || $width_k <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_p) || $length_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_p) || $width_p <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        if(empty($length_b) || $length_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }
        if(empty($width_b) || $width_b <= 0){
            $result = 'Invalid length';
            $err = true;
        }

        $data = [
            'prop_id' => $store_id,
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $length_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];
        $data_u = [
            'num_parlour' => $num_p,
            'num_room' => $num_r,
            'num_bath' => $num_b,
            'num_kitchen' => $num_k,
            'len_parlour' => $length_p,
            'wid_parlour' => $width_p,
            'len_room' => $length,
            'wid_room' => $width,
            'len_bath' => $length_b,
            'wid_bath' => $width_b,
            'len_kitchen' => $length_k,
            'wid_kitchen' => $length_k,
            'cpd_size' => 0
        ];

        if(!$err){
            if(empty($Model->ContentExists('dimensions', 'prop_id', $store_id))){
                $result = $Model->Insert('dimensions', $data);
            }else{
                $result = $Model->Update('dimensions', $data_u, ['prop_id' => $store_id]);
            }
        }else{
            $result = 'Invalid or incomplete dimensions data';
        }
    }
}

?>
<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-2 col-sm-3 col-xs-12" style="border-right:thin solid lightgray;">
        <?php include "./includes/adminSidebar.php" ?>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12" >
            <h2 class="centered-title">Dimensions of the property</h2>
            <div class="trans-frame" style="columns:2">
            <span style="color:red;"><?= $result ?></span>
            <form action="" method="post">
            <p>    
            <label class="form-label">Property name</label>
            <input readonly type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Enter a name to identify the property" />
            </p>
            <p>
                <label>Type of house</label>
                <input type="text" name="type" id="type" class="form-control" value="<?= $type ?>" readonly>
            </p>  
               <?php 
                    if ($type == 'Room(simple)'){
                ?>
                    <p>
                    <label>Length<sup>*</sup></label>
                    <input type="text" name="length" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width<sup>*</sup></label>
                    <input type="text" name="width" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Room(modern)'){
                ?>
                    <p>
                    <label>Length<sup>*</sup></label>
                    <input type="text" name="length"  class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width<sup>*</sup></label>
                    <input type="text" name="width" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of kitchen<sup>*</sup></label>
                    <input type="text" name="length_k" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of kitchen<sup>*</sup></label>
                    <input type="text" name="width_k" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of bathroom<sup>*</sup></label>
                    <input type="text" name="length_b" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of bathroom<sup>*</sup></label>
                    <input type="text" name="width_b" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Studio(simple)'){
                ?>
                    <p>
                    <label>Length of parlour<sup>*</sup></label>
                    <input type="text" name="length_p" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of parlour<sup>*</sup></label>
                    <input type="text" name="width_p"  class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of room<sup>*</sup></label>
                    <input type="text" name="length" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of room<sup>*</sup></label>
                    <input type="text" name="width" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Studio(modern)'){
                ?>
                    <p>
                    <label>Length of parlour<sup>*</sup></label>
                    <input type="text" name="length_p" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of parlour<sup>*</sup></label>
                    <input type="text" name="width_p" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of room<sup>*</sup></label>
                    <input type="text" name="length" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of room<sup>*</sup></label>
                    <input type="text" name="width" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of bathroom<sup>*</sup></label>
                    <input type="text" name="length_b" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of bathroom<sup>*</sup></label>
                    <input type="text" name="width_b" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of kitchen<sup>*</sup></label>
                    <input type="text" name="length_k" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of kitchen<sup>*</sup></label>
                    <input type="text" name="width_k" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Duplex'){
                ?>
                    <p>
                    <label>Number of parlours<sup>*</sup></label>
                    <input type="text" name="num_p" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of rooms<sup>*</sup></label>
                    <input type="text" name="num_r" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of kitchens<sup>*</sup></label>
                    <input type="text" name="num_k" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of bathrooms/toilets<sup>*</sup></label>
                    <input type="text" name="num_b" class="form-control" value="" placeholder="">
                    </p>
                    <label>Length of parlour<sup>*</sup></label>
                    <input type="text" name="length_p" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of parlour<sup>*</sup></label>
                    <input type="text" name="width_p" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of room<sup>*</sup></label>
                    <input type="text" name="length" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of room<sup>*</sup></label>
                    <input type="text" name="width" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of bathroom<sup>*</sup></label>
                    <input type="text" name="length_b" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of bathroom<sup>*</sup></label>
                    <input type="text" name="width_b" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of kitchen<sup>*</sup></label>
                    <input type="text" name="length_k" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of kitchen<sup>*</sup></label>
                    <input type="text" name="width_k" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Apartment'){
                ?>
                    <p>
                    <label>Number of parlours<sup>*</sup></label>
                    <input type="text" name="num_p" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of rooms<sup>*</sup></label>
                    <input type="text" name="num_r" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of bathrooms/toilets<sup>*</sup></label>
                    <input type="text" name="num_b" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of kitchens<sup>*</sup></label>
                    <input type="text" name="num_k" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Length of parlour<sup>*</sup></label>
                    <input type="text" name="length_p" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of parlour<sup>*</sup></label>
                    <input type="text" name="width_p" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of room<sup>*</sup></label>
                    <input type="text" name="length" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of room<sup>*</sup></label>
                    <input type="text" name="width" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of bathroom<sup>*</sup></label>
                    <input type="text" name="length_b" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of bathroom<sup>*</sup></label>
                    <input type="text" name="width_b" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of kitchen<sup>*</sup></label>
                    <input type="text" name="length_k" id="type" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of kitchen<sup>*</sup></label>
                    <input type="text" name="width_k" id="type" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Villa'){
                ?>
                     <p>
                    <label>Surface area of land<sup>*</sup></label>
                    <input type="number" name="cpd_szie" class="form-control" value="" placeholder="Enter the area in metres square">
                    </p>
                    <p>
                    <label>Number of parlours<sup>*</sup></label>
                    <input type="number" name="num_p" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of rooms<sup>*</sup></label>
                    <input type="number" name="num_r" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of bathrooms/toilets<sup>*</sup></label>
                    <input type="number" name="num_b" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of kitchens<sup>*</sup></label>
                    <input type="number" name="num_k" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Length of parlour<sup>*</sup></label>
                    <input type="number" name="length_p" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of parlour<sup>*</sup></label>
                    <input type="number" name="width_p" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of room<sup>*</sup></label>
                    <input type="number" name="length" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of room<sup>*</sup></label>
                    <input type="number" name="width" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of bathroom<sup>*</sup></label>
                    <input type="number" name="length_b"  class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of bathroom<sup>*</sup></label>
                    <input type="number" name="width_b"  class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of kitchen<sup>*</sup></label>
                    <input type="number" name="length_k"  class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of kitchen<sup>*</sup></label>
                    <input type="number" name="width_k" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                 <?php
                    }elseif($type == 'Office'){
                ?>
                     <p>
                    <label>Length<sup>*</sup></label>
                    <input type="text" name="length" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width<sup>*</sup></label>
                    <input type="text" name="width" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Warehouse'){
                ?>
                     <p>
                    <label>Length<sup>*</sup></label>
                    <input type="text" name="length" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width<sup>*</sup></label>
                    <input type="text" name="width" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }elseif($type == 'Guest house'){
                ?>
                    <p>
                    <label>Number of parlours<sup>*</sup></label>
                    <input type="text" name="num_p" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of rooms<sup>*</sup></label>
                    <input type="text" name="num_r" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of bathrooms/toilets<sup>*</sup></label>
                    <input type="text" name="num_b" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Number of kitchens<sup>*</sup></label>
                    <input type="text" name="num_k" class="form-control" value="" placeholder="">
                    </p>
                    <p>
                    <label>Length of parlour<sup>*</sup></label>
                    <input type="text" name="length_p" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of parlour<sup>*</sup></label>
                    <input type="text" name="width_p" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of room<sup>*</sup></label>
                    <input type="text" name="length" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of room<sup>*</sup></label>
                    <input type="text" name="width" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of bathroom<sup>*</sup></label>
                    <input type="text" name="length_b" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of bathroom<sup>*</sup></label>
                    <input type="text" name="width_b" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                    <p>
                    <label>Length of kitchen<sup>*</sup></label>
                    <input type="text" name="length_k" class="form-control" value="" placeholder="Enter the length in metres">
                    </p>
                    <p>
                    <label>Width of kitchen<sup>*</sup></label>
                    <input type="text" name="width_k" class="form-control" value="" placeholder="Enter the width in metres">
                    </p>
                <?php
                    }

                ?>
            <button type="submit" class="btn casa-btn">Save</button>
            </form>
            </div>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12" >

        </div>
    </div>
</div>
<br>