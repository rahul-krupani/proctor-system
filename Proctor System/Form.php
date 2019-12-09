<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<head>
<title>General Information</title>
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
        <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    </head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#">Proctor System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/index.php">Home </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/Form.php">Student Information<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/coursereg.php">Course Registration</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/filedown.php">Teacher Files</a>
        </li>
        <li class="nav-item">
            <a class="mr-sm-2" style="position:fixed; right:60px; padding: 6px 0;"><?php echo $_SESSION['username']; ?></a>
        </li>
        <li class="nav-item">
        <a class = "mr-sm-2" href="index.php?logout='1'" style="color: red; position:fixed; right:0px; padding: 6px 0;" >Logout</a>
        </li>
        </ul>
    </div>
    </nav>

    <?php
    $s1 = 'SELECT * FROM students2 WHERE name1="'.$_SESSION['username'].'"';
    $result = mysqli_query($db, $s1);
    if($result == false){
        echo '<form class="needs-validation" style="margin:50px;" method="post" action="Form.php" novalidate>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                <label for="validationCustom01">Student\'s Details</label>
                    <input type="text" class="form-control" id="validationCustom01" name="name1" placeholder="Full name" required>
                </div>
                <div class="col-md-3 mb-3">
                <label for="validationCustom02">Date of Birth</label>
                    <input type="date" class="form-control" id="validationCustom02" name="dob" placeholder="Date of Birth" required>
                </div>
                <div class="col-md-2 mb-3">
                <label for="validationCustom02">&nbsp;</label>
                    <input type="text" class="form-control" id="validationCustom02" name="blood" placeholder="Blood Group" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <input type="text" class="form-control" id="validationCustom03" name="proctorname" placeholder="Proctor name" required>
                </div>
                <div class="col-md-2 mb-3">
                    <input type="text" class="form-control" id="validationCustom03" name="phoneno" placeholder="Phone number" required>
                </div>
                <div class="col-md-5 mb-3">
                    <input type="email" class="form-control" id="validationCustom04" name="email" placeholder="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                <label for="validationCustom05">Father\'s Details</label>
                    <input type="text" class="form-control mb-1" id="validationCustom05" name="fname" placeholder="Name" required>
                    <div class="mb-1">
                        <input type="text" class="form-control" id="validationCustom05" name="focc" placeholder="Occupation" required>
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" id="validationCustom05" name="fno" placeholder="Contact Number" required>
                    </div>
                    <div class="mb-1">
                        <input type="email" class="form-control" id="validationCustom05" name="femail" placeholder="Email" required>
                    </div>
                </div>
                <div class="col-md-5">
                <label for="textArea">&nbsp; </label>
                    <textarea class="form-control" rows="6" name="fadd" placeholder="Address" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-5 mb-3">
                <label for="validationCustom05">Mother\'s Details</label>
                    <input type="text" class="form-control mb-1" id="validationCustom05" name="mname" placeholder="Name" required>
                    <div class="mb-1">
                        <input type="text" class="form-control" id="validationCustom05" name="mocc" placeholder="Occupation" required>
                    </div>
                    <div class="mb-1">
                        <input type="text" class="form-control" id="validationCustom05" name="mno" placeholder="Contact Number" required>
                    </div>
                    <div class="mb-1">
                        <input type="email" class="form-control" id="validationCustom05" name="memail" placeholder="Email" required>
                    </div>
                </div>
                <div class="col-md-5">
                <label for="textArea">&nbsp; </label>
                    <textarea class="form-control" rows="6" name="madd" placeholder="Address" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <label for="Accomodation1" style="padding-right:10px;">Accomodation</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="Accomodation1" name="acc"value="Day Scholar" class="custom-control-input" >
                    <label class="custom-control-label" for="Accomodation1">Day Scholar</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="Accomodation2" name="acc" value="Hostel" class="custom-control-input">
                    <label class="custom-control-label" for="Accomodation2">Hostel</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="Accomodation3" name="acc" value="Paying Guest" class="custom-control-input">
                    <label class="custom-control-label" for="Accomodation3">Paying Guest</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="studentinfo">Submit form</button>
        </form>';
    } else {
        echo '<h6 style="padding:20px;">Information already entered</h6>';
    }
    ?>


    <footer class="page-footer font-small blue fixed-bottom bg-dark">


    <div class="footer-copyright text-center py-3 bg-info">© 2019 Copyright:
        <a href="#" style="color:black">Rahul Pramod Krupani & Raj Anand</a>
    </div>


    </footer>

    <!-- <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script> -->
</body>

</html>