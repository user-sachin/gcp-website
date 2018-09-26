<?php

	$ipname = $_GET['ipname'];
   $uname = $_GET['uname'];
   $psw = $_GET['psw'];
   $dbname = $_GET['dbname'];

   //$con=mysqli_connect($ipname,$uname,$psw,$dbname);
   
   //$con=mysqli_connect("35.233.11.254","Tester","Digital00","Pokemon");
   //$tablename = 'pokelist';
   
   $con=mysqli_connect("sachinsshahcom.ipagemysql.com","coachusers","coachusers","coachusers");
   $tablename = 'users';


   if (mysqli_connect_errno($con)) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }
   $result = mysqli_query($con,"SELECT * FROM $tablename");
   	echo '<script type="text/javascript">';
   	echo 'var rowCounter = 0;';
   	echo 'var primaryKeyz = [];';
	echo 'primaryKeyz.push("'. "primaryKeyz" .'");';

	echo '</script>';

   echo "<table id='mytab1' border='1'>
<tr>
<th>Number</th>
<th>Name</th>
<th>Type1</th>
<th>Type2</th>
<th>Generation</th>
<th>Legendary</th>
<th></th>
</tr>";
$i = 1; // this is the counter

   while($row = mysqli_fetch_array($result))
	{

		echo "<tr>";
		echo "<td><div contenteditable>" . $row[0] . "</div></td>";
		echo "<td><div contenteditable>" . $row[1] . "</div></td>";
		echo "<td><div contenteditable>" . $row[2] . "</div></td>";
		echo "<td><div contenteditable>" . $row[3] . "</div></td>";
		echo "<td><div contenteditable>" . $row[4] . "</div></td>";
		echo "<td><div contenteditable>" . $row[5] . "</div></td>";
		echo "<td><button onclick=\"updateSingleRow(" . $i . ")\" >Update</button></td>";
		echo "</tr>";
		echo '<script type="text/javascript">';
		echo 'rowCounter = rowCounter+1;';
		echo 'primaryKeyz.push("'. $row[0] .'");';
		echo '</script>';
		$i++; // the counter counts
	}
	echo "</table>";
	   
   
      	echo "  <button onclick=\"addRow()\" style=\"font-size:50px;\" type=\"button\" id=\"updatebutton\" value=\"1\" >+</button>";


   
   	echo "  <button onclick=\"executeDBoperations()\" style=\"font-size:50px;\" type=\"button\" id=\"updatebutton\" value=\"1\" >Update</button>";
	
	echo '<script type="text/javascript">';
	
	echo 'var queryString = " ";';


	echo 'function addRow() {';
	
	
	
		echo 'var table = document.getElementById("mytab1");';
		echo 'var row = table.insertRow(table.size);';
		
		echo 'var cell1 = row.insertCell(0);';
		echo 'var cell2 = row.insertCell(1);';
		echo 'var cell3 = row.insertCell(2);';
		echo 'var cell4 = row.insertCell(3);';
		echo 'var cell5 = row.insertCell(4);';
		echo 'var cell6 = row.insertCell(5);';
		echo 'var cell7 = row.insertCell(6);';
		echo 'var placeHolder = "<div contenteditable>NEW CELL"+rowCounter+"</div>";';
		//echo 'alert(placeHolder);';
		echo 'cell1.innerHTML = placeHolder;';
		echo 'cell2.innerHTML = placeHolder;';
		echo 'cell3.innerHTML = placeHolder;';
		echo 'cell4.innerHTML = placeHolder;';
		echo 'cell5.innerHTML = placeHolder;';
		echo 'cell6.innerHTML = placeHolder;';
		//echo 'cell7.innerHTML = "<button onclick=\"updateSingleRow(rowCounter)\" >Update</button>";';
		echo 'rowCounter = rowCounter+1;';
	echo '}';
	
	
	echo 'function deleteDatabase() {';
	//echo 'alert("mysql_query(\'TRUNCATE TABLE pokelist;\');");';
	echo 'window.open("delete_data.php?queryStringDel=TRUNCATE TABLE users&queryStringIns="+queryString,"_blank");';
	echo '}';
	
	
	
	echo 'function executeDBoperations() {';
	echo 'queryString = " ";';
	echo 'var table = document.getElementById("mytab1");';
	echo 'for (var i = 1, row; row = table.rows[i]; i++) {';
	echo 'if( (((row.cells[0].innerHTML).substring(24, row.cells[0].innerHTML.length-6))) ) {';
		echo 'var res = "(\'".concat(((row.cells[0].innerHTML).substring(24, row.cells[0].innerHTML.length-6)), "\', \'", ((row.cells[1].innerHTML).substring(24, row.cells[1].innerHTML.length-6)), "\', \'", ((row.cells[2].innerHTML).substring(24, row.cells[2].innerHTML.length-6)), "\', \'", ((row.cells[3].innerHTML).substring(24, row.cells[3].innerHTML.length-6)), "\', \'", ((row.cells[4].innerHTML).substring(24, row.cells[4].innerHTML.length-6)), "\', \'", ((row.cells[5].innerHTML).substring(24, row.cells[5].innerHTML.length-6)), "\'), ");';
		echo 'queryString = queryString.concat(res);';	

	echo '}';

	
	
	echo '}';
	echo 'queryString = "INSERT INTO users (number, name, type1, type2, generation, legendary) VALUES".concat(queryString.substring(0, queryString.length-2));';
	
	echo 'deleteDatabase();';
	echo 'alert(queryString);';

	
	//echo 'updateDatabase();';

	
	echo '}';
	
	echo 'function updateDatabase() {';
	echo 'window.open("insert_data.php?queryString="+queryString,"_blank");';
	echo 'alert(queryString);';
	echo '}';
	
	
	echo 'function updateSingleRow(rowCount) {';
	echo 'var name = primaryKeyz['.rowCount.'];';

	//echo 'alert(name);';

	
	echo 'var queryStringSingleRecord = " ";';

	
	
	//echo 'alert(rowCount.toString());';
	echo 'var table = document.getElementById("mytab1");';

	echo 'if( (((table.rows[rowCount].cells[0].innerHTML).substring(24, table.rows[rowCount].cells[0].innerHTML.length-6))) ) {';
		echo 'var res = "(\'".concat(((table.rows[rowCount].cells[0].innerHTML).substring(24, table.rows[rowCount].cells[0].innerHTML.length-6)), "\', \'", ((table.rows[rowCount].cells[1].innerHTML).substring(24, table.rows[rowCount].cells[1].innerHTML.length-6)), "\', \'", ((table.rows[rowCount].cells[2].innerHTML).substring(24, table.rows[rowCount].cells[2].innerHTML.length-6)), "\', \'", ((table.rows[rowCount].cells[3].innerHTML).substring(24, table.rows[rowCount].cells[3].innerHTML.length-6)), "\', \'", ((table.rows[rowCount].cells[4].innerHTML).substring(24, table.rows[rowCount].cells[4].innerHTML.length-6)), "\', \'", ((table.rows[rowCount].cells[5].innerHTML).substring(24, table.rows[rowCount].cells[5].innerHTML.length-6)), "\'), ");';
		//echo 'alert(res);';
		
		
		echo 'queryStringSingleRecord = "&number=".concat(((table.rows[rowCount].cells[0].innerHTML).substring(24, table.rows[rowCount].cells[0].innerHTML.length-6)), "&name=", ((table.rows[rowCount].cells[1].innerHTML).substring(24, table.rows[rowCount].cells[1].innerHTML.length-6)), "&type1=", ((table.rows[rowCount].cells[2].innerHTML).substring(24, table.rows[rowCount].cells[2].innerHTML.length-6)), "&type2=", ((table.rows[rowCount].cells[3].innerHTML).substring(24, table.rows[rowCount].cells[3].innerHTML.length-6)), "&generation=", ((table.rows[rowCount].cells[4].innerHTML).substring(24, table.rows[rowCount].cells[4].innerHTML.length-6)), "&legendary=", ((table.rows[rowCount].cells[5].innerHTML).substring(24, table.rows[rowCount].cells[5].innerHTML.length-6)));';
		
			echo 'alert(queryStringSingleRecord);';

			echo 'window.open("update_row.php?primaryKey="+name+queryStringSingleRecord,"_blank");';

	echo '} else {';
				echo 'window.open("delete_row.php?primaryKey="+name,"_blank");';

	//echo 'queryStringSingleRecord = "DELETE FROM users WHERE number=".concat("\'", name, "\'");';
	echo '}';

	
	//$sql = "DELETE FROM MyGuests WHERE id=3";

	
	echo 'alert(queryStringSingleRecord);';


	echo '}';

	
	echo '</script>';

  
   $con->close();
   mysqli_close($con);
?>