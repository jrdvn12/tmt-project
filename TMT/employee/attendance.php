<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attendance</li>
      </ol> -->
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Date</th>
                  <th>Time In</th>
                  <th>Time Out</th>
                  <th>Number of Hours</th>
                  <th>Number of Overtime Hours</th>
                  
                </thead>
                <tbody>
                  <?php
                   $employee_ids=$user['id'];
                  $sql = "SELECT * FROM attendance WHERE employee_id='$employee_ids'";
                     //$sql = "SELECT *, employees.employee_id AS empid, attendance.id AS attid FROM attendance LEFT JOIN employees ON employees.id=attendance.employee_id ORDER BY attendance.date DESC, attendance.time_in DESC WHERE id='$employee_ids'";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      //$status = ($row['status'])?'<span class="label label-warning pull-right">ontime</span>':'<span class="label label-danger pull-right">late</span>':'<span class="label label-danger pull-right">Break</span>';
                      if ($row['status'] == '1') {
                        $status = '<span class="label label-warning pull-right">ontime</span>';
                      } elseif ($row['status'] == '0') {
                          $status = '<span class="label label-danger pull-right">late</span>';
                      } elseif ($row['status'] == '3') {
                        $status = '<span class="label label-info pull-right">leave</span>';
                      } elseif ($row['status'] == '4') {
                        $status = '<span class="label label-primary pull-right">day off</span>';
                      } elseif ($row['status'] == '5') {
                        $status = '<span class="label label-danger pull-right">absent</span>';
                      } else {
                          $status = '<span class="label label-primary pull-right"></span>';
                      }
                    
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".date('M d, Y', strtotime($row['date']))."</td>
                          <td>".date('h:i A', strtotime($row['time_in'])).$status."</td>
                          <td>".date('h:i A', strtotime($row['time_out']))."</td>
                          <td>".$row['num_hr']."</td>
                          <td>".$row['num_ot']."</td>
                          
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </section>   
  </div>
    
  

</div>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/footer.php'; ?>
<script>


</script>
</body>
</html>
