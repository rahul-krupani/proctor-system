<?php include('server.php') ?>
<?php
    if(isset($_FILES['image'])){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];  
        move_uploaded_file($file_tmp,"uploads/".$file_name);
   }
   foreach($_POST as $key=>$value){
       if(preg_match('/markssubmit/',$key)){
            $index = substr($key, -1);
            $sname = $_POST['studentname'.$index];
            $name = $_POST['coursename'.$index];
            $mks = $_POST['marks'.$index];
            $att = $_POST['attendance'.$index];
            $query = 'UPDATE '.$sname.' SET marks='.$mks.', attendance='.$att.' WHERE coursename ="'.$name.'"';
            if ($conn->query($query) === TRUE) {
            } else {
                echo "Error creating table: " . $conn->error;
            }
       }
   }
?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <head>
		<title>File Upload</title>
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
        <li class="nav-item ">
            <a class="nav-link" href="/teacherindex.php">Home </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="/studentinfo.php">Proctee Information</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/updatecourses.php"> Proctee Courses<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="/fileup.php">File Upload</a>
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
    <h6 style='padding:10px;'>Proctee Students:<br/></h6>
    <?php
        $i = 0;
        $query = 'SELECT * FROM students where proctorname="'.$_SESSION['username'].'"';
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 0){
            echo "<h6 style='padding:10px;'>No Students found</h6>";
        } else {
            
            while($results = mysqli_fetch_assoc($result)){
                echo "<h6 style='padding:10px;'>".$results['name1']."</h6>";
                $dbname = str_replace(' ', '', $results['name1']);
                $sql1 = "SELECT * FROM ".$dbname;
                $sql2 = "SELECT * FROM ".$dbname."2";
                $courses = mysqli_query($db, $sql1);
                $years = mysqli_query($db, $sql2);
                $year = mysqli_fetch_assoc($years);
                echo '<h6 style="padding:10px;">Year '.$year['year'].'<br>Semester '.$year['semester'].'</h6>
                <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Course Title</th>
                    <th scope="col">Credits</th>
                    <th scope="col">Attempt Number</th>
                    <th scope="col">Faculty Handling<br>the Course</th>
                    <th scope="col">Attendance</th>
                    <th scope="col">Marks</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>';
                while($course = mysqli_fetch_assoc($courses)){
                    echo '<tr>
                    <th scope="row">'.$course['coursename'].'</th>
                    <td>'.$course['credits'].'</td>
                    <td>'.$course['attemptno'].'</td>
                    <td>'.$course['faculty'].'</td>';
                    if($course['attendance']==null){
                        echo '<form action="" method="post">
                        <td>
                        <div class="form-group">
                        <input value="'.$dbname.'" name="studentname'.$i.'" class="d-none">
                        <input value="'.$course['coursename'].'" name="coursename'.$i.'" class="d-none">
                        <input type="text" class="form-control" placeholder="Enter Attendance" name="attendance'.$i.'" required>
                        </div>
                        </td>
                        <td>
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Marks" name="marks'.$i.'" required>
                        </div>
                        </td>
                        <td>
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="submit"  name="markssubmit'.$i.'"> <span class="fa fa-plus" aria-hidden="true"></span> </button>
                        </div>
                        </td>';
                    }else{
                        echo '<td>'.$course['attendance'].'</td>
                        <td>'.$course['marks'].'</td>';
                    }
                    echo '</form></tr>';
                    $i++;
                }
                echo '</tbody>
              </table>';
            }      
        }
    ?>
    

    <footer class="page-footer font-small blue fixed-bottom bg-dark">


  <div class="footer-copyright text-center py-3 bg-info">© 2019 Copyright:
    <a href="#" style="color:black">Rahul Pramod Krupani & Raj Anand</a>
  </div>


</footer>
	<!-- <div style="position:fixed;bottom:0px;width:100%;height:150px;background-color:blue;">Hello</div> -->
</body>
</html>