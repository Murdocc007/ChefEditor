<!DOCTYPE HTML>
	<html>
    <script>
    function showhideSignup()
	{
		if(document.getElementById("signup").style.display==='none')
		{
			document.getElementById('signup').style.display = 'block';
			document.getElementById('login').style.display = 'none';
			document.getElementById('foo').innerHTML="Log In";
		}
		else
		{
			document.getElementById('signup').style.display = 'none';
			document.getElementById('login').style.display = 'block';
			document.getElementById('foo').innerHTML="Sign Up";
			}	
	}
    </script>
		<head>
			<title>Code Editor</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/bootstrap.css'?>">
		</head>
		<body style="text-align:center">
            <?php if($this->session->userdata('name'))
			{
				$url=base_url().'index.php/homeController/index';
				header('Location:'.$url);
			} 
			else {  ?> 
            <div id="login" style="display:block">
			<?php echo validation_errors(); ?>
			<h3>Log in</h3>
			<?php echo form_open('loginController/checklogin'); ?>
			
			Email:<br/>
			<input type="text" name="email"/></br>
			
			Password: <br/>
			<input type="password" name="password"/>
			<br/>
            
			<input  class="btn" type="submit" value="Log in" name="submit"/>
			
			</form>
            </br>

       </div>
<div id="signup" style="display:none"> 
            <?php echo form_open_multipart('userController/add')?>
<br/>
<h3>Sign Up</h3>
            Name:<br/>
            <input type="text" name="user_name"/></br>
            Email:<br/>
            <input type="text" name="user_email"/></br>
            Password:<br/>
            <input type="password" name="user_password"/></br>  
             Profile picture:<br/>
            <input type="file" name="user_pic" size="20" /><br/>
          <input type="submit" class="btn" value="Sign Up" name="Submit">
            </form>

            </div>
            <?php echo $error ?>
                    <a href=# id="foo" onClick="showhideSignup()">Sign Up</a>   &nbsp;&nbsp;  Or &nbsp;&nbsp;
       <a class="btn btn-facebook" href="<?php echo $loginUrl;?>"><i class="icon-facebook"></i> | Connect with Facebook</a>
            
            <?php  }?>
			
		</body>
	</html>
			
			
			