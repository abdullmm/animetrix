<?php

if (isset($_POST['btnCreate'])) {

    include_once 'dbh.inc.php';

    session_start();
    $boxName = mysqli_real_escape_string($conn, $_POST['txtBoxName']);
    $id = null;
    $batteryStatus = 'f';
    $animalStatus = 'i';
    $active = 'a';

    if (empty($boxName) ) {
        header("Location: ../src/box.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM Box WHERE BoxName=?";
        $stmt = mysqli_prepare($conn,$sql);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../src/box.php?error=sqlerror" );
            exit();
        } else{
            mysqli_stmt_bind_param($stmt,"s", $boxName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck= mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../src/box.php?error=titletaken");
                exit();
            }
            else
            {




                $sql = "INSERT INTO Box (BoxSerialNumber, BoxName, BatteryStatus, AnimalStatus, Active) VALUES (?, ?, ?, ?,?);";
                $stmt = mysqli_prepare($conn,$sql);

                mysqli_stmt_bind_param($stmt, "issss", $id, $boxName, $batteryStatus,$animalStatus, $active);
                mysqli_stmt_execute($stmt);
                header("Location: ../src/box.php?creation=success");
                exit();
            }

        }

    }
} else {
    header("Location: ../src/box.php");
    exit();
}