<?php
		
	$primaryKey = $_GET['primaryKey'];
	$queryStringSingleRecord = "DELETE FROM users WHERE number='" . $number . "'";

   echo "<script type='text/javascript'>alert('$primaryKey');</script>";

   //$con=mysqli_connect("35.233.11.254","Tester","Digital00","Pokemon");
   $conn=mysqli_connect("sachinsshahcom.ipagemysql.com","coachusers","coachusers","coachusers");
   
   if (mysqli_query($conn, $queryStringSingleRecord)) {
	   		//echo "<script>window.close();</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
   
   
   $conn->close();
   mysqli_close($conn);
?>