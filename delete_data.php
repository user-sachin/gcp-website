<?php
	$queryStringDel = $_GET['queryStringDel'];
	$queryStringIns = $_GET['queryStringIns'];
   
   //$con=mysqli_connect("35.233.11.254","Tester","Digital00","Pokemon");
   $con=mysqli_connect("sachinsshahcom.ipagemysql.com","coachusers","coachusers","coachusers");

   	//echo $queryStringDel;
	    //$result = mysql_query("$queryStringDel");

	$result = mysqli_query($con,"$queryStringDel");	
	if ($result) {
		$result2 = mysqli_query($con,"$queryStringIns");	
		if ($result2) {
		echo "<script>window.close();</script>";
	}
	}

   $con->close();
   mysqli_close($con);
?>