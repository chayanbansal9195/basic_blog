<?php
	
    	
    	$entry=$_POST['entry'];
	
         if(!empty($entry))
         {
         	$dbhostname ="localhost";
			$dbusername ="root";
			$dbpassword ="";
			$dbdatabase = "entry";
         	$conn = new mysqli($dbhostname,$dbusername,$dbpassword,$dbdatabase);
	
	if($conn->connect_error)
	{
		echo "connection was failed";
	}
    else{
         //echo "connection successfull";
         $INSERT ="INSERT Into flow (entry) values(?)";
         $stmt=$conn->prepare($INSERT);
		$stmt->bind_param("s", $entry);
		$stmt->execute();
        echo '<body style="background:url(p.jpg);">
        <p style="font-family:courier;font-size:100px;color:salmon;text-align:center;margin-top:200px;letter-spacing:30px;">Thank You</p>
        <p style="font-family:arial;font-weight:bolder;font-size:30px;color:purple;text-align:center;margin-top:50px;letter-spacing:10px;border-style:dotted;border-color:black;">To Write More Post Please Register Again!!</p></body>';
        $stmt->close();
          $conn->close();
      }}
   ?>