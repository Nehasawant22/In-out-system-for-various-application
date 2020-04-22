<h1 align="center">Library Utilization Report</h1>
<h2 align="center">(Detailed Summary Report)</h2>
<hr></hr>
<?php
include_once 'condb.php';

$sql = "SELECT name,course,student.grn,cdate,intime,outtime,timediff(outtime,intime) as diff FROM lib,student where student.grn=lib.grn";
$result = $conn->query($sql);
$t=0;
$p=0;
if ($result->num_rows > 0) {
    // output data of each row
?>
<table border="1">

	 <tr>
	 <th>Sr. No.</th>
		 <th>GRN</th>
		 <th>Name of Student</th>
		 <th>Course</th>
		 <th> Date</th>
		<th> In Time</th>
		<th> Out Time</th>
		<th> Duration</th>
	</tr>
<?php	
	while($row = $result->fetch_assoc()) {
		?>
	<tr>
	<td align="center"><?php echo ++$p;?></td>
		<td><?php echo $row["grn"];?></td>
		<td><?php echo $row["name"];?></td>
		<td><?php echo $row["course"];?></td>
		<td><?php echo $row["cdate"];?></td>
		<td><?php echo $row["intime"];?></td>
		<td><?php echo $row["outtime"];?></td>
		<td><?php echo $row["diff"];$tot[]=$row["diff"];?></td>
	</tr>
<?php
$t++;
    }
	echo "</table>";
} else {
    echo "0 results";
}


$hrs = 0;
$mins = 0;
$secs = 0;

foreach ($tot as $time) {
    // Let's take the string apart into separate hours, minutes and seconds
    list($hours, $minutes, $seconds) = explode(':', $time);

    $hrs += (int) $hours;
    $mins += (int) $minutes;
    $secs += (int) $seconds;

    // Convert each 60 minutes to an hour
    if ($mins >= 60) {
        $hrs++;
        $mins -= 60;
    }

    // Convert each 60 seconds to a minute
    if ($secs >= 60) {
        $mins++;
        $secs -= 60;
    }
}
echo "<h2>Library Utilization time: ";
echo sprintf('(Hours: %d, Mins: %d, Sec: %d) ', $hrs, $mins, $secs);

echo "<h2><strong> No. of students accessed Library: ".$p."</strong></h2><br>";


$conn->close();

?> 
<hr></hr>
<h2>
<ul>
<li><a href="btdates.php">Summary Report(from date - to date)</a></li>
<li><a href="degbtdates.php">Degree: Summary Report(from date - to date)</a></li>
<li><a href="dipbtdates.php">Diploma: Summary Report(from date - to date)</a></li>
<li><a href="in.php">Library (In)</a></li>
<li><a href="out.php">Library (Out)</a></li>
</ul>
</h2>
