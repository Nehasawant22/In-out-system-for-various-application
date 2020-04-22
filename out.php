<form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<h1 align="center">Library (Out)</h1>
	<hr></hr>
<input type="text" Placeholder="Enter your GRN" name="grn" required>
	<input type="submit" name="submit" value="Enter"/>
	
</form>
<?php
include_once 'condb.php';

/*$sql = "INSERT INTO lib values(".$_GET['grn'].",'00:00:00',NOW())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
if(isset($_REQUEST['submit']))
{
 $sql="UPDATE lib SET outtime=NOW() where grn=".$_GET['grn'];
		   if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
} 
?>