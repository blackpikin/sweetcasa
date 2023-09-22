<?php
/**
 * Created by PhpStorm.
 * User: Halsey
 * Date: 28/03/2020
 * Time: 18:06
 */
session_start();
include "includes/Model.php";
$title = "Sweet Casa";
$Model = new Model();
$app_name = "Sweet Casa";
$num = rand(1, 4);
$bkg = "img".$num.".jpg";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" id="viewport-meta" />
    <script>
        // Store the meta element
        var viewport_meta = document.getElementById('viewport-meta');

        // Define our viewport meta values
        var viewports = {
            bydefault: viewport_meta.getAttribute('content'),
            landscape: 'width=990'
        };

        // Change the viewport value based on screen.width
        var viewport_set = function() {
            if ( screen.width > 768 )
                viewport_meta.setAttribute( 'content', viewports.landscape );
            else
                viewport_meta.setAttribute( 'content', viewports.bydefault );
        };

        // Set the correct viewport value on page load
        viewport_set();

        // Set the correct viewport after device orientation change or resize
        window.onresize = function() {
            viewport_set();
        }
    </script>
    <title><?php echo $title ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css" media="all">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./css/bootstrap-theme.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./css/animate.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="./css/style.css" type="text/css" media="all">
    <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="./css/ie.css" />
    <![endif]-->
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./js/anime.min.js"></script>
</head>
<?php 
    if (!isset($_GET['p']) || $_GET['p'] != 'search'){
        ?>
        <body style="background-image: url('./img/<?= $bkg ?>'); background-repeat: repeat-y; background-size: 100%;">
       <?php 
    }else{
        ?>
           <body> 
        <?php 
    }

?>

<header class="row">
         <div id="logo" class="col-xs-2">
        
         </div>
         <div class="col-xs-8">
            
           
        </div>
        <div class="col-xs-2">
            
        </div>
     </header>
<div class="row">
    <div id="container" class="col-xs-12 container-fluid">
        <?php 
      if(!isset($_SESSION['name']) || $_SESSION['name'] === ""){
            if (isset($_GET['p']) && ($_GET['p'] == 'login' || $_GET['p'] == 'register' || $_GET['p'] == 'visit' || $_GET['p'] == 'dashboard' || $_GET['p'] == 'forgotPassword' || $_GET['p'] == 'search')) {
                include "./html/".$_GET['p'].".php";
            }else{
                include "./html/home.php";
            }
       }else{
        if (isset($_GET['p']) && ($_GET['p'] == 'login' || $_GET['p'] == 'register')) {
            include "./html/home.php";
        }elseif(isset($_GET['p']) && ($_GET['p'] != 'login' || $_GET['p'] != 'register')){
            include "./html/".$_GET['p'].".php";
        }else{
            include "./html/home.php";
        }
      } 
        ?>
    </div>
</div>
<?php 
    if (isset($_GET['p']) && ($_GET['p'] !== 'visit')) {
       ?>
        <footer class="footer-style">
            <br>
            <br>
            <div class="row">
                <div class="col-md-1 col-sm-1 hidden-xs">

                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                <span style="color:#ffffff;">&copy; <?= date('Y').' '.$app_name ?>. All rights reserved</span>
                </div>
                <div class="col-md-1 col-sm-1 hidden-xs">

                </div>
                <div id="marg" class="col-md-3 col-sm-3 col-xs-12">

                </div>
                <div id="barg" class="col-md-2 col-sm-2 col-xs-12">
                    
                </div>
            </div>
            <br>
            <br>
        </footer>
       <?php
    }
 ?>
<script src="js/app.js" type="text/javascript"></script>
</body>
</html>








