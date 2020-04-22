<html>
<body>
<form method="GET" action="index.php">
<h1 align="center">Login Page</h1>
<hr></hr>
<p align="center"><br>
<input type="text" placeholder="Enter Username" name="uname" required><br><br>
<input type="password" placeholder="Enter Password" name="pwd" required><br><br>
<input type="submit" name="submit" value="Login"/>
</p>
<hr></hr>
</form>
</body>
</html>
<?php
include_once 'condb.php';
if(isset($_REQUEST['submit']))
{
$sql="select * from login where uid='".$_GET['uname']."' and pwd='".$_GET['pwd']."'";
$result = $conn->query($sql);
if ($result->num_rows ==1) {
	header('Location: summary.php');
}
}
?>