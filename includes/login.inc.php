<?php

if (isset($_POST['loginBtn'])) {
    require "dbh.inc.php";


    $username = mysqli_real_escape_string($conn, $_POST['txtUserName']);
    $password = mysqli_real_escape_string($conn, $_POST['txtPassword']);

    if (empty($username) || empty($password)) {
        header("Location: ../src/login.php?error=emptyfields");
        exit();
    } else {

        $sql = "select u.userID, u.username, u.firstname, c.PasswordPhrase FROM user u, Credentials c where u.userID=c.userID AND username=?;";
        $stmt = mysqli_prepare($conn, $sql);

        //prevents sql injection
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_row($result)) {


            if ($username != $row[1]) {
                header("Location: ../src/login.php?error=nouser");
                exit();
            } else {
                $pass = $row[3];
                $passwordCheck = password_verify($password, $row[3]);
                if ($passwordCheck == false) {
                    header("Location: ../src/login.php?error=wrongpass");
                    exit();
                } elseif ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row[0];
                    $_SESSION['username'] = $row[1];
                    $_SESSION['firstname'] = $row[2];
                    $_SESSION['last_login_timestamp']= time();

                    header("Location: ../src/users.php?login=success");
                    exit();
                } else {
                    header("Location: ../src/login.php?error=wrongpass");
                    exit();
                }
            }


        } else {
            header("Location: ../src/login.php?error=nouser");
            exit();
        }
    }


} else {
    header("Location: ../src/login.php");
    exit();
}