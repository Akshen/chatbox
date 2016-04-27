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
			<input type="text" name="name" placeholder="Enter Name"></input>
		</div>
		<div class="element_2">
			<textarea name="message" placeholder="Enter Message"></textarea><br/>
		</div>
		
		<div class="fileUpload">
			<span class="custom-span" name="imageUpload">+</span>
				<!-- <p class="custom-para" name="imageUpload">Add Images</p> -->
				<input id="uploadBtn" type="file" class="upload" name="imageUpload"/>
			</div>
			
		
	<input type="submit" name="submit" value="Send It"/>
</form>

</body>

</html>
