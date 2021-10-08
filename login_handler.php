<?php
	
	session_start();
	require "includes/db_connect.php";

	$username=$_POST['Username'];
	$pass=$_POST['pass'];

	if($username == '' OR $pass == '') {
		echo "
		<script>
		 alert('Some inputs are empty!');
		 window.location.assign('login.php');
		</script>
		";
	}
	else {
	if(strlen($username) > 40  OR strlen($pass) > 16) {
		echo "
		<script>
		 alert('Some inputs are too long!');
		 window.location.assign('login.php');
		</script>
		";
	}
	else {
		$sql = "SELECT * FROM users WHERE USERNAME='$username' && PASSWORD='$pass' ";
		$query= mysql_query($sql);

		if(mysql_num_rows($query) == 0) {
			echo "
		<script>
		 alert('Username or password is wrong!');
		 window.location.assign('login.php');
		</script>
		";
		}
		else{
			$row = mysql_fetch_array($query);
			$user_id=$row['USER_ID'];

			$_SESSION['user_id'] = $user_id;
			$_SESSION['session_id'] = session_id();
			$_SESSION['user_role'] = 'user';

			header("Location: index.php");
		}
	}
}

	