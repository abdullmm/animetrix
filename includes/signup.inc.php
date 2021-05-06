<?php


if (isset($_POST['btnCreate'])) {

    include_once 'dbh.inc.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['txtFirstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['txtLastname']);
    $email = mysqli_real_escape_string($conn, $_POST['txtEmail']);
    $phone = mysqli_real_escape_string($conn, $_POST['txtPhone']);
    $username = mysqli_real_escape_string($conn, $_POST['txtUserName']);
    $email = mysqli_real_escape_string($conn, $_POST['txtEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['txtPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['txtConfirmPassword']);


    //Error handlers
    //Check for empty fields
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        header("Location: ../src/signup.php?error=emptyfields&txtUserName" . $username . "&mail=" . $email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../src/signup.php?error=invalidmailuser");
        exit();
    }
    //Check if email is valid
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../src/signup.php?error=invalidmail&txtUserName=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../src/signup.php?error=invaliduser&txtEmail=" . $email);
        exit();
    } else if (!is_numeric($phone)){
        header("Location: ../src/signup.php?error=invalidnumber&txtEmail=" . $email);
        exit();
    } else if ($password!=$confirmPassword) {
        header("Location: ../src/signup.php?error=passwordcheck&txtUserName=" . $username. "&txtEmail=".$email);
        exit();
    } else if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/", $password)) {
        header("Location: ../src/signup.php?error=passwordlength&txtUserName=" . $username. "&txtEmail=".$email);
        exit();
    }
    else {

        $sql = "SELECT * FROM user WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../src/signup.php?error=sqlerror" );
            exit();
        } else{
            mysqli_stmt_bind_param($stmt,"s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck= mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../src/signup.php?error=usertaken");
                exit();
            } else
                {




                }
                    $sql = "SELECT * FROM user WHERE email=?";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                        header("Location: ../src/signup.php?error=sqlerror" );
                        exit();
                    } else{
                        mysqli_stmt_bind_param($stmt,"s", $email);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $resultCheck= mysqli_stmt_num_rows($stmt);
                        if ($resultCheck > 0) {
                            header("Location: ../src/signup.php?error=emailtaken");
                            exit();
                        }
                        else
                            {


                                $sql = "INSERT INTO user (userID, username, email, lastupdated, firstname,lastname, phone, status, Type,lastupdatedby) VALUES (?, ?, ?, ?,?,?,?,?,?,?);";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt,$sql))
                                {
                                    header("Location: ../src/signup.php?error=sqlerror" );
                                    exit();
                                }
                                else{
                                    $lastUpdated = date('Y-m-d H:i:s');
                                    $id=null;
                                    $status='A';
                                    $type= 'O';
                                    $lastUpdatedBy='Abdulla';
                                    mysqli_stmt_bind_param($stmt,"isssssssss", $id, $username, $email, $lastUpdated,$firstname,$lastname,$phone,$status,$type,$lastUpdatedBy);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_store_result($stmt);



                                    //hashing
                                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                    //get userid
                                    $sql = "SELECT userID FROM user where username= '$username'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    $userID = $row[0];



                                    $sql = "INSERT INTO credentials (UserID, PasswordPhrase) VALUES (?,?);";
                                    $stmt = mysqli_prepare($conn,$sql);
                                    mysqli_stmt_bind_param($stmt,"is", $userID,$hashedPwd);
                                    mysqli_stmt_execute($stmt);



                                    header("Location: ../src/login.php?signup=success");
                                    exit();
                                }

                        }





            }


        }


    }


} else {
    header("Location: ../src/signup.php");
    exit();
}