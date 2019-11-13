<?php

session_start();
// Include config file
//include('config.php');
include ('connk.php');
// require 'class.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $query = "SELECT  email,password FROM admin WHERE email = :email AND password = :password";
    $bind = $pdo->prepare($query);
    $bind->bindParam(':email', $email, PDO::PARAM_STR);
    $bind->bindParam(':password', $password, PDO::PARAM_STR);
    $bind->execute();
    $stmt = $bind->fetchAll(PDO::FETCH_OBJ);

    $query1 = "SELECT  email,password FROM members WHERE email = :email AND password = :password";
    $bind1 = $pdo->prepare($query1);
    $bind1->bindParam(':email', $email, PDO::PARAM_STR);
    $bind1->bindParam(':password', $password, PDO::PARAM_STR);
    $bind1->execute();

    $stmt1 = $bind1->fetchAll(PDO::FETCH_OBJ);

    

    if ($stmt) {
        
        if ($bind->rowCount() > 0) {
            $_SESSION['alogin'] = $_POST['email'];
            //$_SESSION['alogin'] = $_POST['password'];
                header("location:../dashboard.php");
        }else{
            echo "<script>
            
            alert('Invalid details');
            </script>";
            header('location:login.php');
        }
    }else if ($stmt1) {
        if ($bind1->rowCount() > 0) {
            $_SESSION['member'] = $_POST['email'];
            // $_SESSION['password'] = $_POST['password'];
            
            header("location:member-index.php");
        }else{
        echo "<script>
        
        alert('Invalid details');
        </script>";
        header('location:login.php');
    }
}
    

}
// Define variables and initialize with empty values
// $fullname = $gender = $faculty = $course = $matric_number = $graduation_year = $phone = $email = $address = $photo = $password = $confirm_password  = "";
// $email_err = $password_err = $confirm_password_err = "";
 
// // bashir hassan

// // Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST"){
 
//     // Check if email is empty
//     if(empty(trim($_POST["email"]))){   
//         $email_err = "Please enter your email.";
//     } else{
//         $email = trim($_POST["email"]);
//     }
    
//     // Check if password is empty
//     if(empty(trim($_POST["password"]))){
//         $password_err = "Please enter your password.";
//     } else{
//         $password = trim($_POST["password"]);
//     }
    
//     // Validate credentials
//     if(empty($email_err) && empty($password_err)){

//             // Prepare a select statement
//             // $sql = "SELECT id, fullname, gender, faculty, course, matric_number, graduation_year, phone, email, address, password FROM members WHERE email = ?";
//             $sql = "SELECT password,email FROM members";
            
//             $stmt1 = $mysqli->prepare($sql);
//             $stmt1->bind_param("ss", $param_email,$password);            
                
//             // Set parameters
//             // $param_fullname = $fullname;
//             // $param_pnum = $gender;            
//             // $param_pnum = $course;            
//             // $param_regno = $regno;            
//             // $param_pnum = $pnum;            
//             $param_email = $email;
// 			$stmt1->execute();
//             $stmt1->store_result();
                        
//         if($stmt1->num_rows == 1){

//             // Attempt to execute the prepared statement
//             if($stmt1->execute()){
//                 // Store result
//                 $stmt1->store_result();
                
//                 // Check if email exists, if yes then verify password
//                 if($stmt1->num_rows == 1){                    
//                     // Bind result variables
//                     $stmt1->bind_result($id, $fullname, $gender, $faculty, $course, $matric_number, $graduation_year, $phone, $email, $address, $hashed_password);
//                     if($stmt1->fetch()){
//                         if(password_verify($password, $hashed_password)){
//                             // Password is correct, so start a new session
//                             session_start();
                            
//                              // Store data in session variables
//                              $_SESSION["loggedin"] = true;
//                              $_SESSION["id"] = $id;
//                              $_SESSION["fullname"] = $fullname;
//                              $_SESSION["gender"] = $gender;                                                       
//                              $_SESSION["email"] = $email;
                                                      
