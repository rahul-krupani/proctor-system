<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="AddRow.js"></script>
<head>
    <title>Course Registration</title>
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
        <li class="nav-item">
            <a class="nav-link" href="/Form.php">Student Information</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/coursereg.php">Course Registration <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/filedown.php">Teacher Files </a>
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
    
    <form class="needs-validation" style="margin:50px;" method="post" action="coursereg.php" novalidate>
        <div class="form-row">
            <div class="col-md-3 mb-3">
            <label for="validationCustom02">Academic Record of the semester</label>
                <input type="number" class="form-control" id="validationCustom02" name="year" placeholder="Academic Year" required>
            </div>
            <div class="col-md-2 mb-3">
            <label for="validationCustom02">&nbsp;</label>
                <input type="number" class="form-control" id="validationCustom02" name="semester" placeholder="Semester" required>
            </div>
        </div>

        <div>
              <div id="education_fields">
          
            </div>
            <div class="form-row">
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" id="CourseName" name="coursename[]" value="" placeholder="Course name">
            </div>

            <div class="col-md-2 mb-3">
                <input type="number" class="form-control" id="Credits" name="credits[]" value="" placeholder="No of credits">
            </div>

            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" id="Attemptno" name="attemptno[]" value="" placeholder="Attempt number">
            </div>
            <div class="col-md-3 mb-3">
                <input type="text" class="form-control" id="Faculty" name="faculty[]" value="" placeholder="Faculty Handling">
            </div>
        
        <div class="input-group-btn">
                <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
        </div>
        </div>
        <button class="btn btn-primary" type="submit" name="courseinfo">Submit</button>
    </form>




    <footer class="page-footer font-small blue fixed-bottom bg-dark">
    <div class="footer-copyright text-center py-3 bg-info">© 2019 Copyright:
    <a href="#" style="color:black">Rahul Pramod Krupani & Raj Anand</a>
    </div>


    </footer>
</body>
</html>