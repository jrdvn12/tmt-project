<?php 

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$admin = new User();

	$_POST['role'] = "admin";
	$_POST['date'] = date("Y-m-d H:i:s");
	
	$errors = $user->validate($_POST);
	if(empty($errors)){
		
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$user->insert($_POST,'admin');

		redirect('admin&tab=admin');
	}


}
	
if(Auth::access('admin')){
	require views_path('auth/signup');
}else{

	Auth::setMessage("Only admins can create users");
	require views_path('auth/denied');
}

