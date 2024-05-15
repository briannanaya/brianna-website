<script src="assets/js/jquery-3.5.1.js"></script>
<?php
//static data
if (isset($_REQUEST['sid']) && $_REQUEST['sid']!=''){
	$sid=addslashes($_REQUEST['sid']);
	$dblink=db_connect("user_data");
	$sql="Select `auto_id` from `accounts` where `session_id`='$sid'";
	$results=$dblink->query($sql) or
		die("<p>Something went wrong with: $sql<br>".$dblink->error);
	if($results->num_rows<=0)
		redirect("indexnew.php?page=login&errMsg=InvalidSid");
	echo '<section id="home" class="sectionPadd">';
	echo '<table class="table table-striped">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>First Name</th>';
	echo '<th>Last Name</th>';
	echo '<th>Email</th>';
	echo '<th>Phone</th>';
	echo '<th>Comments</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody id="results">';
	echo '</tbody>';
	echo '</table>';
	echo '</section>';
}
else
	redirect("indexnew.php?page=login&errMsg=NullSid");
?>
<script>
function refresh_data(){
	$.ajax({
		type: 'post',
		url: 'https://ec2-18-207-190-221.compute-1.amazonaws.com/hw20/query_contacts.php',
		success: function(data){
			$('#results').html(data); //get element by id('results').innerHTML=data
		}
	});
}
setInterval(function(){ refresh_data(); }, 500);
	
</script>