
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition  sidebar-mini">
  <div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        HOME
      </h1>
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

      <?php $posistion = $user['position']; ?>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box "style="background: #D1B188;">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM product";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Total Product</p>
            </div>
            <div class="icon">
              <i class="fa fa-coffee"></i>
            </div>
            <a href="product" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>


        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #F75F6F;">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM raw_materials";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Total Raw Materials</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-basket"></i>
            </div>
            <a href="raw_materials" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #865fad;">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM production WHERE production_status LIKE 'Preparing'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Total Production</p>
            </div>
            <div class="icon">
              <i class="fa fa-cogs"></i>
            </div>
            <a href="production" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #B0B0B0;">
            <div class="inner">
              <?php
                $sql = "SELECT * FROM production WHERE production_status LIKE 'Preparing'";
                $query = $conn->query($sql);

                echo "<h3>".$query->num_rows."</h3>";
              ?>
              <p>Total Loss</p>
            </div>
            <div class="icon">
            <i class="fa-solid fa-chart-line-down"></i>
            </div>
            <a href="lost" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
        <!-- Small boxes (End box) -->
      </div>
     
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Sales Report</h3>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Select Year: </label>
                    <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2065; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <br>
                <div id="legend" class="text-center"></div>
                <canvas id="barChart" style="height:150px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="row">
        <div class="col-xs-12">
          <div class="big-box bg-black">
            <div class="inner" style="height:250px">
            </div>
          </div>
        </div>
      </div> -->

      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/files_modal.php'; ?>

</div>
<!-- ./wrapper -->


<?php include 'includes/scripts.php'; ?>
<script>
</script>
</body>
</html>
