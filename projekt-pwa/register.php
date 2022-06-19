<!-- *******************     ZA REGISTRACIJU KO admin, username = admin i password = admin123 ********************************* -->
<!-- *******************     ZA REGISTRACIJU KO admin, username = admin i password = admin123 ********************************* -->
<!-- *******************     ZA REGISTRACIJU KO admin, username = admin i password = admin123 ********************************* -->
<!-- *******************     ZA REGISTRACIJU KO admin, username = admin i password = admin123 ********************************* -->

<?php
require_once "connect.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Molim Vas unesite korisničko ime.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Korisničko ime može sadržavati samo slova, brojeve i donje crte.";
        
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($dbc, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) != 0){
                    $username_err = "Ovo korisničko ime je već uzeto.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Uups! Nešto je pošlo po zlu. Molim Vas probajte ponovo.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Molim Vas unesite lozinku.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Lozinka treba sadržavati najmanje 6 znakova.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Molim Vas potvrdite lozinku.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Lozinka se ne podudara.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($dbc, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Uups! Nešto je pošlo po zlu. Molim Vas probajte ponovo.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($dbc);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Projekt</title>
	<link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon_io/favicon.ico">

	<!-- google-fonts naslov -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Caesar+Dressing&family=Noto+Sans:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>

<body>
	<h1 class="logo">Pedale</h1>

    <?php require_once "header.php" ?>

	<main>
		<div class="container visina">
        <div class="wrapper">
            <h1 class="forma-naslov">Registracija</h1>
            <p class="molim">Molim Vas ispunite kako bi napravili račun.</p>
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
                    <input type="submit" class="btn btn-primary" value="Registriraj se">
                    <input type="reset" class="btn btn-secondary ml-2" value="Resetiraj">
                </div>
                <p>Već imate račun<a href="login.php" class="link">Prijavite se ovdje</a></p>
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