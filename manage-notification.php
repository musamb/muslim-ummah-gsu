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
    /* .container{
      height: 75vh;
    } */
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
            <span>Manage Notifications</span>
          </h4>
        </div>

      </div> 
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4" >

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

                          <!-- table div -->
<div class="table-responsive">
  <table class="display table table-striped table-hover table-responsive" >

    <tbody>
    <?php
    
  $result = $mysqli->query("SELECT * FROM post") or die($mysqli->error());
?>
        <?php while ($row = $result->fetch_assoc()):?>
                        <tr>
          <div class="row col-md-12">
              <div class="col-md-10 mx-auto mb-2">
                  <div  class="card" id="add-row">
                      <div class="card-body">
              <h4><?php echo $row['status']?></h4>
              <h5>Subject: <?php echo $row['subject'];?></h5>
              <p><?php echo $row['message'];?></p>
              <p><b><?php echo $row['date'];?></b></p>
              </div>
              </div>
        </div>
       
        </div>
      </tr>                  
      <?php endwhile; ?>
    </tbody>
    
  </table>
</div>


            </div>

          </div>
          <!-- Card-->

        </div>
        <!--Grid column-->

        

      </div>
      <!--Grid row-->

      

    </div>
  </main>
  <!--Main layout -->

<?php include('footer.php'); ?>
</body>
</html>