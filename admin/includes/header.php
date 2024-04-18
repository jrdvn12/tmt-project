<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title >TMT Foods Incorporated</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="../images/logo.ico" rel="shortcut icon" type="image/x-icon" />
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  	<!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- <link rel="stylesheet" href="../dist/css/modern-AdminLTE.min.css"> -->
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  	<style type="text/css">
  		.mt20{
  			margin-top:20px;
  		}
      .bold{
        font-weight:bold;
      }

     /* chart style*/
      #legend ul {
        list-style: none;
         
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
        border-radius: 5px;
       
        padding: 2px 8px 2px 28px;
        font-size: 14px;
        cursor: default;
        -webkit-transition: background-color 200ms ease-in-out;
        -moz-transition: background-color 200ms ease-in-out;
        -o-transition: background-color 200ms ease-in-out;
        transition: background-color 200ms ease-in-out;
      }

      #legend li span {
        
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 100%;
        border-radius: 5px;
      }

      tbody tr:nth-child(even) 
      {
      background-color: #ecf0f1; /* Light gray background for even rows */
      }

      tbody tr:nth-child(odd) {
        background-color: #ffffff; /* White background for odd rows */
      }

      tbody tr:hover {
        background-color: #d4e6f1; /* Light blue background on hover */
        opacity: 1; /* Full opacity on hover */
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
  /* .btn {
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 3px;
  } */

  /* .btn-primary {
    background-color: #866252;
  }

  .btn-primary:hover {
    background-color: #4F413E;
  } */
  .skin-custom {
      background:#D1B188;
  }
  /* CSS for hover effect when not clicking*/
.sidebar-menu .treeview:not(.active):hover > a,
.sidebar-menu .treeview.active > a,
.sidebar-menu li:hover > a,
.sidebar-menu li.active > a {
    background-color: #d7bba6;
    color: #d7bba6;
}
/* CSS for hover effect when not clicking*/
.sidebar-menu .treeview:not(.active):hover > a,
.sidebar-menu .treeview-menu:not(.active) > li:hover > a {
    background-color: #d7bba6;
    color: #d7bba6;
}


  #lower-right-container {
      position: fixed;
      bottom: 20px;
      right: 20px;
   }
</style>

    </style>
</head>
<?php include 'includes/error.php'; ?>

   <!-- Container div for the code -->
   <div id="lower-right-container">
      <ul class="scroll-to-top" data-widget="tree" style="background-color: #D1B188; color: black;">
         <li class="treeview">
            <a href="#" style="color: black;" class="fa fa-gear"></a>
            <ul class="treeview-menu" style="list-style-type: none;">
               <li><a href="#" onclick="scrollToTop()" style="color: black;"><i class="fa fa-circle-o"></i> Top</a></li>
               <li><a href="#" onclick="scrollToBottom()" style="color: black;"><i class="fa fa-circle-o"></i> Bottom</a></li>
               <li><a href="#" onclick="scrollToTop()" style="color: black;"><i class="fa fa-circle-o"></i> Dark Mode</a></li>
            </ul>
         </li>
      </ul>
   </div>
 


	<script>
		// Scroll to top function
		function scrollToTop() {
			window.scrollTo({
				top: 0,
				behavior: 'smooth'
			});
		}

		// Scroll to bottom function
		function scrollToBottom() {
			window.scrollTo({
				top: document.body.scrollHeight,
				behavior: 'smooth'
			});
		}
	</script>
</body>
</html>