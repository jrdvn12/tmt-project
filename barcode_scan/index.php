<?php include 'header.php'; ?>
<style>
.login-page{
    display: flex;
    align-items: center;
    background: url(../images/TMT_FOODS.png);
    background-repeat: no-repeat;
    background-size: cover;
	
  }
  .video{
    border-radius : 50%;
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

  .login-box-body {
    margin-top:5em;
    background-color: rgba(255, 255, 255, .0);
    border: solid 1px rgb(0, 0, 0);
  }


  .form-control {
    text-align: center;
  }
</style>

<body class="hold-transition  login-page">
<div class="login-box ">
  	<div class="login-logo">
	 
  		<!-- <b >TMT Foods Incorporated</b> -->
  	</div>
  
  	<div class="login-box-body">
	   <img src="../images/manila-logo-main.png" alt="tmt" class="imgcenter">
    	<p class="login-box-msg">SCAN YOUR BARCODE</p>
		
    	<form id="barcodeForm" action="process.php" method="POST">
        <video id="video" width="100%" height="fill" autoplay></video>
      		<div class="form-group has-feedback">
            <div id="barcode-result"></div>
            <div id="server-response"></div>
            <script src="quagga.min.js"></script>
            <script src="scanner.js"></script>
      		</div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="barcodeInput" name="barcode" placeholder="INPUT BARCODE" required>
            <span class="fa fa-barcode form-control-feedback"></span>
          </div>
      		<div class="row">
    			  <div class="col-xs-12">
          			<button type="submit" onclick="manualSubmit()" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in"></i> CHECK </button>
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
	
<?php include 'scripts.php' ?>
</body>
</html>