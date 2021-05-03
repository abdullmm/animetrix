

<?php require 'head.php';

include 'includes/dbh.inc.php';
$update=false;
?>
<div id="myDiv2" class="bg-light">

    <form class="form-inline" action="observation.php"  method="post">
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="searchbar">
                    <input class="search_input" type="text" name="search" placeholder="Search...">
                    <button type="submit" class="search_icon search_input2"  name="submit-search"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
    <div class="container-fluid" >
        <table class="table table-responsive table-hover table-dark table-striped">
            <tr>
                <th>ObservationNumber</th>
                <th>Genus</th>
                <th>Species</th>
                <th>Size</th>
                <th>Weight</th>
                <th>Temperature</th>
                <th>Humidity</th>
                <th>ArrivalDayTime</th>
                <th>DepartureDayTime</th>
                <th>TotalTime</th>
                <th>LastUpdated</th>
                <th>LastUpdatedBy</th>
                <th>BoxSerialNumber</th>
                <th>ProjectID</th>
                <th>Edit</th>

            </tr>
            <?php
            if (isset($_POST['submit-search'])) {

                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM Observation WHERE genus like '%$search%' OR species like '%$search%' ";
            } else {
                $sql = "Select * FROM Observation";
            }
            $result = mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            if ($queryResults > 0) {
                if ($queryResults == 1) {
                    echo "There is " . $queryResults . " result!";
                } else {
                    echo "There are " . $queryResults . " results!";
                }
                while ($row = mysqli_fetch_assoc($result)) {


                    echo "<tr><td>" .
                        htmlspecialchars($row['ObservationNumber'], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["genus"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["species"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["size"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["weight"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["temperature"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["humidity"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["ArrivalDayTime"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["DepartureDayTime"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["TotalTime"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["LastUpdated"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["LastUpdatedBy"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row['BoxSerialNumber'], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        htmlspecialchars($row["ProjectID"], ENT_QUOTES, 'UTF-8') .
                        "</td><td>" .
                        "<a   id=\"editBtn\" type='button' name=\"edit\" data-modal=\"editModal\" onclick=\"setVar();\" class=\"btn btn-info\"  href=\"observation.php?edit=" .
                        $row['ObservationNumber'] .
                        "\">Edit</a>" .
                        "</td></tr>";

                }
            }
            ?>
        </table>


    </div>
    <br />
    <!--Cards-->
    <div class="container-fluid bg-light text-dark">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">
                <div class=" ">
                    <div class="card-body body1">
                        <a   id="editBtn" type='button' name="edit" data-modal="editModal" class="btn btn-warning"  onclick="setVar();" href="observation.php?create=">Add Observation</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">
                <div class="card card2">
                    <div id="piechart" class="card-body body2">

                    </div>
                </div>
            </div>
<!--            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">-->
<!--                <div class=" card card3">-->
<!--                    <div class="card-body body3">-->
<!--                        <h5 class="card-title3">Engage.</h5>-->
<!--                        <p class="card-text text3">Seen a species before? Engage with other users, students, and researchers on our FORUM page to join in the discussion.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">-->
<!--                <div class="card card4">-->
<!--                    <div class="card-body body4">-->
<!--                        <h5 class="card-title4">Explore.</h5>-->
<!--                        <p class="card-text text4">Want to gather your own data? Purchase a device, register it, and start collecting data on species near you. Check out our DEVICES page to get started today.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>

    </div>
</div>

<?php
$obsID=0;
$genus = "";
$species = "";
$size = "";
$weight = "";
$temperature = "";
$humidity = "";
$arrivalDayTime = "";
$departureDayTime = "";
$totalTime = 0;
$lastUpdated = date('Y-m-d H:i:s');
$lastUpdatedBy = 'Abdulla';
$boxSerialNumber = 0;
$projectID = "";
if (isset($_GET['edit'])) {
    $obsID = $_GET['edit'];

    $sql = "SELECT * FROM observation where ObservationNumber=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $obsID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_array($result)) {

        $genus = $row['genus'];
        $species = $row['species'];
        $size = $row['size'];
        $weight = $row['weight'];
        $temperature = $row['temperature'];
        $humidity = $row['humidity'];
        $arrivalDayTime = $row['ArrivalDayTime'];
        $departureDayTime = $row['DepartureDayTime'];
        $totalTime = abs(strtotime($departureDayTime) - strtotime($arrivalDayTime)) / 60;
        $lastUpdated = date('Y-m-d H:i:s');
        $lastUpdatedBy = 'Abdulla';
        $boxSerialNumber = $row['BoxSerialNumber'];
        $projectID = $row['ProjectID'];

    }

}

if (isset($_GET['create'])) {
    $obsID=0;
    $genus = "";
    $species = "";
    $size = "";
    $weight = "";
    $temperature = "";
    $humidity = "";
    $arrivalDayTime = "";
    $departureDayTime = "";
    $totalTime = 0;
    $lastUpdated = date('Y-m-d H:i:s');
    $lastUpdatedBy = 'Abdulla';
    $boxSerialNumber = "";
    $projectID = "";
}
?>

<div id="editModal" class="modal">

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
                        <form action="includes/observation.inc.php" method="post">
                            <fieldset>
                                <input type="hidden" value="<?php echo $obsID?>" id="first" name="obsID">
                                <p align="center" class="text-uppercase text-orange"><b>Create Observation:</b></p>

                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtGenus" id="txtGenus" value="<?php echo $genus; ?>"
                                                   type="text"
                                                   class="form-control" placeholder="Genus"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            <input type="text" name="txtSpecies" value="<?php echo $species; ?>"
                                                   id="txtSpecies"
                                                   class="form-control" placeholder="Species"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtSize" id="txtSize" value="<?php echo $size; ?>" type="text"
                                                   class="form-control" placeholder="Size"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtWeight" type="number" id="txtWeight"
                                                   value="<?php echo $weight; ?>" step="0.01" min="0" max="200"
                                                   class="form-control" placeholder="Weight(oz)"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtTemperature" type="number"
                                                   value="<?php echo $temperature; ?>" step="0.01" min="0" max="170"
                                                   id="txtTemperature"
                                                   class="form-control" placeholder="Temperature"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtHumidity" type="number" step="0.01" min="0" max="100"
                                                   id="txtHumidity" value="<?php echo $humidity; ?>"
                                                   class="form-control" placeholder="Humidity %"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtArrivalDayTime" type="text"
                                                   value="<?php echo $arrivalDayTime; ?>"
                                                   onfocus="(this.type='datetime-local')"
                                                   id="txtArrivalDayTime" class="form-control"
                                                   placeholder="ArrivalDayTime"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input name="txtDepartureDayTime" value="<?php echo $departureDayTime; ?>"
                                                   type="text" onfocus="(this.type='datetime-local')"
                                                   id="txtDepartureDayTime" class="form-control"
                                                   placeholder="DepartureDayTime"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="boxes" id="boxes" value="<?php echo $boxSerialNumber; ?>"
                                                    class="form-control">
                                                <?php
                                                if(isset($_GET['edit'])) {
                                                    $result = mysqli_query($conn, "select BoxName from box b, observation o where b.BoxSerialNumber= " . $boxSerialNumber);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $boxName = $row['BoxName'];
                                                    echo "<option value = \"$boxSerialNumber\">$boxName</option>";

                                                    $result = mysqli_query($conn, "select * from Box WHERE BoxSerialNumber !=".$boxSerialNumber);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value='$row[BoxSerialNumber]'>$row[BoxName]</option>";
                                                    }
                                                } else{
                                                    $result = mysqli_query($conn, "select * from Box WHERE BoxSerialNumber");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value='$row[BoxSerialNumber]'>$row[BoxName]</option>";
                                                    }
                                                }?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <select name="projects" id="projects"  class="form-control">

                                                <?php
                                                if(isset($_GET['edit'])){
                                                    $result = mysqli_query($conn, "select Title from Project p, observation o where p.ProjectID= ".$projectID);
                                                    $row = mysqli_fetch_assoc($result);
                                                    $title = $row['Title'];
                                                    echo "<option value = \"$projectID\">$title</option>";

                                                    $result = mysqli_query($conn, "select * from Project where ProjectID !=".$projectID);
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value=\"$row[ProjectID]\">$row[Title]</option>";
                                                    }
                                                }else{
                                                    $result = mysqli_query($conn, "select * from Project");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo "<option value='$row[ProjectID]'>$row[Title]</option>";
                                                    }
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <?php
                                if (isset($_GET['error'])) {
                                    if ($_GET['error'] == "emptyfields") {
                                        echo '<p class= "alert text-danger"> Fill in all fields!</p>';
                                    } else if($_GET['error']=="totalTime"){
                                        echo '<p class= "alert text-danger"> Arrival time must be before departure time!</p>';
                                    }
                                }
                                if(isset($_GET['success'])){
                                ?>
                                    <script>onload= sessionStorage.setItem("myval", "true");</script>
                                <?php
                                }
                                ?>

                                <div class="form-group" align="center">
                                    <?php if(isset($_GET['edit'])){
                                        echo"<input type=\"submit\" name=\"btnUpdate\" value=\"Update Observation\"
                                           id=\"btnUpdate\" class=\"btn btn-warning\"/>";
                                    } else {
                                        echo "                                    <input type=\"submit\" name=\"btnCreate\" value=\"Create Observation\"
                                           id=\"btnCreate\" class=\"btn btn-warning\"/>";
                                    }
                                    ?>

                                    <br/>
                                </div>

                            </fieldset>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
function setVar() {
    sessionStorage.setItem("myval", "false");
}


</script>
<script>
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var modal = document.getElementById("editModal");
    var modalBtns = [...document.querySelectorAll(".editBtn")];
    var myval = "true";
    var check = sessionStorage.getItem("myval");

        if (check=="false") {
                modal.style.display = "block";

        }else{
        }


    modalBtns.forEach(function (btn) {
        btn.onclick = function () {
            //testing the filling of a box
            modal.style.display = "block";

        }
    });

    //closes modal
    window.onclick = function (event) {
        if (event.target.className === "modal") {
            event.target.style.display = "none";
            sessionStorage.setItem("myval", "true");
        }
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }




</script>
<?php
$query = "SELECT p.title Title, count(o.observationnumber) number from project p, observation o where p.ProjectID=o.ProjectID group by o.ProjectID;";
$result = mysqli_query($conn, $query);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
    {
        var data = google.visualization.arrayToDataTable([
            ['Title', 'Number'],
            <?php
            while($row = mysqli_fetch_array($result))
            {
                echo "['".$row["Title"]."', ".$row["number"]."],";
            }
            ?>
        ]);
        var options = {
            title: 'Percentage of Observations Per Project',
            //is3D:true,
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<?php require 'footer.php'; ?>
