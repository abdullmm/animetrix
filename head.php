<?php session_start();
if (isset($_SESSION['userID'])) {

    if((time()- $_SESSION['last_login_timestamp'])>900){
        header("Location: includes/logout.inc.php");
    }else {
        $_SESSION['last_login_timestamp']=time();

    }

} elseif($_SERVER['PHP_SELF']=='/animal3/users.php'){
    header("Location: /animal3/index.php?error=niceTry");
    exit();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="Content/bootstrap.css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="Content/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet"/>
    <title>
        Mund Abdulla
    </title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDksEnZmFtaehIf5sQFG5GWe0wsefuR2gU"></script>



    <style type="text/css">
        .a:link,
        .a:visited {
            padding: 8px 0;
            /*color: #fff;*/
            text-decoration: none;
            text-transform: uppercase;
            font-size: 90%;
            border-bottom: 2px solid transparent;
            transition: border-bottom 0.2s;
        }

        a:hover,
        a:active {
            color: black;
            text-decoration: none;

        }
        #myDIV {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: lightblue;
            margin-top: 20px;
        }
        #myDIV2 {
            width: 100%;
            padding: 50px 0;
            text-align: center;
            background-color: lightblue;
            margin-top: 20px;
        }
        .main_menu {
            /*#ccc*/
            width: 170px;
            /*background-color: #fff;*/
            border: 1px solid #6c757d;
            color: #000;
            text-align: center;
            height: 30px;
            line-height: 30px;
            /**/
            margin-right: 5px;
            /*font-weight: bold;*/
            font-size: 20px;
        }

        .level_menu {
            width: 160px;
            background-color: #fff;
            */ color: #333;
            text-align: center;
            height: 30px;
            line-height: 30px;
            margin-top: 5px;
            /*font-weight: bold;*/
            font-size: 20px;
        }

        .menu {
            /*#ccc*/
            width: 170px;
            /*background-color: #fff;*/
            color: #000;
            text-align: center;
            height: 30px;
            line-height: 30px;
            /**/
            /*margin-right: 5px;*/
            /*font-weight: bold;*/
            font-size: 20px;
            background: none;
            margin-bottom: -1px;
        }

        .menu:hover {
            color: black;
            text-decoration: none;

        }

        .menu_hover {
            color: black;
            text-decoration: none;

        }


        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #e66641;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }
            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }
            to {
                bottom: 0;
                opacity: 1
            }
        }

        #myDiv {
            display: none;
            text-align: center;
        }



        /* The message box is shown when the user clicks on the password field */
        #message {
            display:none;

            color: #000;
            position: relative;

        }



        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }





        .searchbar{
            margin-bottom: auto;
            margin-top: auto;
            height: 60px;
            background-color: #353b48;
            border-radius: 30px;
            padding: 10px;
        }

        .search_input{
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color:transparent;
            line-height: 40px;
            transition: width 0.4s linear;
        }
        .search_input2{
            color: white;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            caret-color:transparent;
            line-height: 40px;
            transition: width 0.4s linear;
        }

        .searchbar:hover > .search_input{
            padding: 0 10px;
            width: 450px;
            caret-color:#e66641;
            transition: width 0.4s linear;
        }

        .searchbar:hover > .search_icon{
            background: white;
            color: #e66641;
        }

        .search_icon{
            height: 40px;
            width: 40px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color:white;
            text-decoration:none;
        }





        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        footer{
            background-color: #333;
            padding: 50px;
            font-size: 80%;
        }
        .footer-nav{
            list-style: none;
            float: left;
        }
        .social-links{
            list-style: none;
            float: right;
        }
        .footer-nav li,
        .social-links li{
            display: inline-block;
            margin-right: 20px;
        }

        .footer-nav li:last-child,
        .social-links li:last-child{
            display: inline-block;
            margin-right: 0;
        }

        .footer-nav li a:link,
        .footer-nav li a:visited,
        .social-links li a:link,
        .social-links li a:visited{
            text-decoration: none;
            color: #888;
            border: 0;
            transition: color 0.2s;
        }
        .footer-nav li a:hover,
        .footer-nav li a:active{
            color: #ddd;
        }
        .fb,
        .twit,
        .goog,
        .insta{
            transition: color 0.2s;
        }
        .social-links li a:link,
        .social-links li a:visited{
            font-size: 160%;
        }
        .fb:hover{
            color: #3b5998;
        }
        .twit:hover{
            color: #00aced;
        }
        .goog:hover{
            color: #dd4b39;
        }
        .insta:hover{
            color: #517fa4;
        }
        footer p{
            color: #888;
            text-align: center;
            margin-top: 20px;
        }
        /*------ animation---------*/
        .js--wp-1,
        .js--wp-2,
        .js--wp-3{
            opacity: 0;
            animation-duration: 1s;
        }
        .js--wp-4{
            animation-duration: 1s;
        }
        .js--wp-1.animated,
        .js--wp-1.animated,
        .js--wp-1.animated{
            opacity: 1;
        }
    </style>
</head>
<body onload="myFunction()" style="margin:0;">


<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <img src="images/logo.png" alt="logo" class="navLogo"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav float-right">
            <li class="nav-item active" style="margin-right: 20px;">
<!--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
                <a href="index.php" class="nav-link">Home</a>
            </li>




            <?php if (!isset($_SESSION['userID'])) {
                echo '<li class="nav-item" style="margin-right: 20px;"><a href="signup.php" class="nav-link">Sign Up</a> </li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><form action="includes/login.inc.php" method="post"><button type="submit" name="login-submit" style="padding-bottom: 8px;" Class="btn btn-lg nav-link">Login</button></form></li>';
            } else
            {
                echo ' <li class="nav-item" style="margin-right: 20px;"><a href="observation.php" onclick="setTrue();" class="nav-link">Observation</a></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><a href="project.php" class="nav-link">Project</a></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><a href="users.php" class="nav-link">Users</a></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><form  action="includes/logout.inc.php" method="post"><button type="submit" style="padding-bottom: 8px;"  name="logout-submit" Class="btn btn-lg nav-link">Logout</button></form></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><p class="nav-link">Hi ' . htmlspecialchars( $_SESSION['firstname'],ENT_QUOTES,'UTF-8') . '!</p></li>';
            }
            ?>
        </ul>

    </div>
</nav>
    <script type="javascript">
        function setTrue() {
            sessionStorage.setItem("myval", "true");

        }
    </script>
