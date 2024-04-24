<header class="main-header" style="background-color: #D1B188;">

    <!-- Logo -->
    <a href="pos" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: black;"><b>TMT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: black;">TMT Foods Inc</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #D1B188;">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="color: black;">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="color: black;"> <?php echo $user['firstname'].' '.$user['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu" style="background-color: #D1B188;">
              <!-- User image -->
              <li class="user-header" style="background-color: #D1B188;">
                <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">

                <p style="color: black;">
                  <?php echo $user['firstname'].' '.$user['lastname']; ?>
                  <small style="color: black;">Member since <?php echo date('M. Y', strtotime($user['created_on'])); ?></small>
                </p>
              </li>
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
                </div> -->
                <div class="pull-right"> 
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>
  <script>
        // Set the timeout duration in milliseconds (1 second = 1000 milliseconds)
        var timeoutDuration = 3600000;

        // Function to log the user out after the specified timeout
        function logoutUser() {
            window.location.href = "logout.php"; // Replace with your logout script
        }

        // Set up a timeout event when the page loads
        var timeoutID = setTimeout(logoutUser, timeoutDuration);

        // Reset the timeout event on user activity (mouse or touch)
        function resetTimeout() {
            clearTimeout(timeoutID);
            timeoutID = setTimeout(logoutUser, timeoutDuration);
        }

        // Add event listeners for mouse and touch events
        window.addEventListener("mousemove", resetTimeout);
        window.addEventListener("touchstart", resetTimeout);
    </script>
