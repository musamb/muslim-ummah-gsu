<?php 
include('config.php');

if (isset($_POST['post'])) {
    $status = $_POST['status'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $sql = "INSERT INTO post (status,subject,message) VALUES('$status', '$subject', '$message')";
    $result = mysqli_query($mysqli,$sql);
    header('location: manage-notification.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .modal-body{
        margin-top: 0px;
        /* margin-bottom: -50px; */
    }

    .col-5{
        margin-left: -15px;
    }
  </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>

  </style>
</head>

<body class="grey lighten-3">

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
      
            <form action="header.php" method="POST">
                <div class="col-5">
                <input type="text" value="Admin" class="form-control" name="status" readonly>
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

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="index.php">
          <strong class="blue-text">Muslim-Ummah G S U</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          

          <!-- Right -->
           <ul class="navbar-nav">
            
            <!-- <li class="nav-item">
              <a href="profile.php" class="nav-link waves-effect"
                >
                <i class="fas fa-user mr-2"></i>Profile
              </a>
            </li> -->
            <li class="nav-item">
              <a href="dept_unit.php" class="nav-link waves-effect"
                >
                <i class="fas fa fa-plus mr-2"></i>Add Dept/Unit
              </a>
            </li>
            <li class="nav-item">
              <a href="manage-members.php" class="nav-link waves-effect"
                >
                <i class="fas fa-users mr-2"></i>Manage Members
              </a>
            </li>
            <li class="nav-item">
              <a href="manage-notification.php" class="nav-link waves-effect"
                >
                <i class="fas fa fa-bell mr-2"></i>Manage Notification
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link waves-effect" data-toggle="modal" data-target="#notification" href=""><i class="fas fa fa-edit"></i> Add Post</a>
              <!-- <a href="profile.php" class="nav-link waves-effect"
                >
                <i class="fas fa-user mr-2"></i>Post
              </a> -->
            </li>

          </ul> 
        
              <a href="logout.php" class="nav-link border border-light rounded waves-effect ml-auto"
                >
                <i class="fas fa fa-sign-out-alt mr-2"></i>Logout
              </a>
        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">
    <div align="center">
      <a class="">
        <img src="img/no-profile.png" style=" width:150px; height:150px; " class="img-responsive mb-2" alt="">
      </a>
  </div>
      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa fa-dashboard mr-3"></i>Dashboard
        </a>
        <!-- <a href="profile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-user mr-3"></i>Profile</a> -->
          <a href="dept_unit.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-plus mr-3"></i>Add Dept/Unit</a>
        <a href="manage-members.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa fa-users mr-3"></i>Manage Members</a>
        <a href="manage-notification.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa fa-bell mr-3"></i>Manage Notification</a>
        <a href="logout.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-sign-out-alt mr-3"></i>Logout</a>
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  
  <!--Footer-->
  <!-- <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn" -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © <?php echo date('Y');  ?> Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> G S U ALUMNI </a>

    </div>
    <!--/.Copyright-->

  </footer> 
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>


</body>

</html>

</body>
</html>