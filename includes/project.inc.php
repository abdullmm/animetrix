<?php

if (isset($_POST['btnCreate'])) {

    include_once 'dbh.inc.php';

    session_start();
    $title = mysqli_real_escape_string($conn, $_POST['txtTitle']);
    $description = mysqli_real_escape_string($conn, $_POST['txtDescription']);

    if (empty($description) || empty($title) ) {
        header("Location: ../src/project.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM project WHERE Title=?";
        $stmt = mysqli_prepare($conn,$sql);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../src/project.php?error=sqlerror" );
            exit();
        } else{
            mysqli_stmt_bind_param($stmt,"s", $title);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck= mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../src/project.php?error=titletaken");
                exit();
            }
            else
            {

                $lastUpdated = date('Y-m-d H:i:s');
                $creationDate= date('Y-m-d H:i:s');
                $id = null;
                $lastUpdatedBy = 'Abdulla';

//                $sql = "INSERT INTO project (ProjectID, Title, Description, creationdate, lastUpdated,lastupdatedby, ProjectOwner) VALUES (?, ?, ?, ?,?,?,?);";
                $sql = "INSERT INTO project (ProjectID, Title, Description, CreationDate, lastUpdated,lastUpdatedBy, ProjectOwner) VALUES (?, ?, ?, ?,?,?,?);";
                $stmt = mysqli_prepare($conn,$sql);

                 mysqli_stmt_bind_param($stmt, "isssssi", $id, $title, $description,$creationDate, $lastUpdated, $lastUpdatedBy, $_SESSION['userID']);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../src/project.php?creation=success");
                    exit();
                }

    }

}
} else {
    header("Location: ../src/project.php");
    exit();
}