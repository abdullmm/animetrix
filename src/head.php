<?php session_start();
if (isset($_SESSION['userID'])) {

    if((time()- $_SESSION['last_login_timestamp'])>900){
        header("Location: ../includes/logout.inc.php");
    }else {
        $_SESSION['last_login_timestamp']=time();

    }

} elseif($_SERVER['PHP_SELF']=='users.php'){
    header("Location: index.php?error=niceTry");
    exit();
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../web/css/bootstrap.css"/>
    <link href="../web/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="../web/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="../web/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="../web/css/custom.css"/>
    <link rel="stylesheet" type="text/css" href="../web/css/customStyle.css"/>
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet"/>
    <title>
        Mund Abdulla
    </title>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDksEnZmFtaehIf5sQFG5GWe0wsefuR2gU"></script>



    <style type="text/css">

    </style>
</head>
<body onload="myFunction()" style="margin:0;">


<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <img src="../web/images/logo.png" alt="logo" class="navLogo"/>
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
                echo '<li class="nav-item" style="margin-right: 20px;"><form action="../includes/login.inc.php" method="post"><button type="submit" name="login-submit" style="padding-bottom: 8px;" Class="btn btn-lg nav-link">Login</button></form></li>';
            } else
            {
                echo ' <li class="nav-item" style="margin-right: 20px;"><a href="observation.php" onclick="setTrue();" class="nav-link">Observation</a></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><a href="project.php" class="nav-link">Project</a></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><a href="users.php" class="nav-link">Users</a></li>';
                echo '<li class="nav-item" style="margin-right: 20px;"><form  action="../includes/logout.inc.php" method="post"><button type="submit" style="padding-bottom: 8px;"  name="logout-submit" Class="btn btn-lg nav-link">Logout</button></form></li>';
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
