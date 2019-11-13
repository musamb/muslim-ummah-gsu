<?php
// include('config.php');
include('header.php');

if (isset($_POST['add-faculty'])) {
    $faculty = $_POST['faculty'];

    $sql = "INSERT INTO faculty (faculty_name) VALUES('$faculty')";
    $result = mysqli_query($mysqli,$sql);
}

if (isset($_POST['add-dept_unit'])) {
    $dept = $_POST['dept_unit'];

    $sql = "INSERT INTO dept_unit (dept_unit_name) VALUES('$dept')";
    $result = mysqli_query($mysqli,$sql);
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
            <a href="dashboard.php" >Home Page</a>
            <span>/</span>
            <span>Add Dept/Unit</span>
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#faculty">Add Faculty
                    </button>
                    <!--Modal: Login / Register Form Demo-->
<div class="modal fade" id="faculty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="dept_unit.php" method="POST">
                <input type="text" name="faculty" class="form-control" placeholder="Faculty Name">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add-faculty" class="btn btn-primary">Add</button>
            </form>
      </div>
      
    </div>
  </div>
</div>
<!--Modal: Login / Register Form Demo-->

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#course">Add Dept/Unit
                    </button>
                    <!--Modal: Login / Register Form Demo-->
<div class="modal fade" id="course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Dept/Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="dept_unit.php" method="POST">
                <input type="text" name="dept_unit" class="form-control" placeholder="Dept/Unit Name">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="add-dept_unit" class="btn btn-primary">Add</button>
            </form>
      </div>
      
    </div>
  </div>
</div>
<!--Modal: Login / Register Form Demo-->
<div class="row col-md-12">
    <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table>

                        </table>
                    </div>
                </div>
                </div>

                <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <table>

                        </table>
                    </div>
                </div>
                </div>
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