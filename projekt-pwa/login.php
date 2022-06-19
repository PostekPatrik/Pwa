<!DOCTYPE html>
<html lang="hr">

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
		<div class="container">
        <h1 class="forma-naslov">Prijava</h1>
        <p class="molim">Molim Vas ispunite kako biste se prijavili.</p>


    
        <form method="post" class="login">
            <div class="form-group">
                <label>Korisničko ime</label>
                <input type="text" name="username">
                <span class="invalid-feedback"></span>
            </div>    
            <div class="form-group">
                <label>Lozinka</label>
                <input type="password" class="druga" name="password">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="loggumb" name="login" value="Login">
            </div>
            <p>Nemate račun? <a href="register.php" class="link">Prijavite se ovdje.</a></p>
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

<?php

require_once "connect.php";
 
if(isset($_POST['login'])) {
 
    $ime = $_POST['username'];
    $pass = $_POST['password'];
    
    $query = "SELECT * FROM users";
    
    $result = mysqli_query($dbc, $query);
    
    $flag = false;
    
    while($row = mysqli_fetch_array($result)) {
        if($ime == $row['username'] && password_verify($pass, $row['password'])) {
            $_SESSION['ime'] = $row['username'];
            $_SESSION['level'] = $row['level'];

            echo $_SESSION['ime'];
            echo $_SESSION['level'];

            header("Refresh:0");
            $flag = true;
            break;
        }
    }
    if($flag == false) {
        echo "<div class='poruka'>Krivo korisničko ime ili lozinka</div>";
    }

    mysqli_close($dbc);
}
?>