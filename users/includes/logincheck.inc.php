<?php
function check_login_admin()
{
	include('../includes/config.php');
	$role = "1";
	$username = $_SESSION['name'];
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	if ($stmt = $con->prepare('SELECT id, password,RoleId FROM accounts WHERE username = ? and RoleId=?')) {
		// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
		$stmt->bind_param('si', $username, $role);
		$stmt->execute();
		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
		} else {

			session_start();
			session_unset();
			session_destroy();
			// Redirect to the login page:
			header('Location: login.php');
		}
	} else {
		echo "Probleme me arunzhimin e te dhenave";
	}


	$stmt->close();
}

function check_login_accountant()
{
	include('../includes/config.php');
	$role = "3";
	$username = $_SESSION['name'];
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	if ($stmt = $con->prepare('SELECT id, password,RoleId FROM accounts WHERE username = ? and RoleId=?')) {
		// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
		$stmt->bind_param('si', $username, $role);
		$stmt->execute();
		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
		} else {

			session_start();
			session_unset();
			session_destroy();
			// Redirect to the login page:
			header('Location: login.php');
		}
	} else {
		echo "Probleme me arunzhimin e te dhenave";
	}
}

function check_login_client()
{
	include('../includes/config.php');
	$role = "2";
	$username = $_SESSION['name'];
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	if ($stmt = $con->prepare('SELECT id, password,RoleId FROM accounts WHERE username = ? and RoleId=?')) {
		// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
		$stmt->bind_param('si', $username, $role);
		$stmt->execute();
		// Store the result so we can check if the account exists in the database.
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
		} else {

			session_start();
			session_unset();
			session_destroy();
			// Redirect to the login page:
			header('Location: login.php');
		}
	} else {
		echo "Probleme me arunzhimin e te dhenave";
	}


	$stmt->close();
}
function check_login_user()
{

	include('../../conf/config.php');
	if (!isset($_SESSION['email'])) {
		// Could not get the data that should have been sent.
		session_start();
		session_unset();
		session_destroy();
		// Redirect to the login page:
		header('Location: ../index.php');
	}else{
		$email = $_SESSION['email'];
		$privilege = "3";
		if ($stmt = $con->prepare('SELECT id, password,privilege FROM users WHERE email = ? and privilege = ?')) {
			// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
			$stmt->bind_param('ss', $email, $privilege);
			$stmt->execute();
			// Store the result so we can check if the account exists in the database.
			$stmt->store_result();
			if ($stmt->num_rows > 0) {
				echo "Logedin";
			} else {
	
				session_start();
				session_unset();
				session_destroy();
				// Redirect to the login page:
				header('Location: ../index.php');
			}
		} else {
			echo "Probleme me arunzhimin e te dhenave";
		}
	}
	// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
	


	$stmt->close();
}
