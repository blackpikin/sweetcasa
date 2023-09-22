<?php 
    $data = $Model->GetAllWithCriteria('users', ['phone'=>$_SESSION['phone']]);
    $name = $data[0]['name'];
    $phone = $data[0]['phone'];
    $email = $data[0]['email'];
    $error = false;
$result = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $Model->test_input($_POST['name']);
        $phone = $Model->test_input($_POST['phone']);
        $email = $Model->test_input($_POST['email']);
    
        if(empty($name)){
            $error = true;
            $result = "Your name is required";
        }
    
        if(empty($phone)){
            $error = true;
            $result = "Your phone number is required";
        }
    
        if(empty($email)){
            $error = true;
            $result = "Your email address is required";
        }
    
    
        if(!$error){
            $data = [
                'name' => $name,
                'phone' => $phone,
                'email' => $email
            ];
            $result = $Model->Update('users', $data,  ['id' => $_SESSION['id']]);      
        }
    
        if ($result == "Successful"){
            $data = $Model->GetAllWithCriteria('users', ['phone'=>$username]);
            $name = $data[0]['name'];
            $phone = $data[0]['phone'];
            $email = $data[0]['email'];
        }
    }

?>
<br>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-4">
        <h1 class="small-main-title" style="text-align:center;" onmouseover="SetPointer(this)" onclick="GotoPage('home')"><?= $app_name ?></h1>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-6">
        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-2">
    <?php 
                if(isset($_SESSION['name']) && $_SESSION['name'] !== ""){
                    ?>
                   <div class="user-cred-box">
                <span onmouseover="SetPointer(this)" onclick="GotoPage('viewMyStores')" class="logout-link"><?= $_SESSION['name']; ?></span>&nbsp;&nbsp;
                <span class="login-text" onmouseover="SetPointer(this)" onclick="GotoPage('logout')">Log out</span>
            </div>
                    <?php
                }
            ?>
    </div>
</div>
<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-2 col-sm-4 col-xs-12" style="border-right:thin solid lightgray;">
        <?php include "./includes/adminSidebar.php" ?>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12" >
            <div >
            <h2 class="centered-title">Change your information</h2>
            <h4 style="color: red;"><?= $result ?></h4>
               <form action="" method="post">
                <div class="trans-frame">
                <label class="form-label">Name</label>
                <input type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Full legal name" />
                <br>
                <label class="form-label">Phone number</label>
                <input type="number" value="<?= $phone ?>" name="phone" class="form-control" required="required" placeholder="Could be used to text or whatsapp by customers" />
                <br>
                <label class="form-label">Email</label>
                <input type="text" value="<?= $email ?>" name="email" class="form-control" required="required" placeholder="Valid Email address so Flango can contact you" />
                <br>
                <button class="btn casa-btn">Modify</button>
                </div>
                
            </form>
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-12" style="border-right:thin solid lightgray;"></div>
    </div>
</div>
<br>