<?php
   $user_id = $_SESSION['id'];
   $result = ""; $err = false;
   $oldp = ""; $newp = ""; $cnewp = "";
   if ($_SERVER['REQUEST_METHOD'] == "POST"){
       $oldp = $_POST['oldp'];
       $newp = $_POST['newp'];
       $cnewp = $_POST['cnewp'];
   
       if($newp !== $cnewp){
           $err = true;
           $result = "New password must match with the confirmation";
       }
       
       if ($Model->GetUserPassword($user_id) != $Model->HashPassword($oldp)){
           $err = true;
           $result = "Invalid old password";
       }
   
   
       if(!$err){
            $data = [
                'password' => $Model->HashPassword($newp)
            ];
           $result = $Model->Update('users', $data, ['id'=>$user_id]);
   
           if($result == "Successful"){
               session_destroy();
               echo '<script>window.location="index.php?p=logout"</script>';
           }
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
                <span onmouseover="SetPointer(this)" onclick="GotoPage('viewMystores')" class="logout-link"><?= $_SESSION['name']; ?></span>&nbsp;&nbsp;
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
            <h2 class="centered-title">Change password</h2>
            <div class="row">
                <div class="col-xs-9 trans-frame">
                    <form action="" method="post">
                        <label class="form-label">Current password</label>
                        <input type="password" class="form-control" required="required" name="oldp" value="" >
                            <br>
                        <label class="form-label">New password</label>
                        <input type="password" class="form-control" required="required" name="newp" value="" >
                        <br>
                        <label class="form-label">Confirm new password</label>
                        <input type="password" class="form-control" required="required" name="cnewp" value="" >
                        <br>
                        <button class="btn casa-btn">Change the password</button>
                        <br>
                        <br>
                        <span>When you change your password successfully, you will be logged out automatically. Log in again using your new password</span>
                    </form>
                </div>
                <div class="col-xs-3">

                </div>
        </div>
    </div>
        <div class="col-md-2 col-sm-2 hidden-xs">

        </div>
    </div>
</div>

