
<?php require 'head.php' ?>
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

        <div class="text-center bg-dark">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div id="cover" class="min-vh-100 bg-dark">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4 bg-white">
                                    <form  id="activateForm" action="includes/activate.inc.php" method="post" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                                    <h2 class="text-center" id="title"><img src="images/logocrop.png" id="ContentPlaceHolder1_logo" alt="logocopy" class="teamLogo" /></h2>
                                    <p >Activate Your Device & Create an Account</p>
                                    <div class="px-2 ">
                                        <div id="form" class="justify-content-center">
                                            <div class="form-group">
                                                <span id="ContentPlaceHolder1_Description">Enter your device number and your activation key to active. Once you active your device. Create an Account</span>
                                            </div>
                                            <div class="form-group">

                                                <input name="boxSerialNumber" type="text" id="boxSerialNumber" class="form-control" placeholder="Serial Number" />
                                            </div>
                                            <div class="form-group">

                                                <input name="boxName" type="text" id="boxName" placeholder="Box Name" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="Activate" value="Activate Device" id="ContentPlaceHolder1_Activate" class="btn btn-warning form-control" />

                                            </div>
                                            <br />

                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php require 'footer.php'; ?>
