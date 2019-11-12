<?php

// Include config file
require_once "config.php";

// Initialize the session
session_start();
 
// Define variables and initialize with empty values
$fullname = $gender = $faculty = $course = $matric_number = $graduation_year = $phone = $email = $address = $photo = $password = $confirm_password  = "";
$email_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM members WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            // $stmt->bind_param("s", $param_fullname);
            // $stmt->bind_param("s", $param_gender);
            // $stmt->bind_param("s", $param_faculty);
            // $stmt->bind_param("s", $param_course);
            // $stmt->bind_param("s", $param_matric_number);
            // $stmt->bind_param("s", $param_graduation_year);
            // $stmt->bind_param("s", $param_phone);
            $stmt->bind_param("s", $param_email);
            // $stmt->bind_param("s", $param_address);
            // $stmt->bind_param("s", $param_photo);
            
            // // Set parameters
            // $param_fullname = trim($_POST['fullname']);
            // $param_gender = trim($_POST["gender"]);
            // $param_faculty = trim($_POST["faculty"]);
            // $param_course = trim($_POST["course"]);
            // $param_matric_number = trim($_POST["matric_number"]);
            // $param_graduation_year = trim($_POST["graduation_year"]);
            // $param_phone = trim($_POST["phone"]);
            $param_email = trim($_POST["email"]);
            // $param_address = trim($_POST["address"]);
            // $param_photo = trim($_FILES['image']['name']);
            // $upload = "uploads/".$param_photo;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "This email is already registered by Alumni Member.";
                } else{
                    
                    $fullname = trim($_POST['fullname']);
                    $gender = trim($_POST['gender']);
                    $faculty = trim($_POST['faculty']);
                    $course = trim($_POST['course']);
                    $matric_number = trim($_POST['matric_number']);
                    $graduation_year = trim($_POST['graduation_year']);
                    $phone = trim($_POST['phone']);
                    $email = trim($_POST['email']);
                    $address = trim($_POST['address']);
                    $photo = trim($_FILES['image']['name']);
                    $upload = "uploads/".$photo;

                 }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO members (fullname, gender, faculty, course, matric_number, graduation_year, phone, email, address, photo, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssssss", $param_fullname, $param_gender, $param_faculty, $param_course, $param_matric_number, $param_graduation_year, $param_phone, $param_email, $param_address, $param_photo, $param_password);
            
            // Set parameters
            $param_fullname = $fullname;
            $param_gender = $gender;
            $param_faculty = $faculty;
            $param_course = $course;
            $param_matric_number = $matric_number;
            $param_graduation_year = $graduation_year;
            $param_phone = $phone;
            $param_email = $email;
            $param_address = $address;

            $param_photo = $photo;
            $param_photo = $_FILES['image']['name'];
            $upload = "uploads/".$param_photo;

            // Creates a password hash
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
            move_uploaded_file($_FILES['image']['tmp_name'],$upload);

                $_SESSION['success'] = "<div id='card'><h6><i class='fa fa-check-circle'></i> Registration is successful. You can now </h6><a href='login.php' class='btn btn-success'>L o g i n</a></div>";


                // Redirect to login page
                // header('location: register.php');
                // $_SESSION['success'] = "<div id='card'><h3><i class='fa fa-check-circle'></i> Registration is successful. You can now </h3><a href='login.php' class='btn btn-success'>L o g i n</a></div>";

            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GSU ALUMNI</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <style>
    body{
      background-color: teal;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .card{
        text-align: center;
    }

    .form-control{
        margin-bottom: 10px;
    }
  </style>

</head>

<body id="page-top">

  <div class="container">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-body">

                <?php  if (isset($_SESSION['success'])){ ?>     
                    <div class="alert alert-success text-center">
                        <?= $_SESSION['success']; ?>
                    </div>
                <?php } unset($_SESSION['success']); ?>

                <!-- member login form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">

                    <!-- login logo -->
                    <img class="mb-4 mx-auto" src="img/logo.jpg" alt="" width="100" height="100">
                    <!-- login header -->
                    <h1 class="h3 mb-3 font-weight-normal">Membership Registeration</h1>

                    <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="fullname" name="fullname" class="form-control" placeholder="Full Name" value="<?php echo $fullname?>" required>                                                                                                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="gender" class="form-control" required>
                                <option value="<?php echo $gender?>">-- Select Gender --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>                                                                                                    
                        </div>
                    </div>                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="faculty" class="form-control" required>
                            <option value="<?php echo $faculty?>">-- Select Faculty --</option>
                            <?php 
                                    include('config.php');
                                    $sql = "SELECT * FROM faculty";
                                    $stmt = mysqli_query($mysqli,$sql);
                                    while($row = mysqli_fetch_assoc($stmt)){
                                    $faculty = $row['faculty_name'];
                                ?>                
                                <option value="<?php echo $faculty;?>"><?php echo $faculty;?></option><?php }?>
                            </select>                                                                                                    
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="course" class="form-control" required>
                            <option value="<?php echo $course?>">-- Select course --</option>

                                <?php 
                                    include('config.php');
                                    $sql = "SELECT * FROM course";
                                    $stmt = mysqli_query($mysqli,$sql);
                                    while($row = mysqli_fetch_assoc($stmt)){
                                    $course = $row['course_name'];
                                ?>                
                                <option value="<?php echo $course;?>"><?php echo $course;?></option><?php }?>  
                            </select>                                                                                                     
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="matric_number" class="form-control" placeholder="Matric Number" value="<?php echo $matric_number?>" required>                                                                                                    
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="graduation_year" class="form-control">
                                <option value="">-- Graduation Year --</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>                                                                                                    
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone?>" required>                                                                                                    
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email address" value="<?php echo $email?>">
                            <span class="help-block text-danger"><?php echo $email_err; ?></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" placeholder="Home address" value="<?php echo $address?>"required>                                                                                                    
                        </div>
                    </div>
                    <div class="col-4">
                        <h5>Passport:</h5>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="file" name="image" class="custom-file" value="<?php echo $upload?>" required>                                                                                                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password?>">
                            <span class="help-block text-danger"><?php echo $password_err; ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" value="<?php echo $confirm_password?>">
                            <span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
                        </div>
                    </div>
                    </div>
                    
                    <hr>
                    <div class="form-group">     
                        <button type="submit" class="btn btn-primary btn-block">R e g i s t e r</button>
                    </div>
                </form>

                <!-- membership register link -->
                <p class="mt-2 mb-1 text-default">Already a member? <a href="login.php">Login</a></p>
                <!-- copyright -->
                <p class="mt-2 mb-1 text-muted">&copy; G S U Alumni 2019</p>

            </div>
        </div>
    </div>
  </div>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
