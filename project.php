<?php
require 'head.php';
//include_once 'includes/users.inc.php';


?>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom bg-light">

    <!--Cards-->
    <div class="container-fluid bg-light text-dark">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3 ">
                <div class="float-left">
                    <div class="card-body body1 ">
                        <button id="myBtn" class="btn btn-warning">Create Project</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">

        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 mb-9">
            <table class="table table-hover table-dark table-striped table-responsive">
                <tr>
                    <th>ProjectID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>CreationDate</th>
                    <th>lastUpdated</th>
                    <th>lastUpdatedBy</th>
                    <th>ProjectOwner</th>
                </tr>
                <?PHP
                if (isset($_SESSION['userID'])) {
                    include_once 'includes/dbh.inc.php';

                    $sql = "SELECT ProjectID, Title, Description,CreationDate,lastUpdated,lastUpdatedBy,ProjectOwner FROM project;";
                    $stmt = mysqli_prepare($conn, $sql);


                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);


                    foreach ($result as $row) {
                        echo "<tr><td>" .
                            htmlspecialchars($row['ProjectID'], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["Title"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["Description"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["CreationDate"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["lastUpdated"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["lastUpdatedBy"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["ProjectOwner"], ENT_QUOTES, 'UTF-8') .
                            "</td></tr>";


                    }
                }


                ?>
            </table>

        </div>
    </div>
    <br/>


</div>


<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content bg-dark">
        <span class="close">&times;</span>

        <div class="  mx-auto text-center form p-4 bg-white">
            <h2 class="text-center" id="title"><img src="images/logocrop.png"
                                                    id="ContentPlaceHolder1_logo" alt="logocopy"
                                                    class="teamLogo"/></h2>
            <div class="px-2 ">
                <div id="form" class="justify-content-center ">
                    <div align="center">
                        <form action="includes/project.inc.php" method="post">
                            <fieldset>
                                <p align="center" class="text-uppercase text-orange"><b>Create a Project:</b></p>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="txtTitle" id="txtTitle" type="text"
                                                       class="form-control" placeholder="Project Title"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" name="txtDescription" id="txtDescription"
                                                   class="form-control" placeholder="Description"/>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['error'])) {
                                    ?>
                                    <script type="text/javascript">window.onload =function(){ modal.style.display = "block";document.getElementById("loader").style.display = "none";
                                            document.getElementById("myDiv").style.display = "block";}</script>
                                <?php
                                    if ($_GET['error'] == "emptyfields") {
                                        echo '<p class= "alert text-danger"> Fill in all fields!</p>';
                                    } else if ($_GET['error'] == "titletaken") {
                                        echo '<p class= "alert text-danger"> Title already in use!</p>';
                                    }
                                }
                                ?>
                                <div class="form-group" align="center">
                                    <input type="submit" name="btnCreate" value="Create Project"
                                           id="ContentPlaceHolder1_btnCreate" class="btn btn-warning"/>
                                    <br/>
                                </div>
                                <div>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function () {
        modal.style.display = "block";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function openModal(){
        modal.style.display = "block";
    }
</script>

<?php require 'footer.php'; ?>
