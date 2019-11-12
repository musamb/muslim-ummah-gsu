<?php
session_start();
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
            <span>Manage Members</span>
          </h4>

        </div>

      </div> 
      <!-- Heading -->

      <div class="row wow fadeIn">

        <div class="col-md-12 mb-4" >

          <div class="card">

            <div class="card-body">

									<!-- connection -->
									<?php require_once('config.php');?>

<!-- Delete query -->
<?php
  $result = $mysqli->query("SELECT * FROM members") or die($mysqli->error());
  // delete statement
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM members WHERE id=$id") or die($mysqli->error());
    $_SESSION['message'] = "<div id='card'><h5> Alert: One Member has been deleted!</h5><a href='manage-members.php' class='btn btn-danger'>OK</a></div>";											
    ;			
  }
?>

<!-- delete alert -->
<?php  if (isset($_SESSION['message'])){ ?>     
              <div class="alert alert-danger alert-dismissable text-center">
                  <?= $_SESSION['message']; ?>
              </div>
<?php } unset($_SESSION['message']); ?>

<!-- print script -->
<script>
   function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = 
          "<html><head><title></title></head><body>" + 
          divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;		
  }
</script>

                    <!-- buttons -->
                    <div class="dt-buttons btn-group"> 
										<button class="btn btn-outline-warning buttons-print" onclick="javascript:printDiv('printablediv')" tabindex="0" aria-controls="DataTables_Table_0">
											<span>P r i n t</span>
										</button> 
									</div>
								</div>


<!-- table div -->
<div id="printablediv" class="table-responsive">
  <table id="add-row" class="display table table-striped table-hover table-responsive" >

    <thead>
      <tr>
        <th>S/N</th>
        <th>Photo</th>
        <th>Full Name</th>
        <th>Faculty</th>
        <th>Course</th>
        <th>Matric No.</th>                                                    
        <th>Grad. Year</th>                                                    
        <th>Phone No.</th>
        <th>Email</th>
        <th class="px-5">Address</th>
        <th class="px-5">Action</th>
      </tr>
    </thead>

    <tfoot>
      <tr>
        <th>S/N</th>
        <th>Photo</th>
        <th>Full Name</th>
        <th>Faculty</th>
        <th>Course</th>
        <th>Matric No.</th>
        <th>Grad. Year</th>                                                    
        <th>Phone No.</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </tfoot>

    <tbody>
                            <?php $i=1; while ($row = $result->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td><img src="member/uploads/<?php echo $row['photo'];?>" class="rounded" width="100px" height="100px" alt=""></td>
                            <td><?php echo $row['fullname'];?></td>
                            <td><?php echo $row['faculty'];?></td>
                            <td><?php echo $row['course'];?></td>
                            <td><?php echo $row['matric_number'];?></td>
                            <td><?php echo $row['graduation_year'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td>
                                
                                <a href="register.php?edit=<?php echo $row['id']; ?>" class="btn btn-info btn-sm px-2">
                                  <i class="fab fa-edit"></i> Edit
                                </a>		
              <!-- Delete Modal -->
              <!-- <div class="col-md-4 col-sm-12"> -->
              <a href="#" class="btn btn-sm btn-danger px-2" data-toggle="modal" data-target="#confirmation-modal"><i class="fas fa-trash-alt"></i> Delete</a>
                <div class="pd-5 bg-red border-radius-4">
                  <div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-body text-center font-18">
                          <h6 class="padding-top-30 mb-30">Are you sure you want to <b>Delete</b> this <b>Member</b>?</h6>
                          <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                            
                              <button type="button" class="btn  btn-sm btn-default" data-dismiss="modal">NO</button><br>
                              <a  href="manage-members.php?delete=<?php echo $row['id']; ?>"  class="btn btn-sm btn-danger px-3 pb--5" >YES</a>
                               
                   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- </div> -->
          </td>
                        </tr>                       
      <?php $i++; endwhile; ?>
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

<!-- datatable search script -->
<script >

  $(document).ready(function() {
  $('#basic-datatables').DataTable({
  });

  $('#multi-filter-select').DataTable( {
    "pageLength": 5,
    initComplete: function () {
      this.api().columns().every( function () {
        var column = this;
        var select = $('<select class="form-control"><option value=""></option></select>')
        .appendTo( $(column.footer()).empty() )
        .on( 'change', function () {
          var val = $.fn.dataTable.util.escapeRegex(
            $(this).val()
            );

          column
          .search( val ? '^'+val+'$' : '', true, false )
          .draw();
        } );

        column.data().unique().sort().each( function ( d, j ) {
          select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
      } );
    }
  });

  // Add Row
  $('#add-row').DataTable({
    "pageLength": 5,
  });

  });

</script>

<script src="js/datatables.min.js"></script>
</body>
</html>