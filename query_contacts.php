<?php 
//dynamic content into its own script
include("functions.php"); //had to include this bc origninally index.php had it but query_cont.php doesnt down index.php exists
$dblink=db_connect("contact_data");
$sql="Select * from `contact_info`"; //query
$result=$dblink->query($sql) or
	die("Something went wrong with $sql ".$dblink->error);
while ($data=$result->fetch_array(MYSQLI_ASSOC)){
	echo '<tr>';
	echo '<td>'.$data['first_name'].'</td>';
	echo '<td>'.$data['last_name'].'</td>';
	echo '<td>'.$data['email'].'</td>';
	echo '<td>'.$data['phone'].'</td>';
	echo '<td>'.$data['comments'].'</td>';
	echo '</tr>';
}
?>