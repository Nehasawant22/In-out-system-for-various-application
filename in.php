<form method="GET" action="in.php">
	<h1 align="center">Library (In)</h1>
	<hr></hr>
<input type="text" Placeholder="Enter your GRN" name="grn" required>
	<input type="submit" name="submit" value="Enter"/>
<h2>
<ul>
<li><a href="out.php">Enter Out time</a></li>
</ul>
</h2>
	</form>
<?php

include_once 'condb.php';
// Create connection

if(isset($_REQUEST['submit']))
{
$sql = "INSERT INTO lib values(".$_GET['grn'].",curdate(),NOW(),'00:00:00')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
