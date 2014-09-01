<DOCTYPE HTML>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/bootstrap.css'?>">
	</head>
	<body>
   
			<div class="container">
				<div class="row">
					<div class="span12">
                     
						<div class="well">
<div style="float:right"> <img src="../../images/<?php echo $this->session->userdata["image"]?>" style="height:50px;width:60px;"></image>
<?php echo "Welcome ".$this->session->userdata["name"]?>! &nbsp;&nbsp;<a href="../logoutController/index">Logout</a></div>
							<center><h1> Code Editor<h1></center>
						</div>
					</div>
				</div>
							
                       
<html>
