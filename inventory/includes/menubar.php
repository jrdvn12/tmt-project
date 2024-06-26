<?php $position = $user['position']; ?>
<style>

    .li,span{
        font-weight: bold;
    }
    .li,ul,li{
        font-weight: bold;
    }
</style>
<aside class="main-sidebar" style="height:100%; background-color: #D1B188;">
    <section class="sidebar" style="background-color: #D1B188;">
        <div class="user-panel" style="color: black; background: linear-gradient(0deg, rgba(187,142,69,1) 7%, rgba(230,202,142,1) 19%, rgba(187,142,69,1) 75%);">
            <div class="pull-left image">
                <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
                <a style="color: black;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" style="background-color: #D1B188; color: black;">
    <li class="header"></li>
    <li class="treeview"></li>
    <li><a href="home" style="color: black;"><i class="fa fa-home"></i> <span>Home</span></a></li>          
    <li class="header">MANAGE</li>   
    <li><a href="order" style="color: black;"><i class="fa fa-shopping-cart"></i> <span>Order</span></a></li>     
    <li><a href="vendor" style="color: black;"><i class="fa fa-users"></i> <span>Vendor</span></a></li>     
    <li class="treeview" style="color: black;">
        <a href="#" style="color: black;">
            <i class="fa fa-bar-chart"></i>
            <span>Sales</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="sales" style="color: black;"><i class="fa fa-circle-o"></i> Main Sales</a></li>    
            <!-- <li><a href="#" style="color: black;"><i class="fa fa-circle-o"></i> Distributor Sales</a></li>
            <li><a href="#" style="color: black;"><i class="fa fa-circle-o"></i> Seller Sales</a></li>         -->
        </ul>
    </li> 
    <!-- Add "active" class to the clicked treeview item -->
    <li class="treeview"> 
        <a href="#" style="color: black;">
            <i class="fa fa-dropbox"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="main_inventory" style="color: black;"><i class="fa fa-circle-o"></i> Main Inventory</a></li>    
            <li><a href="distributor_inventory" style="color: black;"><i class="fa fa-circle-o"></i> Distributor Inventory</a></li>
            <li><a href="history_inventory" style="color: black;"><i class="fa fa-circle-o"></i> Inventory History</a></li>
        </ul>
    </li>
            <li class="treeview">
                <a href="#" style="color: black;">
                    <i class="fa fa-shopping-basket"></i>
                    <span>Raw Materials</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="main_raw_materials" style="color: black;"><i class="fa fa-circle-o"></i> Main Raw Materials</a></li>    
                    <li><a href="raw_materials" style="color: black;"><i class="fa fa-circle-o"></i> Raw Materials Inventory</a></li>
                    <li><a href="type_raw_materials" style="color: black;"><i class="fa fa-circle-o"></i>  Raw Materials Type</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#" style="color: black;">
                    <i class="fa fa fa-cogs"></i>
                    <span>Product Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="product" style="color: black;"><i class=" fa fa-circle-o"></i> <span>Product</span></a></li>
                    <li><a href="product_needs" style="color: black;"><i class=" fa fa-circle-o"></i> <span>Product Needs</span></a></li>
                    <li><a href="costing" style="color: black;"><i class="fa fa-circle-o"></i> <span>Costing Raw Materials</span></a></li>
                    <li><a href="freebies" style="color: black;"><i class="fa fa-circle-o"></i> <span>Gift</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#" style="color: black;">
                    <i class="fa fa-building-o"></i>
                    <span>Warehouse Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="production" style="color: black;"><i class=" fa fa-circle-o"></i> <span>Production</span></a></li>
                    <li><a href="lost" style="color: black;"><i class="fa fa-circle-o"></i> <span>Loss</span></a></li>
                </ul>
            </li>

            <li><a href="user" style="color: black;"><i class="fa fa-user"></i> <span>User</span></a></li>
            <li><a href="user_distributor" style="color: black;"><i class="fa fa-user"></i> <span>User Distributor</span></a></li>
            <li><a href="audit" style="color: black;"><i class="fa fa-history"></i> <span>Audit Trail Record</span></a></li>
        </ul>
    </section> 
    <!-- /.sidebar -->  
</aside>
