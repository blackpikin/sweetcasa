<?php 
include "./includes/loginRow.php";
$store_id = $_GET['ref'];
$store = $Model->GetOne('properties', $store_id);
$name = $store['name'];
$type = $store['p_type'];
$result = '';
$err = false;
$code = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $code = $Model->test_input($_POST['code']);

    if (empty($code)){
        $err = true;
    }
     
    if(!$err){
        if(!empty($Model->GetAllWithCriteria('codes', ['code' => $code, 'status'=>0])) && empty($Model->ContentExists('properties', 'code', $code))){
            $data = ['code' => $code, 'status'=> 1];
            $result = $Model->Update('properties', $data, ['id' => $store_id, 'user_id' => $_SESSION['id']]);
            $status = $Model->Update('codes', ['status'=> 1], ['code' => $code]);
        }else{
            $result = 'Invalid code';
        }
    }

    if ($result == 'Successful') {
        $code = '';
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
            <h2 class="centered-title">Pay fees</h2>
            <div class="trans-frame">
            <span style="color:red;"><?= $result ?></span>
            <form action="" method="post">
                <p>    
                <label class="form-label">Property name</label>
                <input readonly type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Enter a name to identify the property" />
                </p>
                <p>
                    <label>Type of house</label>
                    <input type="text" name="type"  class="form-control" value="<?= $type ?>" readonly>
                </p> 
                <p>
                    <label>Enter the code you purchased</label>
                    <input type="text" name="code" class="form-control" value="<?= $code ?>" required >
                </p> 
                <button type="submit" name="submit" class="btn casa-btn">Submit</button>
            </form>
        </div>
        <div class="col-md-2 col-sm-1 col-xs-12" >

        </div>
    </div>
</div>
<br>
</div>