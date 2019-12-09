<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title> 
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <style>
        .card {
        height: 675px;
        color:white;
        }
        .buff{
            padding-top:25px;
        }
        h6{
            padding-top: 10px;
        }
    </style>
    <script type="text/JavaScript">
        //$(document).ready($(".hidden").show(););
        $(document).ready(
            function(){
            $(".hidden").hide();
            $("#fdsa").click(function(){
                $(".hidden").hide();
                $(".card").css("height", "675px");
            });
            $("#asdf").click(function(){
                $(".hidden").show();
                $(".card").css("height", "800px");
            });
        });
        // $(document).ready($('.hidden').hide(););
        // $("#asdf").change(function() {
        //     alert("asqwa");
        //     if ($(this).val() == "student") {
        //         $('.hidden').show();
        //     } else {
        //         alert("teaf");
        //         $('.hidden').hide();
        //     }
        // });
        // $(".option").trigger("change");
    </script>
</head>
<body>
<?php include('errors.php'); ?>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
				<form method="post" action="register.php">
                    <div class="justify-content-center">
                        <h6>Name:</h6>
                    </div>
                    <div class="input-group">
                        <input type="text" name="name1" class="form-control" value="<?php echo $name1; ?>">
                    </div>
                    <div class="justify-content-center">
                        <h6>Email:</h6>
                    </div>
                    <div class="input-group">
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                    </div>
                    <div class="justify-content-center">
                        <h6>Phone Number:</h6>
                    </div>
                    <div class="input-group">
                        <input type="text" name="phoneno" class="form-control" value="<?php echo $phoneno; ?>">
                    </div>
                    <div class="justify-content-center">
                        <h6>Password:</h6>
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password_1">
                    </div>
                    <div class="justify-content-center">
                        <h6>Confirm password:</h6>
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password_2">
                    </div>
                    <div class="input-group">
                        <input type="radio" class="option" id="fdsa" name="option" value="proctor">Proctor<br>
                    </div> 
                    <div class="input-group">
                        <input type="radio" class="option" id="asdf" name="option" value="student">Student
                    </div>
                    <div class="hidden">
                        <div class="justify-content-center hidden">
                            <h6 class="hidden">USN:</h6>
                        </div>
                        <div class="input-group hidden">
                            <input type="text" name="USN" class="form-control hidden" value="<?php echo $USN; ?>">
                        </div>
                        <div class="justify-content-center hidden">
                            <h6 class="hidden">Proctor Name:</h6>
                        </div>
                        <div class="input-group hidden">
                            <input type="text" name="proctorname" class="form-control hidden" value="<?php echo $proctorname; ?>">
                        </div>
                    </div>
                    <div class="input-group buff">
                        <button type="submit" class="btn" name="reg_user">Register</button>
                    </div>
					<!-- <div class="input-group form-group">
						 <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div> 
						<input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $email; ?>">
						
					</div>
					<div class="input-group form-group">
						 <div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div> 
						<input type="password" class="form-control" placeholder="password" name="password">
					</div> -->
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Already have an account?<a href="login.php">Log In</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>