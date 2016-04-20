<?php 

require('connections.php');
include('uploads.php');
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

					
						

						$query = "INSERT INTO `records`.`chat` (name,message,ipadr) VALUES ('$name','$msg','$ip')";
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