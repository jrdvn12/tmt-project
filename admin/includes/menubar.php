<?php $posistion = $user['position']; ?>


<aside class="main-sidebar"  style="height:100%">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class=""><a href="home.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="header">MANAGE</li>   
              
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-bar-chart"></i>
                  <span>Sales</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="#"><i class="fa fa-circle-o"></i> Main Sales</a></li>    
                  <li><a href="#"><i class="fa fa-circle-o"></i> Distributor Sales</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Seller Sales</a></li>        
                </ul>
              </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dropbox"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main_inventory.php"><i class="fa fa-circle-o"></i> Main Inventory</a></li>    
            <li><a href="#"><i class="fa fa-circle-o"></i> Distributor Inventory</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seller Inventory</a></li>
          </ul>
        </li>
        <!--  -->

        
        <!--  -->
        
        <!--  -->
      

        <li><a href="user.php"><i class="fa fa-user"></i> <span>User</span></a></li>
        <li><a href="audit.php"><i class="fa fa-history"></i> <span>Audit Trail Record</span></a></li>
        <li class="header">PRINTABLES</li>
        <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Sales</span></a></li>
        <li><a href="#"><i class="fa fa-dropbox"></i> <span>Inventory</span></a></li>
        <li><a href="#"><i class="fa fa-truck"></i><span>Delivery</span></a></li>
        <!-- <li class="header">
        <div class="hidden-xs">
          <b>All rights reserved</b>
        </div></li>
        <li class="header">
        <strong>Copyright &copy; 2023 <a href="">JJACA</a></strong>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>