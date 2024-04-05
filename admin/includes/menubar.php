<?php $posistion = $user['position']; ?>

<!-- style="background-color: black;" -->
<aside class="main-sidebar"  style="height:100%; " >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
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
        <li class=""><a href="home"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="header">MANAGE</li>   
        <li><a href="order"><i class="fa fa-shopping-cart"></i> <span>Order</span></a></li>     
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
            <li><a href="main_inventory"><i class="fa fa-circle-o"></i> Main Inventory</a></li>    
            
            <li><a href="distributor_inventory"><i class="fa fa-circle-o"></i> Distributor Inventory</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Inventory History</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-basket"></i>
            <span>Raw Materials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main_raw_materials"><i class="fa fa-circle-o"></i> Main Raw Materials</a></li>    
            <li><a href="raw_materials"><i class="fa fa-circle-o"></i> Raw Materials Inventory</a></li>
            <li><a href="type_raw_materials"><i class="fa fa-circle-o"></i>  Raw Materials Type</a></li>
            <!-- <li><a href="raw_materials_inventory"><i class="fa fa-circle-o"></i> Raw Materials Inventory</a></li> -->
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa fa-cogs"></i>
            <span>Product Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="product"><i class=" fa fa-circle-o"></i> <span>Product</span></a></li>
          <li><a href="product_needs"><i class=" fa fa-circle-o"></i> <span>Product Needs</span></a></li>

          <li><a href="costing"><i class="fa fa-circle-o"></i> <span>Costing Raw Materials</span></a></li>
          
          <li><a href="freebies"><i class="fa fa-circle-o"></i> <span>Gift</span></a></li>
          
          
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-building-o"></i>
            <span>Warehouse Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="production"><i class=" fa fa-circle-o"></i> <span>Production</span></a></li>
          <li><a href="lost"><i class="fa fa-circle-o"></i> <span>Loss</span></a></li>
         
          
            
          </ul>
        </li>
        
        
        <li><a href="user"><i class="fa fa-user"></i> <span>User</span></a></li>
        <li><a href="audit"><i class="fa fa-history"></i> <span>Audit Trail Record</span></a></li>
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