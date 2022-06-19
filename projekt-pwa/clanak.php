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
			
			$brojcek = $_POST['submit'];
			?>
			<section class="items">
				<?php
				$query = "SELECT * FROM main WHERE id='$brojcek'";
				$result = mysqli_query($dbc, $query);
				while ($row = mysqli_fetch_array($result)) {
					echo '<article class="clanak">';
					echo "<div class='novo'>";
						echo "<h2>";
					    	echo $row['naslov'];
						echo "</h2>";
					echo "</div>";
					echo "<img src='img/" . $row['slika'] . "'>";
					echo '</a>';
					echo "<div class='flex'>";
                    echo '<p class="pojma_nemam">';
                        echo $row['sazetak'];
                    echo '</p>';
					echo "</div>";
                    echo '<h3 id="spec">Specifikacije:</h3>';

					echo "<div class='flex'>";
						echo '<p class="pojma_nemam sivo">';
							echo $row['tekst'];
						echo '</p>';
					echo "</div>";
                    echo '<h3 id="spec">Kategorija:</h3>';
                    echo '<div class="kate">'.$row['kategorija'].'</div>';
					echo "</div>";
					echo "</div>";
					echo "<div class='flex'>";
                    echo '<p id="spec">datum:</p>';
                    echo '<div>'.$row['datum'].'</div>';
					echo "</div>";
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