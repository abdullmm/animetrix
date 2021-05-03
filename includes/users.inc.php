<?php
include'dbh.inc.php';

$userID=0;
$lastUpdated= date('Y-m-d H:i:s');
if (isset($_POST['save'])) {


    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $project = mysqli_real_escape_string($conn, $_POST['projects']);

    if($project != 0){
        $sql = "Update user set ProjectID=?, LastUpdated=? where UserID=?";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "isi",$project, $lastUpdated, $id);
        mysqli_stmt_execute($stmt);
        header("Location: ../users.php?success");
        exit();
    } else {
        header("Location: ../users.php?error=select");
        exit();
    }






    

}
if (isset($_GET['delete'])) {
    $userID= $_GET['delete'];
    $projectID=null;

//    //delete credentials
//    $sql = "Delete FROM credentials where UserID=?";
//    $stmt = mysqli_prepare($conn,$sql);
//    mysqli_stmt_bind_param($stmt, "i", $id);
//    mysqli_stmt_execute($stmt);

    //remove from project

    $sql = "Update user set ProjectID=?, LastUpdated=? where UserID=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "isi",$projectID, $lastUpdated, $userID);
    mysqli_stmt_execute($stmt);

    header("Location: ../users.php?success");
    exit();

}

if(isset($_GET['edit'])){
    $userID = $_GET['edit'];
    $sql = "SELECT * FROM user WHERE UserID=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../users.php?error=sqlerror" );
        exit();
    } else{
        mysqli_stmt_bind_param($stmt,"i", $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck= mysqli_stmt_num_rows($stmt);
        if ($resultCheck == 1) {

        } else {
            header("Location: ../users.php?error=recorderror");
            exit();
        }
    }
}









