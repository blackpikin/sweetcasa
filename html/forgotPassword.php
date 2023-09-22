<?php
include "./includes/loginRow.php";
    $username = "";
    $password = "";
    $result = "";
?>
<div id="firstline">
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-4 hidden-xs">

        </div>
        <div class="col-md-4 col-sm-4 col-xs-10">
            <h4 style="color: red;"><?php echo $result ?></h4>
            <form action="" method="post">
                <h2 class="centered-title">Password recovery</h2>
                <div class="trans-frame">
                <label>Recovery link will be sent to the address below</label>
                <input type="text" value="<?php echo $username ?>" name="username" class="form-control" required="required" placeholder="Your email is required" />
                <br>
                <button type="submit" class="btn casa-btn">Send the link</button>
                </div>
                
            </form>
            <br>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-2">

        </div>
    </div>
</div>
<br>
<br>
<br>