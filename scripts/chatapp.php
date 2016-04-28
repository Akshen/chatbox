<?php 

require('connections.php');
		$query = "SELECT * FROM `records`.`chat` ORDER BY id DESC";
		$run = $conn->query($query);

		while($row = $run->fetch_array()) :
?>

	<div style="padding: 5px;">
			<span style="color:#3498DB;"><?php echo $row['name'] ?> :</span>
			<span style="color:#F9BF3B;"><?php echo $row['message'] ?> </span>
			<span style="float: right"><?php echo $row['date'] ?> </span>
			<?php if(strlen($row["image_name"]) == 0 || $row['image_type'] == "docx" || $row['image_type'] == "mp3") : ?>
				<hr style="border-top: dotted 1px;color:#E4F1FE;">
			<?php else :?>
			    <span><img src="uploads/<?php echo $row['image_name'] ?>" style="margin-top:5px;margin-left:5px;width:250px;height:200px;"></span>
			    <hr style="border-top: dotted 1px;color:#E4F1FE;">
			<?php endif; ?>
	</div>

	<?php
		endwhile;
	 ?>
