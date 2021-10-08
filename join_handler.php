<?php
	
	require "includes/db_connect.php";

	$username=$_POST['Username'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	if($username == '' OR $email == '' OR $pass == '') {
		echo "
		<script>
		 alert('Some inputs are empty!');
		 window.location.assign('join.php');
		</script>
		";
	}
	else {
	if(strlen($username) > 40 OR strlen($email) > 40 OR strlen($pass) > 16) {
		echo "
		<script>
		 alert('Some inputs are too long!');
		 window.location.assign('join.php');
		</script>
		";
	}
	else {
		$sql = "SELECT * FROM users WHERE EMAIL='$email' ";
		$query = mysql_query($sql);
		if(mysql_num_rows($query)>0){
			echo "
			<script>
		 alert('This email already exists!');
		 window.location.assign('join.php');
		    </script>
		";
		}
		else{

	$sql = "INSERT INTO users(USERNAME,EMAIL,PASSWORD) VALUES('$username','$email','$pass')";

	mysql_query($sql);

	 header("Location: index.php");
		}
	}
}

	