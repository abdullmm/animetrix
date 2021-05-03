<?php
include_once 'dbh.inc.php';
$id= null;
$genus = mysqli_real_escape_string($conn, $_POST['txtGenus']);
$species = mysqli_real_escape_string($conn, $_POST['txtSpecies']);
$size = mysqli_real_escape_string($conn, $_POST['txtSize']);
$weight = mysqli_real_escape_string($conn, $_POST['txtWeight']);
$temperature = mysqli_real_escape_string($conn, $_POST['txtTemperature']);
$humidity = mysqli_real_escape_string($conn, $_POST['txtHumidity']);
$arrivalDayTime = mysqli_real_escape_string($conn, $_POST['txtArrivalDayTime']);
$departureDayTime = mysqli_real_escape_string($conn, $_POST['txtDepartureDayTime']);
$totalTime  = (strtotime($departureDayTime) - strtotime($arrivalDayTime))/60;
$lastUpdated = date('Y-m-d H:i:s');
$lastUpdatedBy = 'Abdulla';
$boxSerialNumber = mysqli_real_escape_string($conn, $_POST['boxes']);
$projectID = mysqli_real_escape_string($conn, $_POST['projects']);

if (isset($_POST['btnUpdate'])) {
    $id= $_POST['obsID'];

    $sql = "UPDATE Observation set genus=?,species=?,size=?,weight=?,temperature=?,humidity=?,ArrivalDayTime=?,DepartureDayTime=?,TotalTime=?,LastUpdated=?,LastUpdatedBy=?,BoxSerialNumber=?,ProjectID=? WHERE ObservationNumber=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "ssssssssissiii",$genus,$species,$size,$weight,$temperature,$humidity,$arrivalDayTime,$departureDayTime,$totalTime,$lastUpdated,$lastUpdatedBy,$boxSerialNumber,$projectID,$id);
    mysqli_stmt_execute($stmt);

    header("Location: ../observation.php?success");
    exit();
}

if (isset($_POST['btnCreate'])) {


    //Check for empty fields
    if (empty($weight) || empty($boxSerialNumber) || empty($humidity) || empty($temperature)) {
        header("Location: ../observation.php?error=emptyfields");
        exit();
    } //Check if email is valid
    else if (!is_numeric($weight)) {
        header("Location: ../observation.php?error=invalidweight");
        exit();
    } else if (!is_numeric($temperature)) {
        header("Location: ../observation.php?error=temperature");
        exit();
    } else if (!is_numeric($humidity)) {
        header("Location: ../observation.php?error=invalidhumidity");
        exit();
    } else if($totalTime<1){
        header("Location: ../observation.php?error=totalTime");
        exit();
    } else {
        $sql = "INSERT INTO Observation(ObservationNumber,genus,species,size,weight,temperature,humidity,ArrivalDayTime,DepartureDayTime,TotalTime,LastUpdated,LastUpdatedBy,BoxSerialNumber,ProjectID) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt, "issssssssissii",$id,$genus,$species,$size,$weight,$temperature,$humidity,$arrivalDayTime,$departureDayTime,$totalTime,$lastUpdated,$lastUpdatedBy,$boxSerialNumber,$projectID);
        mysqli_stmt_execute($stmt);

        header("Location: ../observation.php?success");
        exit();

    }
} else {
    header("Location: ../observation.php");
    exit();
}