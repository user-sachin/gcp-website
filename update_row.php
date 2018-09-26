<?php
		
	$primaryKey = $_GET['primaryKey'];
	$number = $_GET['number'];
	$name = $_GET['name'];
	$type1 = $_GET['type1'];
	$type2 = $_GET['type2'];
	$generation = $_GET['generation'];
	$legendary = $_GET['legendary'];

	
	$queryStringSingleRecord = "UPDATE users SET number='" . $number . "', name='" . $name. "', type1='" . $type1. "', type2='" . $type2. "', generation='" . $generation. "', legendary='" . $legendary . "' WHERE `number` = " . "'" . $primaryKey . "'";

   echo "<script type='text/javascript'>alert('$queryStringSingleRecord');</script>";

   //$con=mysqli_connect("35.233.11.254","Tester","Digital00","Pokemon");
   $conn=mysqli_connect("sachinsshahcom.ipagemysql.com","coachusers","coachusers","coachusers");
   
   
   if (mysqli_query($conn, $queryStringSingleRecord)){
	   		echo "<script>window.close();</script>";
   }
   else{
	        {echo "Error updating record: " . mysqli_error($conn);}

   }
   $conn->close();
   mysqli_close($conn);
?>