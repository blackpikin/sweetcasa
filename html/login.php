<?php
$username = "";
$password = "";
$result = "";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $Model->test_input($_POST['username']);
    $password = $Model->test_input($_POST['password']);
    $pw = $Model->HashPassword($password);

    if (!empty($Model->GetSomeWithCriteria('users', ['phone', 'password'], ['phone'=>$username, 'password'=>$pw]))){
        $user = $Model->GetAllWithCriteria('users', ['phone'=>$username]);

        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['name'] = $user[0]['name'];
        $_SESSION['phone'] = $user[0]['phone'];
        $_SESSION['email'] = $user[0]['email'];
        $_SESSION['code'] = $user[0]['code'];
        $_SESSION['dateof'] = $user[0]['dateof'];
        $_SESSION['sec_tok'] = $Model->HashPassword($Model->getToken(8));
        $username = "";
        $password = "";
        echo '<script>window.location="./?p=viewMyStores"</script>';
    }else{
        $result = "Invalid username or password";
    }


}
?>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-4">
        <h1 class="small-main-title" style="text-align:center;" onmouseover="SetPointer(this)" onclick="GotoPage('home')"><?= $title ?></h1>
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
        <div class="col-md-4 col-sm-4 col-xs-10">
            <h4 style="color: red;"><?= $result ?></h4>
            <label style="color:red"><?= isset($_GET['sub']) ? $_GET['sub'] : "" ?></label>
            <form action="" method="post">
                <h4  style="text-align:center;color: #800080ff;">Login</h4>
                <div class="trans-frame">
                <label style="color: color: #800080ff;font-weight: bold">Username</label>
                <input type="text" value="<?= $username ?>" name="username" class="form-control" required="required" placeholder="Your username is your phone number" />
                <br>
                <label style="color: color: #800080ff;font-weight: bold">Password</label>
                <input type="password" value="<?= $password ?>" name="password" required="required" class="form-control" placeholder="Enter your password" />
                <br>
                <button type="submit" class="btn casa-btn">Login</button>
                </div>
                
            </form>
            <br>
            <hr>
            <span class="btn casa-btn" onmouseover="SetPointer(this)" onclick="GotoPage('forgotPassword')">I forgot my password</span>
            <br>
            <hr>
            <span class="btn casa-btn" onmouseover="SetPointer(this)" onclick="GotoPage('register')">Sign-up instead</span>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-2">

        </div>
    </div>
</div>

