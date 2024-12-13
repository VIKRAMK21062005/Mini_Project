<?php
session_start();

// initializing variables
$full_name = "";
$email_id    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'chat');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
  $email_id = mysqli_real_escape_string($db, $_POST['email_id']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($full_name)) { array_push($errors, "full name is required"); }
  if (empty($email_id)) { array_push($errors, "Email_id is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same full_name and/or email
  $user_check_query = "SELECT * FROM users WHERE full_name='$full_name' OR email_id='$email_id' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['full_name'] === $full_name) {
      array_push($errors, "full_name already exists");
    }

    if ($user['email_id'] === $email_id) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = ($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (full_name, email_id, password) 
  			  VALUES('$full_name', '$email_id', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['full_name'] = $full_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.html');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($full_name)) {
  	array_push($errors, "full_name is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	
  	$query = "SELECT * FROM users WHERE full_name='$full_name' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['full_name'] = $full_name;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.html');
  	}else {
  		array_push($errors, "Wrong full_name/password combination");
  	}
  }
}

?>