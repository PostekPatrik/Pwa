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
			<!-- Forma -->
			<form action="unos.php" enctype="multipart/form-data" method="post">
				<div class="form-item">
					<span id="porukaTitle" class="bojaPoruke"></span>
					<label for="naslov">Ime pedale</label>
					<div class="form-field">
						<input type="text" name="title" id="title" class="form-field-textual">
					</div>
				</div>
				<div class="form-item">
					<span id="porukaAbout" class="bojaPoruke"></span>
					<label for="about">Kraki sadržaj proizvoda</label>
					<div class="form-item">
						<textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
					</div>
				</div>
				<div class="form-item">
					<span id="porukaContent" class="bojaPoruke"></span>
					<label for="content">Specifikacije</label>
					<div class="form-field">
						<textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
					</div>
				</div>
				<div class="form-item">
					<span id="porukaSlika" class="bojaPoruke"></span>
					<label for="pphoto">Specifikacije</label>
					<div class="form-field">
					<label class="btnfile btn">Odaberite sliku
                            <input type="file" class="posebno" name="pphoto" id="pphoto"></label> 
					</div>
				</div>
				<div class="form-item">
					<span id="porukaKategorija" class="bojaPoruke"></span>
					<label for="category"></label>
					<div class="form-field">
						<select name="category" id="category" class="form-field">
							<option value="novo">Novo</option>
							<option value="rabljeno">Rabljeno</option>
						</select>
					</div>
				</div>
				<div class="form-item">
					<label>Spremiti u arhivu:
						<div class="form-field">
							<input type="checkbox" name="archive" id="archive">
						</div>
					</label>
				</div>
				<div class="form-item">
					<button type="submit" class="btnfile btn" value="Prihvati" id="submit" name="submit">Prihvati</button>
					<button type="reset" class="btnfile btn" value="Poništi">Poništi</button>
				</div>
			</form>
		</div>

		<?php

		include 'connect.php';
		if(isset($_POST['submit'])) {
		$datum = date("Y-m-d");
		$naslov = $_POST['title'];
		$sazetak = $_POST['about'];
		$tekst = $_POST['content'];
		$slika = $_FILES['pphoto']['name'];
		$naslov = str_replace("'", "''", $naslov);
		$sazetak = str_replace("'", "''", $sazetak);
		$tekst = str_replace("'", "''", $tekst);
		$kategorija = $_POST['category'];

		if (isset($_POST['archive'])) {
			$arhiva = 1;
		} else {
			$arhiva = 0;
		}

		if($naslov > 20 || $naslov == 0) {
			echo "<div>NASLOV NE SMIJE BITI PRAZAN I NE SMIJE BITI VEĆI OD 20 ZNAKOVA</div>";
		}

		if($sazetak < 40 || $sazetak > 1500) {
			echo "<div>SAZETAK NE SMIJE BITI MANJI OD 40 ZNAKOVA I NE SMIJE BITI VEĆI OD 1500 ZNAKOVA</div>";
		}

		if($tekst < 40 || $tekst > 1500) {
			echo "<div>TEKST NE SMIJE BITI MANJI OD 40 ZNAKOVA I NE SMIJE BITI VEĆI OD 1500 ZNAKOVA</div>";
		}

		$dir = 'img/' . $slika;
		move_uploaded_file($_FILES['pphoto']['tmp_name'], $dir);

		$sql = "INSERT INTO main (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
		values ('$datum', '$naslov', '$sazetak', '$tekst', '$slika', '$kategorija', '$arhiva')";

		$result = mysqli_query($dbc, $sql) or die('Error querying database');
		mysqli_close($dbc);
	}
		?>
		</div>
	</main>
	<footer class="smece">
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