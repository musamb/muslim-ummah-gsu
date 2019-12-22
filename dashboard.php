<?php

include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    .container{
      height: 75vh;
    }
  </style>
</head>
<body>
  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard" target="_blank">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>

        </div>

      </div> 
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4" >

        <div class="card">
                        <!--Card content-->
                        <div class="card-body">
                            <a href="manage-members.php">
                            <div class="col-lg-3 col-md-3 mb-4">
                                    <div class="card border-dark shadow h-100 py-2">
                                        <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Registered Members</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            </div>
                                            <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300">5</i>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    </a>
                        </div>

                    </div>

        </div>
        <!--Grid column-->

        

      </div>
      <!--Grid row-->

      

    </div>
  </main>
  <!--Main layout -->

<?php include('footer.php');?>

</body>
</html>