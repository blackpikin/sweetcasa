<?php
$name = ""; $phone = ""; $email = "";  $password = ""; $error = false;
$result = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $Model->test_input($_POST['name']);
    $phone = $Model->test_input($_POST['phone']);
    $email = $Model->test_input($_POST['email']);
    $password = $_POST['password'];

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

    if(empty($password)){
        $error = true;
        $result = "Your password is required";
    }

    if(!$error){
        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $Model->HashPassword($password),
            'code' =>$Model->getToken(4),
            'dateof'=> date("Y-m-d H:i:s")
        ];
        
        $result = $Model->Insert('users', $data);
             
    }

    if ($result == "Successful"){
        $name = ""; $phone = ""; $email = "";  $password = ""; $error = false;
    }

}

?>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-4">
        <h1 class="small-main-title" style="text-align:center;" onmouseover="SetPointer(this)" onclick="GotoPage('home')"><?= $app_name ?></h1>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-4">
        
    </div>
    <div class="col-md-4 col-sm-4 col-xs-4">

    </div>
</div>

<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-4 hidden-xs">

        </div>
        <div class="col-md-4 col-sm-4 col-xs-11">
            <h4 style="color: red;"><?php echo $result ?></h4>
            <label style="color:red"><?= isset($_GET['sub']) ? $_GET['sub'] : "" ?></label>
            <form action="" method="post">
                <h4  style="text-align:center;color:#800080ff;">Sign-up</h4>
                <div class="trans-frame">
                <label style="color: color:#800080ff;font-weight: bold">Name*</label>
                <input type="text" value="<?= $name ?>" name="name" class="form-control" required="required" placeholder="Full legal name" />
                <br>
                <label style="color: color:#800080ff;font-weight: bold">Phone number*</label>
                <input type="number" value="<?= $phone ?>" name="phone" class="form-control" required="required" placeholder="Could be used to text or whatsapp by customers" />
                <br>
                <label style="color: color:#800080ff;font-weight: bold">Email*</label>
                <input type="email" value="<?= $email ?>" name="email" class="form-control" required="required" placeholder="Valid Email address so Flango can contact you" />
                <br>
                <label style="color: color:#800080ff;font-weight: bold">Password*</label>
                <input type="password" value="" name="password" required="required" class="form-control" placeholder="Enter your password" />
                <br>
                <button class="btn casa-btn">Register</button>
                </div>
                
            </form>
            <br>
            <hr>
            <span class="btn casa-btn" onmouseover="SetPointer(this)" onclick="GotoPage('login')">Log in instead</span>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-1">

        </div>
    </div>
    <br>
</div>

