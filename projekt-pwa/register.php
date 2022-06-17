<?php
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($dbc, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) != 0){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($dbc, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($dbc);

}
?>

<script>
document.getElementById("submit").addEventListener("click", function(e){

	var length

  e.preventDefault()
});

</script>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Projekt</title>
	<link rel="stylesheet" href="style.css">
	<!-- google-fonts naslov -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Caesar+Dressing&family=Noto+Sans:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>

<body>
	<h1 class="logo">Pedale</h1>
	<header>
		<div>
			<nav class="centar">
				<ul>
					<li class="shrink"><a href="index.php">Početna</a></li>
					<li class="shrink"><a href="unos.html">Unos</a></li>
					<li class="shrink"><a href="login.php">Prijava</a></li>
					<li class="shrink"><a href="register.php">Registracija</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
		<div class="container">
			
			<div class="wrapper">
				<h1>Sign Up</h1>
				<p>Molim Vas ispunite kako bi napravili račun.</p>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="form-group">
						<label>Korisničko ime</label> 
						<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'style:"border:thick solid red";' : ''; ?>" value="<?php echo $username; ?>">
						<span class="invalid-feedback"><?php echo $username_err; ?></span>
					</div>    
					<div class="form-group">
						<label>Lozinka</label>
						<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'style:"border:thick solid red";' : ''; ?>" value="<?php echo $password; ?>">
						<span class="invalid-feedback"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group">
						<label>Ponovljena lozinka</label>
						<input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'style:"border:thick solid red";' : ''; ?>" value="<?php echo $confirm_password; ?>">
						<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Pošalji">
						<input type="reset" class="btn btn-secondary ml-2" value="Resetiraj">
					</div>
					<p>Već imate račun<a href="login.php">Prijavite se ovdje</a>.</p>
				</form>
			</div>  
	</main>
	<footer>
		<div class="wave">
			<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
				<path d="M1200 120L0 40 0 0 1200 0 1200 200z" class="shape-fill"></path>
			</svg>
		</div>
		<div class="foot">
			<div class="prvi">Patrik Poštek &copy; 2022</div>
			<div class="drugi">Programiranje Web Aplikacija</div>
		</div>
	</footer>
</body>
</html>