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
			<?php
			include 'connect.php';
			
			$slika = $_POST['submit'];
			?>


			<section class="items">
				<?php
				$query = "SELECT * FROM main WHERE slika='$slika'";
				$result = mysqli_query($dbc, $query);
				while ($row = mysqli_fetch_array($result)) {
					echo '<article>';
					echo "<div class='novo'>";
						echo "<h2>";
					    	echo $row['naslov'];
						echo "</h2>";
					echo "</div>";
					echo "<img src='img/" . $row['slika'] . "'>";
					echo '</a>';
                    echo '<p class="pojma_nemam">';
                        echo $row['tekst'];
                    echo '</p>';
                    echo '<h3 id="spec">Specifikacije:</h3>';
                    echo '<div class="kate">'.$row['kategorija'].'</div>';
					echo '</article>';
				}
				?>
			</section>


	</main>
	<footer class="footer">
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