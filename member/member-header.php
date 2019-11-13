<?php 
include('config.php');

if (isset($_POST['post'])) {
    $status = $_POST['status'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO post (status,subject,message) VALUES('$status', '$subject', '$message')";
    $result = mysqli_query($mysqli,$sql);
    header("location:member-index.php");
}


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
  <link href="../member/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../member/css/freelancer.min.css" rel="stylesheet">

  <style>
    .masthead-heading{
      color: teal;
    }

    #about{
      background-color: teal;
    }

    .modal-body{
        margin-top: -50px;
        margin-bottom: -50px;
    }

    .col-5{
        margin-left: -15px;
    }
  </style>

</head>

<body id="page-top">

<!-- add post modal-->
<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
          <div class="mb-3 pt-0">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
        </div>
      
            <form action="member-header.php" method="POST">
                <div class="col-5">
                <input type="text" value="Member" class="form-control" name="status" readonly>
                </div>
                <input type="text" name="subject" class="form-control mb-2" placeholder="Subject">
                <textarea name="message" class="form-control" cols="30" rows="4" placeholder="Type your message here"></textarea>
                <div class="float-right">
                <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Close</button>
                <button type="submit" name="post" class="btn btn-primary mt-3 ml-auto">Send Post</button>
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="member-index.php">Muslim-Ummah G S U</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" class="btn btn-primary" data-toggle="modal" data-target="#notification" href=""><i class="fas fa fa-edit"></i> Add Post</a>

          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="notification.php"><i class="fas fa fa-bell"></i> Notification</a>
             
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="logout.php"><i class="fas fa fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 

  <!-- Bootstrap core JavaScript -->
  <script src="../member/vendor/jquery/jquery.min.js"></script>
  <script src="../member/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../member/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="../member/js/jqBootstrapValidation.js"></script>
  <script src="../member/js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../member/js/freelancer.min.js"></script>

</body>

</html>
