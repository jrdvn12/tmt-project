<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <style>
        #content1 {
            display: block;
        }

        #content1.collapsed {
            display: none;
        }
        table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Style for the buttons */
  .btn {
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 3px;
  }

  .btn-primary {
    background-color: #007bff;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Main Inventory
      </h1>
    </section>

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
            <tr>
              <th>Product ID</th>
              <th>Photo</th>
              <th>Piece Code</th>
              <th>Case Code</th>
              <th>SKU</th>
              <th>Price</th>
              <th>Material Code</th>
              <th>Date Created</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody>
            <!-- Add your table rows here -->
          </tbody>
        </table>
      </div> 
    </div>     
  </div> 
</div>