

<?php require 'head.php'; ?>
<div id="loader"></div>
    <div style="display:none;" id="myDiv" class="animate-bottom">

        <div class="text-center bg-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">

                    <div id="cover" class="min-vh-100 bg-dark">

                        <div class="container">
                            <?php
                            if (isset($_GET['signup'])) {
                                if ($_GET['signup'] == "success") {
                                    echo '<h3 class= "display-4 text-white"> Account Created, Sign In!</h3>';
                                }
                            }
                            ?>
                            <div class="row">


                                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4 bg-white">
                                    <h2 class="text-center" id="title">

                                        <img src="images/logocrop.png" id="ContentPlaceHolder1_logo" alt="logocopy" class="teamLogo" /></h2>


                                    <div class="px-2 ">
                                        <div id="form" class="justify-content-center">
                                            <div align="center">
                                                <form  id="loginform" action="includes/login.inc.php" method="post" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">

                                                    <fieldset>
                                                        <p align="center" class="text-uppercase">Account Login: </p>
                                                        <div class="form-group">
                                                            <input name="txtUserName" type="text" id="txtUserName" class="form-control input-lg" placeholder="Username" />

                                                        </div>
                                                        <div class="form-group">
                                                            <input name="txtPassword" type="password" id="txtPassword" class="form-control input-lg" placeholder="Password" />

                                                        </div>
                                                        <div class="form-group" align="left">
                                                            <a href="ResetPassword.aspx">Forgot Password?</a>

                                                        </div>
                                                        <div class="form-group" align="center">

                                                            <input type="submit" name="loginBtn" value="Log In" id="loginBtn" class="btn btn-warning" />
                                                            <p style="margin-top: 5px">-or-</p>
                                                            <a href="signup.php" class="btn btn-warning">Sign Up!</a>
                                                        </div>


                                                    </fieldset>
                                                    <?php
                                                    if (isset($_GET['error'])) {
                                                        if ($_GET['error'] == "emptyfields") {
                                                            echo '<p class= "alert text-danger"> Fill in all fields!</p>';
                                                        } else if ($_GET['error'] == "wrongpass") {
                                                            echo '<p class= "alert text-danger"> Incorrect Password.</p>';
                                                        } else if ($_GET['error'] == "nouser") {
                                                            echo '<p class= "alert text-danger"> User does not exist.</p>';
                                                        }
                                                    }
                                                    ?>


                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
<?php require 'footer.php'; ?>