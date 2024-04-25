<header class="main-header" style="background-color: #D1B188;">

    <!-- Logo -->
    <a href="pos" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini" style="color: black;"><b>TMT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="color: black;">TMT Foods Inc.  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #D1B188;">
    <!-- User Account -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav navbar-right">
            <li class="user user-menu">
                <a href="#">
                    <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
                    <span class="hidden-xs" style="color: black;"> <?php echo $user['firstname'].' '.$user['lastname']; ?></span>
                </a>
            </li>
            <li class="navbar-right">
                <a href="logout.php" style="color: black;">Sign out</a>
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
