<?php 
	include('scripts/connections.php');
	include('scripts/insert.php');
	
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat-Live</title>
	<link rel="stylesheet" type="text/css" href="scripts/main.css">
	<script>
		function ajax()
		{
			

			var req = new XMLHttpRequest();
			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById("chat").innerHTML = req.responseText;
				}
			}
			req.open("GET","scripts/chatapp.php",true);
			req.send();
		}

		setInterval(function(){
			ajax();	
		},1000);
	</script>
</head>
<body onload="ajax();">

<div class="container">
	<div class="chathead">ChatBox</div>
	<div id="chat">	</div>
</div>

<form class="chatbox" method="post" action="index.php" enctype="multipart/form-data">
		<div class="element_1">
		<input type="text" name="name" placeholder="Enter Name">
		</input>
		</div>
		<div class="element_2">
		<textarea name="message" placeholder="Enter Message"></textarea><br/>
		</div>
			

			<!-- <label for="file-upload" class="custom-file-upload">
    			<i class="fa fa-cloud-upload" name="imageUpload" id="imageUpload"></i> +
    			<input id="file-upload" type="file" name="imageUpload"/>
				</label> -->
			<input type="file" name="imageUpload" id="imageUpload"/>

		
		<input type="submit" name="submit" value="Send It"/>
</form>

</body>

</html>
