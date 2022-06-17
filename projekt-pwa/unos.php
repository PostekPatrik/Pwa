
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
					<li class="shrink"><a href="login.html">Prijava</a></li>
					<li class="shrink"><a href="register.html">Registracija</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
		<div class="centar">
		<?php 

		include 'connect.php';

		$datum = date("Y-m-d");
		$naslov = $_POST['title'];
		$about = $_POST['about'];
		$content = $_POST['content'];
		$slika = $_FILES['pphoto']['name'];
		$naslov = str_replace("'", "''", $naslov);
		$about = str_replace("'", "''", $about);
		$content = str_replace("'", "''", $content);
		$kategorija = $_POST['category'];

		if(isset($_POST['archive'])) {
			$arhiva = 1;
		} else {
			$arhiva = 0;
		}

		$dir = 'img/'.$slika;
		move_uploaded_file($_FILES['pphoto']['tmp_name'], $dir);

		$sql="INSERT INTO main (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
		values ('$datum', '$naslov', '$about', '$content', '$slika', '$kategorija', '$arhiva')";

		$result = mysqli_query($dbc, $sql) or die('Error querying database');
		mysqli_close($dbc);


		echo '<article>';
			echo "<div class='image'>";
			echo "<img src='img/" . $slika . "' style='width:300px;'>";
			echo "</div>";
			echo '<h4 class="title">';
			echo $naslov;
			echo '</a></h4>';
		echo '</article>';

		?>
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

    