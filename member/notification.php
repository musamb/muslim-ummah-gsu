<?php include('member-header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
  $result = $mysqli->query("SELECT * FROM post") or die($mysqli->error());
?>

    <!-- Masthead -->
  <header class="masthead">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Heading -->
      <h3 class="masthead-heading mb-3">Notifications</h3>

      <!-- table div -->
<div class="table-responsive">
  <table class="display table table-striped table-hover table-responsive" >

    <tbody>
        <?php while ($row = $result->fetch_assoc()):?>
                        <tr>
          <div class="row col-md-12">
              <div class="col-md-8 mx-auto mb-2">
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
  </header>



  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; G S U Alumni <?php echo date('Y');?></small>
    </div>
  </section>

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

<script src="../js/datatables.min.js"></script>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div> 
</body>
</html>