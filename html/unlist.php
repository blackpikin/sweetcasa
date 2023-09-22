<?php
$id = $_GET['ref'];
$user_id = $_SESSION['id'];
$data = ['code' => '', 'status'=> 0];
$result = $Model->Update('properties', $data, ['id' => $id, 'user_id' => $_SESSION['id']]);
echo '<script>window.location="./?p=viewMyStores"</script>';