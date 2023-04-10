<?php
// session_start();
include '../Controller/LoginController.php';
$error="";
 if(isset($_POST["login"]))  
 {
	
	foreach ($_COOKIE as $cookieName => $cookieValue) {
    setcookie($cookieName, '', time() - 3600);
    }



	
        if(!empty($_POST["username"]) && !empty($_POST["password"]))
        {
            $username=$_POST["username"];
            $password=$_POST["password"];
            
  
        if(verify($username,$password)==TRUE)
        {       
		  
			if (!empty($_POST['remember'])) {
				setcookie("username", $_POST['username'], time()+10);
				setcookie("password", $_POST['password'], time()+10);
				setcookie("color", "red", time()+10);
				
			}else{
				setcookie("username", "");
				setcookie("password", "");
				echo "Cookie not set";
		
			}
		   
		   $_SESSION['uname'] = $username;
		   $_SESSION['pass'] = $password;
		   
		   header("location:../View/TransportOwner_Home.php");
	       exit();
        }
        if(verify($username,$password)==FALSE)
        {
			$error="Username or Password invalid";
        }
        }
        else
        {
			$error="Password or UserName is Empty";
        }


 }

?> 


<!DOCTYPE HTML >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login form</title>

</head>

<body>
<div class="formexample">
		<form  class="formtest" method="post" action="">
		<!-- <form  class="formtest" method="post" action="../Controller/LoginController.php"> -->
				<fieldset>
						<legend>Log In</legend>
						<?php   
                              if(isset($error))  
                                {  
                                   echo $error;  
                                }  
                        ?>  
                     <br /> 
						<div>
						<label>Username : </label>   
                        <!--<input type="text" placeholder="Enter Username" name="username" required>--> 
						<input style="background-color: <?php if (isset($_COOKIE['color'])) {
		                echo $_COOKIE['color'];
	                    }?>" 
                        type="text" placeholder="Enter Username" name="username" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>" required> 
                        </div>
						<div>
                        <label>Password : </label>   
                        <!--<input type="password" placeholder="Enter Password" name="password" required>--> 
						<input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>"required>  
                        </div>   
						<div>
						<input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
						</div>
                        <div>
								<input type="submit" name="login" id="submit" value="Log In" />
								 <a href="TransportOwnerPasswordFind.php">Forgot password? </a>
								<br>
								<a href="Registration.php">Sign Up</a>
						</div>


				</fieldset>
		</form>
</div>
</body>
</html>