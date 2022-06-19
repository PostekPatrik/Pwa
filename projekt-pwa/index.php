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
					echo "<form action='clanak.php' method='post'>
							<input type='hidden' name='test'>
							<button type='submit' name='submit' value='" . $row['id'] . "'>
							<img src='img/".$row['slika']."'></button>
						</form>";
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
					echo "<form action='clanak.php' method='post'>
							<input type='hidden' name='test'>
							<button type='submit' name='submit' value='" . $row['id'] . "'>
							<img src='img/".$row['slika']."'></button>
						</form>";
					echo '<h4 class="title">';
						echo $row['naslov'];
					echo '</h4>';
					echo '</article>';
				}
				?>
			</section>
		</div>
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