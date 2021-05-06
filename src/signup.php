<?php require 'head.php'; ?>
<div id="loader"></div>
<div  style="display:none;" id="myDiv" class="animate-bottom">
<div class="text-center bg-dark ">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6 ">
            <div id="cover" class="min-vh-100 bg-dark">
                <div class="container">
                    <div class="row ">
                        <div class="  mx-auto text-center form p-4 bg-white">
                            <h2 class="text-center" id="title"><img src="../web/images/logocrop.png"
                                                                    id="ContentPlaceHolder1_logo" alt="logocopy"
                                                                    class="teamLogo"/></h2>
                            <div class="px-2 ">
                                <div id="form" class="justify-content-center ">
                                    <div align="center">
                                        <form action="../includes/signup.inc.php" method="post">
                                            <fieldset>
                                                <p align="center" class="text-uppercase text-orange"><b>Account Sign
                                                        Up:</b></p>

                                                <div class="form-row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input name="txtFirstname" id="txtFirstname" type="text"
                                                                   class="form-control" placeholder="First Name"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" name="txtLastname" id="txtLastname"
                                                                   class="form-control" placeholder="Last Name"/>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <input name="txtPhone" id="txtPhone" type="tel"
                                                                       class="form-control" placeholder="Phone Number"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input name="txtEmail" type="text" id="txtEmail"
                                                                   class="form-control" placeholder="Email Address"/>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input name="txtUserName" type="text" id="txtUserName"
                                                                   class="form-control" placeholder="Username"/>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input name="txtPassword" type="password" id="txtPassword"
                                                                   class="form-control" placeholder="Password"/>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-sm-1">
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input name="txtConfirmPassword" type="password"
                                                                   id="txtConfirmPassword" class="form-control"
                                                                   placeholder=" Confirm Password"/>
                                                        </div>

                                                    </div>
                                                </div>

                                                <?php
                                                if (isset($_GET['error'])) {
                                                    if ($_GET['error'] == "emptyfields") {
                                                        echo '<p class= "alert text-danger"> Fill in all fields!</p>';
                                                    } else if ($_GET['error'] == "invalidmailuser") {
                                                        echo '<p class= "alert text-danger"> Invalid username and email!</p>';
                                                    } else if ($_GET['error'] == "usertaken") {
                                                        echo '<p class= "alert text-danger"> Username already taken.</p>';
                                                    } else if ($_GET['error'] == "emailtaken") {
                                                        echo '<p class= "alert text-danger"> Email already taken.</p>';
                                                    } else if ($_GET['error'] == "invalidmail") {
                                                        echo '<p class= "alert text-danger"> Invalid email.</p>';
                                                    }else if($_GET['error'] == "invalidnumber"){
                                                        echo '<p class= "alert text-danger"> Invalid Phone Number.</p>';
                                                    } else if ($_GET['error'] == "passwordcheck") {
                                                        echo '<p class= "alert text-danger"> Passwords do not match.</p>';
                                                    } else if ($_GET['error'] == "passwordlength") {
                                                        echo '<p class= "alert text-danger"> Password must contain 1 uppercase letter, 1 lowercase letter, and 1 number.</p>';
                                                    }
                                                }
                                                ?>
                                                <div id="message">
                                                    <p>Password must contain the following:</p>
                                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b>
                                                        letter</p>
                                                    <p id="number" class="invalid">A <b>number</b></p>
                                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" name="btnCreate" value="Create Account"
                                                           id="btnCreate" class="btn btn-warning"/>

                                                    <!-- <button onclick="populate()" type="button" name="btnPopulate"
                                                            id="btnPopulate" class="btn btn-warning">Populate</button> -->

                                                    <br/>

                                                </div>

                                            </fieldset>

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
