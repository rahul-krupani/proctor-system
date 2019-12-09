<?php
    session_start(); 

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <head>
		<title>Student Portal</title>
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!--Custom styles-->
		<!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
		<script language="JavaScript" type="text/javascript">
		$(document).ready(function(){
			$('.carousel').carousel({
			interval: 10
			})
		});    
		</script>
	</head>
	<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <a class="navbar-brand" href="#">Proctor System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/Form.php">Student Information</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/coursereg.php">Course Registration</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/filedown.php">Proctor Files</a>
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
	<div id="carouselExampleIndicators" class="carousel slide col-md-8" data-ride="carousel" style="left:300px;top:50px;height:400px;width:900px;">
	<ol class="carousel-indicators" style="top:470px">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
		<a href="/Form.php">
			<img class="d-block w-100" src="/images/1.jpg" style="height:500px;width:300px;" alt="First slide">
			<div class="carousel-caption d-none d-md-block">
				<h5>Student Information</h5>
			</div>
		</a>
		</div>
		<div class="carousel-item">
		<a href="/coursereg.php">
			<img class="d-block w-100" src="/images/2.jpeg" style="height:500px;width:300px;" alt="Second slide">
			<div class="carousel-caption d-none d-md-block">
				<h5>Course Registration</h5>
			</div>
		</a>
		</div>
		<div class="carousel-item">
		<a href="/filedown.php">
			<img class="d-block w-100" src="/images/3.jpg" style="height:500px;width:300px;" alt="Third slide">
			<div class="carousel-caption d-none d-md-block">
				<h5>File Portal</h5>
			</div>
		</a>
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="top:100px">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="top:100px">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	</div>
</div>
</div>



<footer class="page-footer font-small blue fixed-bottom bg-dark">


  <div class="footer-copyright text-center py-3 bg-info">© 2019 Copyright:
    <a href="#" style="color:black">Rahul Pramod Krupani & Raj Anand</a>
  </div>


</footer>
	<!-- <div style="position:fixed;bottom:0px;width:100%;height:150px;background-color:blue;">Hello</div> -->
</body>
</html>