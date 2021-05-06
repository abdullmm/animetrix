<?php



if (isset($_POST['Activate'])) {

    include_once 'dbh.inc.php';

    $boxSerialNumber = mysqli_real_escape_string($conn,$_POST['boxSerialNumber']);
    $boxName = mysqli_real_escape_string($conn,$_POST['boxName']);
    $batteryStatus= mysqli_real_escape_string($conn,'F');
    $active= mysqli_real_escape_string($conn,'Y');


    $sql = "SELECT * FROM box WHERE BoxSerialNumber='$boxSerialNumber';";
    $result = mysqli_query($conn, $sql);
    $row= mysqli_fetch_row($result);
    $num= $row[0];


    if($num==$boxSerialNumber)
    {
        header("Location: ../src/signup.php");
        exit();

    }
 else{
        header("Location: ../src/activate.php");
        exit();
    }







} else {
    header("Location: ../src/activate.php");
    exit();
}