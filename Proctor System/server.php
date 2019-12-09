
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

// initializing variables
$name1 = "";
$email    = "";
$phoneno = "";
$USN = "";
$proctorname = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'blueberry', 'myDB');
$conn = new mysqli('localhost', 'root', 'blueberry', 'myDB');



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name1 = mysqli_real_escape_string($db, $_POST['name1']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $option = mysqli_real_escape_string($db, $_POST['option']);

  if($option == 'proctor'){
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name1)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($phoneno)) { array_push($errors, "Phone number is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($option)) { array_push($errors, "Selecting proctor or student is required"); }
    if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }
    if(!preg_match("/^[0-9]{10}$/", $phoneno)){
      array_push($errors, "Invalid phone number");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM proctors WHERE name1='$name1' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      
      if ($user['name1'] === $name1) {
        array_push($errors, "Name already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }


    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
      //$password = md5($password_1);//encrypt the password before saving in the database

      $query = "INSERT INTO proctors (name1, email, phoneno, pass) 
            VALUES('$name1', '$email', '$phoneno', '$password_1')";
      mysqli_query($db, $query);
      $_SESSION['username'] = $name1;
      $_SESSION['option'] = $option;
      $_SESSION['success'] = "You are now logged in";
      header('location: teacherindex.php');
    }
  }else{
    $USN = mysqli_real_escape_string($db, $_POST['USN']);
    $proctorname = mysqli_real_escape_string($db, $_POST['proctorname']);
      // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name1)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($phoneno)) { array_push($errors, "Phone number is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($USN)) { array_push($errors, "USN is required"); }
    if (empty($proctorname)) { array_push($errors, "Proctor name is required"); }
    if (empty($option)) { array_push($errors, "Selecting proctor or student is required"); }
    if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
    }
    if(!preg_match("/^[0-9]{10}$/", $phoneno)){
      array_push($errors, "Invalid phone number");
    }
    if(!preg_match("/^[0-9]+[a-zA-Z]{2}+[0-9]{2}+[a-zA-Z]{2}+[0-9]{3}$/", $USN)){
      array_push($errors, "Invalid USN");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM students WHERE name1='$name1' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      
      if ($user['name1'] === $name1) {
        array_push($errors, "Name already exists");
      }

      if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
    }


    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
      //$password = md5($password_1);//encrypt the password before saving in the database

      $query = "INSERT INTO students (USN, name1, email, proctorname, phoneno, pass) 
            VALUES('$USN', '$name1', '$email', '$proctorname', '$phoneno', '$password_1')";
      $query2 = "CREATE DATABASE '$name1';";
      mysqli_query($db, $query);
      $_SESSION['username'] = $name1;
      $_SESSION['option'] = $option;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $option = $_POST['option'];
  
    if($option == "proctor"){
      if (empty($email)) {
          array_push($errors, "Email is required");
      }
      if (empty($password)) {
          array_push($errors, "Password is required");
      }
    
      if (count($errors) == 0) {
          //$password = md5($password);
          $query = "SELECT * FROM proctors WHERE email='$email' AND pass='$password'";
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $results->fetch_assoc()['name1'];
            $_SESSION['success'] = "You are now logged in";
            header('location: teacherindex.php');
          }else {
              array_push($errors, "Wrong username/password combination");
          }
      }
    }else{
      if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        //$password = md5($password);
        $query = "SELECT * FROM students WHERE email='$email' AND pass='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['username'] = $results->fetch_assoc()['name1'];
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
    }
  }

//General Student info
if(isset($_POST['studentinfo'])) {
  $name1 = mysqli_real_escape_string($db, $_POST['name1']);
  $dob = $_POST['dob'];
  $blood = mysqli_real_escape_string($db, $_POST['blood']);
  $proctorname = mysqli_real_escape_string($db, $_POST['proctorname']);
  $phoneno = mysqli_real_escape_string($db, $_POST['phoneno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $focc = mysqli_real_escape_string($db, $_POST['focc']);
  $fno = mysqli_real_escape_string($db, $_POST['fno']);
  $femail = mysqli_real_escape_string($db, $_POST['femail']);
  $fadd = mysqli_real_escape_string($db, $_POST['fadd']);
  $mname = mysqli_real_escape_string($db, $_POST['mname']);
  $mocc = mysqli_real_escape_string($db, $_POST['mocc']);
  $mno = mysqli_real_escape_string($db, $_POST['mno']);
  $memail = mysqli_real_escape_string($db, $_POST['memail']);
  $madd = mysqli_real_escape_string($db, $_POST['madd']);
  $acc = mysqli_real_escape_string($db, $_POST['acc']);
  
  $query = "INSERT INTO students2 (name1, proctorname, dob, blood, phoneno, email, fname, focc, fno, femail, fadd, mname, mocc, mno, memail, madd, acc)
            VALUES('$name1', '$proctorname', '$dob', '$blood', '$phoneno', '$email', '$fname', '$focc', '$fno', '$femail', '$fadd', '$mname', '$mocc', '$mno', '$memail', '$madd', '$acc')";

  mysqli_query($db, $query);
}


//Course Registration
if(isset($_POST['courseinfo'])) {
  $year = $_POST['year'];
  $semester = $_POST['semester'];
  $coursename = $_POST['coursename'];
  $credits = $_POST['credits'];
  $attemptno = $_POST['attemptno'];
  $faculty = $_POST['faculty'];
  $dbname = str_replace(' ', '', $_SESSION['username']);
  $sql1 = "CREATE TABLE ".$dbname."(
    coursename VARCHAR(40) PRIMARY KEY,
    credits INT,
    attemptno INT,
    faculty VARCHAR(30),
    attendance DECIMAL,
    marks DECIMAL
    )";
  $sql2 = "CREATE TABLE ".$dbname."2 (
    year INT,
    semester INT
    )";
    $query = "INSERT INTO ".$dbname."2 (year, semester) 
        VALUES('$year', '$semester')";
    $conn->query($sql2);
    mysqli_query($db, $query);
    if ($conn->query($sql1) === TRUE) {
      for($i=0; $i<sizeof($coursename); $i++){
        $query = "INSERT INTO ".$dbname." (coursename, credits, attemptno, faculty) 
        VALUES('$coursename[$i]', '$credits[$i]', '$attemptno[$i]', '$faculty[$i]')";
        mysqli_query($db, $query);
      }
  } else {
      echo "Already Registered " . $conn->error;
  }
  
}


  ?>

