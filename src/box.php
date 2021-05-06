<?php
require 'head.php';
//include_once 'includes/users.inc.php';


?>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom bg-light">

    <!--Cards-->
    <div class="container-fluid bg-light text-dark">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">
                <div class=" ">
                    <div class="card-body body1">
                        <button id="myBtn" class="btn btn-warning">Register Box</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-6">
            <table class="table table-hover table-dark table-striped table-responsive">
                <tr>
                    <th>BoxSerialNumber</th>
                    <th>BoxName</th>
                    <th>BatteryStatus</th>
                    <th>AnimalStatus</th>
                    <th>Active</th>

                </tr>
                <?PHP
                if (isset($_SESSION['userID'])) {
                    include_once '../includes/dbh.inc.php';

                    $sql = "SELECT BoxSerialNumber, BoxName, BatteryStatus, AnimalStatus, Active FROM Box;";
                    $stmt = mysqli_prepare($conn, $sql);


                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);


                    foreach ($result as $row) {
                        echo "<tr><td>" .
                            htmlspecialchars($row['BoxSerialNumber'], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["BoxName"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["BatteryStatus"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["AnimalStatus"], ENT_QUOTES, 'UTF-8') .
                            "</td><td>" .
                            htmlspecialchars($row["Active"], ENT_QUOTES, 'UTF-8') .
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
            <h2 class="text-center" id="title"><img src="../web/images/logocrop.png"
                                                    id="ContentPlaceHolder1_logo" alt="logocopy"
                                                    class="teamLogo"/></h2>
            <div class="px-2 ">
                <div id="form" class="justify-content-center ">
                    <div align="center">
                        <form action="../includes/box.inc.php" method="post">
                            <fieldset>
                                <p align="center" class="text-uppercase text-orange"><b>Register a Box:</b></p>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="txtBoxName" id="txtBoxName" type="text"
                                                       class="form-control" placeholder="Box Name"/>
                                            </div>
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
                                        echo '<p class= "alert text-danger"> BoxName already in use!</p>';
                                    }
                                }
                                ?>
                                <div class="form-group" align="center">
                                    <input type="submit" name="btnCreate" value="Register"
                                           id="btnCreate" class="btn btn-warning"/>
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
