<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home');
  }
  
?>

<?php include 'includes/header.php'; ?>
<style>
.login-page{
    display: flex;
        align-items: center;
        background: url(../images/TMT_FOODS.png);
        background-repeat: no-repeat;
        background-size: cover;
	
  }
.imgcenter {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
	height: 80%;
    /* border: solid 1px rgb(0, 0, 0); */
    /* border-radius: 50%; */
    /* background-color: white; */
  }
  .login-box-body{
	margin-top:10em;
	background-color: rgba(255, 255, 255, .0);
	/* border: solid 1px rgb(0, 0, 0); */
	/* box-shadow: 5px 10px black; */
  }
    .oval-button {
        border-radius: 50px; /* Adjust the value to change the oval shape */
        
    }
</style>
  
</style>
<body class="hold-transition  login-page">
<div class="login-box ">
  	<div class="login-logo">
	 
  		<!-- <b >TMT Foods Incorporated</b> -->
  	</div>
  
  	<div class="login-box-body">
	   <img src="../images/manila-logo-main.png" alt="tmt" class="imgcenter">
    	<p class="login-box-msg">Sign in to start your session</p>
		
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
					
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>