<?php
require 'head.php';
include_once 'includes/users.inc.php';
//if (isset($_SESSION['username'])) {
//
//} else{
////    header("Location: index.php?error=niceTry");
////    exit();
//}

?>


<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

    <div class="container-fluid">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-12">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "select") {
                    echo '<div class="alert alert-danger" role="alert">
  Please Select The User You Would Like To Assign And The Project You Would Like To Assign To.
</div>';
                }
            } ?>
            <table class="table table-hover table-dark table-striped table-responsive">
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Type</th>
                    <th>LastUpdated</th>
                    <th>LastUpdatedBy</th>
                    <th>ProjectID</th>
                    <th>Assign Project</th>
                    <th>Unassign Project</th>
                </tr>
                <?PHP
                if (isset($_SESSION['userID'])) {
                    include_once 'includes/dbh.inc.php';

                    $sql = "SELECT userID, username, firstname,lastname,email,phone,status,type,lastupdated,lastupdatedby,projectID  FROM user;";
                    $stmt = mysqli_prepare($conn, $sql);


                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../login.php?error=sqlerror");
                        exit();
                    } else {


                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);


                        foreach ($result as $row) {
                            echo "<tr><td>" .
                                htmlspecialchars($row['userID'], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["firstname"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["lastname"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["phone"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["status"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["type"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["lastupdated"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["lastupdatedby"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["projectID"], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                "<a   id=\"myBtn\" type='button' class=\"btn btn-info\"   href=\"users.php?edit=" .
                                $row['userID'] .
                                "\">Assign</a>" .
                                "</td><td>" .
                                "<a class=\"btn btn-danger\" href=\"includes/users.inc.php?delete=" .
                                $row['userID'] .
                                "\">Remove</a>" .
                                "</td></tr>";

                        }

                    }
                }

                ?>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-12">
            <div class=" ">
                <div class="card-body body1">

                    <?php include_once 'includes/users.inc.php'; ?>
                    <form action="includes/users.inc.php" style="display: <?php if (isset($_GET['edit'])) {
                        echo 'block';
                    } else {
                        echo 'none';
                    } ?>;" method="post">
                        <input type="hidden" name="id" value="<?php echo $userID; ?>">
                        <div class="form-group">
                            <label class="col-form-label-lg">Select Project:</label>
                            <select name="projects" id="projects" class="custom-select btn-dark bg-dark text-white">
                                <option value="0">-- Projects --</option>
                                <?php
                                $result = mysqli_query($conn, "select * from project");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value='$row[ProjectID]'>$row[Title]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning" name="save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 mb-7">
            <table class="table table-hover table-dark table-striped w-100 table-responsive">
                <tr>
                    <th>UserID</th>
                    <th>PasswordPhrase</th>
                </tr>
                <?PHP
                if (isset($_SESSION['userID'])) {
                    include_once 'includes/dbh.inc.php';
                    $sql = "SELECT userID, PasswordPhrase  FROM credentials;";
                    $stmt = mysqli_prepare($conn, $sql);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../login.php?error=sqlerror");
                        exit();
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        foreach ($result as $row) {
                            echo "<tr><td>" .
                                htmlspecialchars($row['userID'], ENT_QUOTES, 'UTF-8') .
                                "</td><td>" .
                                htmlspecialchars($row["PasswordPhrase"], ENT_QUOTES, 'UTF-8') .
                                "</td></tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>


    <br/>
    <!--Cards-->
    <div class="container-fluid bg-light text-dark">
        <div class="row">


        </div>
    </div>
</div>
</div>

<?php require 'footer.php'; ?>
