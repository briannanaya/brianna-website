<?php

function db_connect($db){
	$dbUserName="webuser";
	$dbPassword="a/*7jv8l_AEVDG.4";
	$host="localhost";
	$dblink= new mysqli($host,$dbUserName,$dbPassword,$db);
	return $dblink;
}


function redirect ($uri){ //uri is a string 
	?> 
	<script type="text/javascript">//declaring a java
	document.location.href="<?php echo $uri; ?>";
	</script>
<?php die; //kills executions
}
?>