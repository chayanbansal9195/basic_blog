<?php
    
	$username=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(!empty($username)|| !empty($email)||!empty($password))
{
	$dbhostname ="localhost";
	$dbusername ="root";
	$dbpassword ="";
    $dbdatabase = "blog";
	$conn = new mysqli($dbhostname,$dbusername,$dbpassword,$dbdatabase);
	
	if($conn->connect_error)
	{
		echo "connection was failed";
	}
    else{
		//echo "connection was successful";
		//echo "<br>";
		$SELECT = "SELECT email From tree Where email = ? Limit 1";
		$INSERT ="INSERT Into tree (username,email,password) values(?,?,?)";
		$stmt=$conn->prepare($SELECT);
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt->bind_result($email);
		$stmt->store_result();
		$rnum=$stmt->num_rows;

		if($rnum==0){
		 $stmt->close();
		$stmt=$conn->prepare($INSERT);
		$stmt->bind_param("sss", $username,$email,$password);
		$stmt->execute();
       //echo "New record inserted successfully";}
		echo '<body style="background:url(j.jpg);background-size:cover;"></body>';
		echo '<a href="post.html" style="font-style:italic;font-size:50px;text-align:center;color:salmon;"><p style="text-align:center;margin-top:150px;">Click Here To Proceed</p></a>';
	}
       else{
       	echo '<p style="font-family:arial;font-weight:bolder;font-size:40px;color:maroon;text-align:center;margin-top:50px;">Someone already registered using this email</p>';
       	echo '<a href="index.html" style="font-style:italic;font-size:50px;color:red;"><p style="text-align:center;">Click Here To Register</p></a>';
       	echo '<body style="background:url(j.jpg);background-size:cover;"></body>';
       }
       $stmt->close();
       $conn->close();
	}}
	else{
		echo "All field are required";
		die();
	}
?>	