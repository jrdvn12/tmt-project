<?php session_start(); ?>
<?php include 'error.php'; ?>
<?php include 'header1.php'; ?>
<style>
  .login-page{
    display: flex;
		align-items: center;
		background: url(../images/BG.jpg);
	    background-repeat: no-repeat;
	    background-size: cover;
  }
  .imgcenter {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 30%;
    /* border: solid 3px rgb(0, 0, 0); */
    border-radius: 50%;
    /* background-color: rgba(245, 126, 126, 0.815); */
  }
  /* Center the text in the placeholder
    ::-webkit-input-placeholder {
      text-align: center;
    }
    :-moz-placeholder {
      text-align: center;
    }
    ::-moz-placeholder {
      text-align: center;
    }
    :-ms-input-placeholder {
      text-align: center;
    } */
    input[type="password"] {
      text-align: center;
    }
</style>
<body class="hold-transition login-page ">
<div class="login-box bg-blue">
      <div class="login-logo">
        <p id="date_day"></p>
        <p id="date"></p>
        <p id="time" class="bold"></p>
      </div>
  
      <div class="login-box-body bg-blue">
          <!-- <h4 class="login-box-msg">Scan Your Employee ID</h4> -->
          <form id="attendance" class="attendance">
          <img src="../images/RFID.png" alt="RFID" class="imgcenter">
              <div class="form-group has-feedback">
              <input type="hidden" id="latitude" name="latitude" value="">
              <input type="hidden" id="longitude" name="longitude" value="">
                <input type="password" class="form-control input-lg" id="employee" name="employee" placeholder="SCAN YOUR ID" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>  
              </div>
              <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-warning btn-block btn-flat" name="signin" ><i class="fa fa-sign-in" ></i> TAP</button>
                </div>
              </div>
          </form>
      </div>

      <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
        <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
      </div>

      <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
        <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
      </div>
  		
</div>
	
<?php include 'scripts.php' ?>
<?php include 'attendance_modal.php'; ?>

<script type="text/javascript">

$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
   // $('#date_day').html(momentNow.format('dddd').substring(0,3).toUpperCase());  
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    //$('#date').html( momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    var textboxValue = $("#employee").val();
    $.ajax({
      type: 'POST',
      url: 'tryyy.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        document.getElementById('employee').disabled = true;
        if(response.error){
          document.getElementById('employee').disabled = true;
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
          setTimeout(function () {
            location.reload();
            }, 1000);
            
        }
        else{
          document.getElementById('employee').disabled = true;
          /**/$('.alert').hide();
          //$('.alert-success').show();
          //$('.message').html(response.message);

          $('#edit').modal('show');
          $('#employee_id').html(response.employee_id);
          $('#employee_name').html(response.name);
          $('#timecheck').html(response.time);
          $('#status').html(response.status);
          $('#profile_picture').attr('src', response.image);
         

          setTimeout(function () {
            location.reload();
            }, 1000);
            

        }
      }
    });
  
  });
  
    
});

          // Automatically trigger geolocation when the page loads
          window.onload = function() {
            
            document.getElementById('employee').focus();
            getLocation();
          }


          function getLocation() {
              if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(showPosition, showError, {
                      enableHighAccuracy: true
                  });
              } else {
                  alert("Geolocation is not supported by this browser.");
              }
          }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            document.getElementById("latitude").value = latitude;
            document.getElementById("longitude").value = longitude;

            //document.getElementById("attendance").submit();
            // Manually trigger the form submission
            document.getElementById("submitBtn").click();
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location has timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        
    </script>
</body>
</html>
