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
        <!-- <div class="user-panel" style="color: black; background: linear-gradient(0deg, rgba(187,142,69,1) 7%, rgba(230,202,142,1) 19%, rgba(187,142,69,1) 75%);">
            <div class="pull-left image">
                <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
                <a style="color: black;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" style="background-color: #D1B188; color: black;">
    <li class="header"></li>
    <li class="treeview"></li>
    <li><a href="pos" style="color: black;"><i class="fa fa-shopping-cart"></i> <span>POS</span></a></li>          
    
    
  
    
     
        </ul>
    </section> 
    <!-- /.sidebar -->  
</aside>