//                             // Redirect user to index page
//                             header("location: member-index.php");
                            
//                         } else{
//                             // Display an error message if password is not valid
//                             $password_err = "Incorrect Password!";
//                         }
//                     }
//                 } else{
//                     // Display an error message if email doesn't exist
//                     $email_err = "This email does not belong to a registered member.";
//                 }
//             } else{
//                 echo "Oops! Something went wrong. Please try again later.";
//             }
//         } 
//         // else{
//         //     $sql2 = "SELECT id, fullname, email, pnum, password, photo FROM admin WHERE email = ?";
           
//         //     // Bind variables to the prepared statement as parameters
//         //     $stmt2 = $mysqli->prepare($sql2);
//         //     $stmt2->bind_param("s", $param_email);
            
//         //     // // Set parameters
//         //     $param_fullname = $fullname;
//         //     $param_email = $email;
//         //     $param_pnum = $pnum;
//         //     // $param_photo = $_FILES['image']['name'];

//         //     // Attempt to execute the prepared statement
//         //     if($stmt2->execute()){
//         //         // Store result
//         //         $stmt2->store_result();
                
//         //         // Check if email exists, if yes then verify password
//         //         if($stmt2->num_rows == 1){                    
//         //             // Bind result variables
//         //             $stmt2->bind_result($id, $fullname, $email, $pnum, $hashed_password, $photo);
//         //             if($stmt2->fetch()){
//         //                 if(password_verify($password, $hashed_password)){
//         //                     // Password is correct, so start a new session
//         //                     session_start();
                            
//         //                     // Store data in session variables
//         //                     $_SESSION["loggedin"] = true;
//         //                     $_SESSION["id"] = $id;
//         //                     $_SESSION["fullname"] = $fullname;
//         //                     $_SESSION["email"] = $email;                            
//         //                     $_SESSION["pnum"] = $pnum;                            
//         //                     $_SESSION["photo"] = $photo;                            
                            
//         //                     // Redirect user to welcome page
//         //                     header("location: admin_index.php");
//         //                 } else{
//         //                     // Display an error message if password is not valid
//         //                     $password_err = "Incorrect Password!";
//         //                 }
//         //             }
//         //         } else{
//         //             // Display an error message if email doesn't exist
//         //             $email_err = "This email does not belong to a registered member.";
//         //         }
//         //     } else{
//         //         echo "Oops! Something went wrong. Please try again later.";
//         //     }
//         // }
        
//         // Close statement
//         $stmt1->close();
//         // $stmt2->close();
//     }
    
//     // Close connection
//     $mysqli->close();
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Muslim-Ummah G S U</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <style>
    body{
      background-image:url("img/mssnlogo.jpg");
      background-position:center;
      background-size:contain;
      background-repeat:no-repeat;

      padding-top: 90px;
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
    <div class="col-md-5 ml-auto mx-auto">
        <div class="card" style="opacity:0.9">
            <div class="card-body">
                <!-- <?php echo $row['fullname'];?> -->
                <!-- member login form -->
                <form action="login.php" method="POST">

                    <!-- login logo -->
                    <img class="mb-4 mx-auto" src="img/gsu.png" alt="" width="100" height="100">
                    <!-- login header -->
                    <h1 class="h3 mb-3 font-weight-normal">Account Login</h1>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" value="" placeholder="Email address">
                        <!-- <span class="help-block text-danger"><?php echo $email_err; ?></span>                                                                                                     -->
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <!-- <span class="help-block text-danger"><?php echo $password_err; ?></span>                                                                                                     -->
                    </div>
                    <hr>
                    <div class="form-group">     
                        <button type="submit" class="btn btn-success btn-block" name="login">L o g i n</button>
                    </div>
                </form>

                <!-- membership register link -->
                <p class="mt-2 mb-1 text-default">Not a member? <a href="register.php">Register</a></p>
                <!-- copyright -->
                <p class="mt-2 mb-1 text-muted">&copy; Muslim-Ummah G S U <?php echo date('Y'); ?></p>

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


