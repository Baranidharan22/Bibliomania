<?php
session_start();
?>

<!doctype html>
<html>
<head>
	<Title>login</Title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<h1 class="padd" style="text-align: center;padding-top:2px ;padding-left:130px;margin:auto;font-size: 50px;font-family: cursive;">BIBLIOMANIA</h1>

	<div class="container">
		<div class="box form-box">
			<?php
			include("config.php");
			if (isset($_POST['submit'])) {
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$password = mysqli_real_escape_string($con, $_POST['password']);

				$result = mysqli_query($con, "SELECT * FROM user2 WHERE Username='$username'") or die("Select error");
				$row = mysqli_fetch_assoc($result);

				if (is_array($row) && !empty($row)) {
					if ($row['Password'] === $password) {
						$_SESSION['valid'] = $row['Email'];
						$_SESSION['username'] = $row['Username'];
						$_SESSION['age'] = $row['Age'];
						$_SESSION['id'] = $row['Id'];
						$_SESSION['isAdmin'] = $row['isAdmin'];
						header("Location:test.php");
					} else {
						echo "<div class='message'><p>Wrong password</p></div><br>";
					}
				} else {
					echo "<div class='message'><p>Username not found</p></div><br>";
				}
			}
			?>

			<header> LOGIN</header>
			<form action="" method="post">
				<div class="field input">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" autocomplete="off" required>
				</div>
				<div class="field input">
					<label for="password">Password</label>
					<input type="password" id="password" name="password"
					 autocomplete="off" required>
				</div>
				<div class="field">
					<input type="submit" name="submit" class="btn" value="Login" onclick="shelf()" required>
				</div>
				<div class="links">
					Don't have an account? <a href="Register.php">Sign up Now</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
