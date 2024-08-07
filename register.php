<?php
include ("config.php");


?>
<!doctype html>
<html>
<head>
	<style>  
	
	</style>
	<Title>Register</Title>
	<link rel="stylesheet" href="style1.css">

	</head>

<body>
	<header style="text-align: center;margin-top: 50px;font-size: 50px;font-family: cursive;">BIBLIOMANIA</header>
	<div class="container">
		<div class="box form-box">

		<?php

			include("config.php");
			if(isset($_POST['submit'])){
				$username = $_POST['username'];
				$email = $_POST['email'];
				$age = $_POST['age'];
				$password = $_POST['password'];
				
			$veri_query= mysqli_query($con,"SELECT Username From user2 WHERE Username='$username'");
			$verify_query =  mysqli_query($con,"select Email from user2 Where Email='$email'");
			if(mysqli_num_rows($verify_query)!=0){
				echo "<div class='message'>
					<p>This email has been already used.</p>
				</div><br>";
				echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";
			}
			elseif (mysqli_num_rows($veri_query)!=0){
				echo "<div class='message'>
					<p>This username is unavailable.</p>
				</div><br>";
				echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";
			}
			else{
				mysqli_query($con,"Insert into user2(Username,Email,Age,Password) values('$username','$email','$age','$password')") or die("Error occured");
				echo "<div class='msg'>
					<p>registration successfull!</p>
				</div><br>";
				$quer = "SELECT * FROM user2 where Id=''";
				$query1 = "INSERT into profile (`user_id`,`private`) value ()";
				echo "<a href='index.php'><button class='btn'>Login now</button>";

			}
			}


		?>
			<header> Sign Up</header>
			<form action="" method="post" onsubmit="return validatePassword();">
				<div class="field input">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" autocomplete="off" required>
				</div>
				<div class="field input">
				<label for="age">Age</label>
				<input type="number" id="age" name="age" autocomplete="off" required>
				</div>
					<div class="field input">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" autocomplete="off"required>
				</div>
				<div class = "field">
					<input type="submit" name="submit"  class="btn" value="register"  required>
				</div>
				<div class="links">
					Already have an account? <a href="index.php">Login</a>
				</div>
			</form>


		</div>
		
	</div>
	    <script>
        function validatePassword() {
            const password = document.getElementById("password").value;

         
            const uppercaseRegex = /[A-Z]/;
            const numberRegex = /\d/;
            const specialCharRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;

   
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            if (!uppercaseRegex.test(password)) {
                alert("Password must contain at least one uppercase letter.");
                return false;
            }

            if (!numberRegex.test(password)) {
                alert("Password must contain at least one number.");
                return false;
            }

            if (!specialCharRegex.test(password)) {
                alert("Password must contain at least one special character.");
                return false;
            }

         
            return true;
        }
    </script>
		</body>
			</html>