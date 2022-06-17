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
			?>
			<div class="novo">
				<h2>NOVO</h2>
			</div>

			<section class="items">

				<?php
				$query = "SELECT * FROM main WHERE arhiva=0 AND kategorija = 'novo' ORDER BY id DESC LIMIT 3";
				$result = mysqli_query($dbc, $query);
				while ($row = mysqli_fetch_array($result)) {
					echo '<article>';

					echo '<a href="clanak.php?id=' . $row['id'] . '">';
					echo "<img src='img/" . $row['slika'] . "'>";
					echo '</a>';
					echo '<h4 class="title">';
					echo $row['naslov'];
					echo '</h4>';
					echo '</article>';
				}
				?>
			</section>

				<div class="rabljeno">
					<h2>RABLJENO</h2>
				</div>
			
			<section class="items">
				<?php

				$query1 = "SELECT * FROM main WHERE arhiva=0 AND kategorija = 'rabljeno' ORDER BY id DESC LIMIT 3";
				$result = mysqli_query($dbc, $query1);
				while ($row = mysqli_fetch_array($result)) {
					echo '<article>';

					echo '<a href="clanak.php?id=' . $row['id'] . '">';
					echo "<img src='img/" . $row['slika'] . "'>";
					echo '</a>';
					echo '<h4 class="title">';
					echo $row['naslov'];
					echo '</h4>';
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