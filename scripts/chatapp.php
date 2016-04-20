<?php 

require('connections.php');
//include('scripts/insert.php');


		$query = "SELECT * FROM `records`.`chat` ORDER BY id DESC";
		$run = $conn->query($query);

		while($row = $run->fetch_array()) :
	?>

	<div style="padding: 5px;">
			<span style="color:#3498DB;"><?php echo $row['name'] ?> :</span>
			<span style="color:#F9BF3B;"><?php echo $row['message'] ?> </span>
			<span style="float: right"><?php echo $row['date'] ?> </span><hr style="border-top: dotted 1px;color:#E4F1FE;">
			<!-- Add for image-->
	</div>
	
	<?php 
		endwhile;
	 ?>