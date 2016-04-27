<?php 

require('connections.php');

if(isset($_POST['submit']))
			{
				$name = $_POST['name'];
				$msg = $_POST['message'];
				$ip=get_client_ip();
				
				

				if(strlen($name) == 0 || strlen($msg) == 0){
						echo "Invalid Message!!!";
						return false;
				}
				else{				

					$target_dir = "uploads/"; //give proper permissions to this folder
					$target_name = $_FILES["imageUpload"]["name"];
					$target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					//$imageFileType = $_FILES["imageUpload"]["type"];
					$target_file_size = getimagesize($_FILES["imageUpload"]["tmp_name"]);
					
					if($target_file_size == 0)
					{
						
					}else{
						if ($_FILES["imageUpload"]["size"] > 500000) {
    						echo "Sorry, your file is too large.";
   						}
   						else{
   							
   							if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "gif") {
    								echo "Sorry, only JPG, JPEG, PNG files are allowed.";
							}else{
    							if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
	        							//echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    									echo "file Uploaded successfully";
    							} else {
        								echo "Sorry, there was an error uploading your file.";
    							}
    						}
						}	
    				}

						$query = "INSERT INTO `records`.`chat` (name,message,ipadr,image_name,image_type)
						VALUES ('$name','$msg','$ip','$target_name','$imageFileType')";
						$run = $conn->query($query);
						
						
						

					if($run){
						echo "<embed loop='false' src='include/chat.wav' hidden='true' autoplay='true'>";
						}
					}	

			}


			function get_client_ip() {
    				$ipaddress = '';
    				if (getenv('HTTP_CLIENT_IP'))
        				$ipaddress = getenv('HTTP_CLIENT_IP');
    				else if(getenv('HTTP_X_FORWARDED_FOR'))
        				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    				else if(getenv('HTTP_X_FORWARDED'))
        				$ipaddress = getenv('HTTP_X_FORWARDED');
    				else if(getenv('HTTP_FORWARDED_FOR'))
        				$ipaddress = getenv('HTTP_FORWARDED_FOR');
    				else if(getenv('HTTP_FORWARDED'))
       					$ipaddress = getenv('HTTP_FORWARDED');
    				else if(getenv('REMOTE_ADDR'))
        				$ipaddress = getenv('REMOTE_ADDR');
    				else
        				$ipaddress = 'UNKNOWN';
    				return $ipaddress;
}


?>