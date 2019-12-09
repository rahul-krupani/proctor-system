<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <head>
    <title>Teacher Files</title>
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
        <li class="nav-item">
            <a class="nav-link" href="/coursereg.php">Course Registration</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/filedown.php">Teacher Files <span class="sr-only">(current)</span> </a>
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
    <h5 style="padding:10px">Files uploaded by Proctors: </h5>
    <ul class="list-group list-group-flush col-md-5" style="padding:10px;">
    <?php 
    $files = scandir('./uploads');
    sort($files); // this does the sorting
    unset($files[0]);
    unset($files[1]);
    if(empty($files)){
        echo "No files found";
    }
    foreach($files as $file){
        echo'<li class="list-group-item" ><a href="/uploads/'.$file.'" download><h6><span class="fa fa-file" style="padding:5px;" aria-hidden="true"></span>'.$file.'</h6></a></li>';
    }
    ?>
    </ul>
    <footer class="page-footer font-small blue fixed-bottom bg-dark">


    <div class="footer-copyright text-center py-3 bg-info">© 2019 Copyright:
    <a href="#" style="color:black">Rahul Pramod Krupani & Raj Anand</a>
    </div>


    </footer>

    </body>
</html>