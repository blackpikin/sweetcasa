<br>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-4">
        
    </div>
    <div class="col-md-8 col-sm-8 col-xs-2">
        
    </div>
    <div class="col-md-2 col-sm-2 col-xs-6">
    <?php 
                if(isset($_SESSION['name']) && $_SESSION['name'] !== ""){
                    ?>
                   <div class="user-cred-box">
                <span onmouseover="SetPointer(this)" onclick="GotoPage('viewMyStores')" class="logout-link"><?= $_SESSION['name']; ?></span>&nbsp;&nbsp;
                <span class="login-text" onmouseover="SetPointer(this)" onclick="GotoPage('logout')">Log out</span>
            </div>
                    <?php
                }else{
                    ?>
                    <span class="login-text" onmouseover="SetPointer(this)" onclick="GotoPage('login')">Login</span>
                    &nbsp;&nbsp;&nbsp;
                    <span class="login-text" onmouseover="SetPointer(this)" onclick="GotoPage('register')">Sign-up</span>
                    <?php
                }
            ?>
    </div>
</div>