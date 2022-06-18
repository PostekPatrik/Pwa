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
            <div class="element">
            <?php

            include 'connect.php';

            $query = "SELECT * FROM main";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {

            echo '<form enctype="multiple/>form-data" method="post">
            <div class="form-item">
                <label for="title">Naziv pedale:</label>
            <div class="form-field">
                <input type="text" name="title" class="form-field-textual" value="' . $row['naslov'] . '">
            </div>
            </div>
            <div class="form-item">
                <label for="about">Kratki opis (do 50 znakova):</label>
            <div class="form-field">
                <textarea name="about" cols="30" rows="10" class="form-field-textual">' . $row['sazetak'] . '</textarea>
            </div>
            </div>
            <div class="form-item">
                <label for="content">Specifikacije:</label>
            <div class="form-field">
                <textarea name="content" cols="30" rows="10" class="form-field-textual">' . $row['tekst'] . '</textarea>
            </div>
            </div>
            <div class="form-item">
                <label for="pphoto">Slika:</label>
            <div class="form-field">
                <input type="file" class="input-text" id="pphoto" value="' . $row['slika'] . '" name="pphoto" /> <br>
                <img  src="img/' . $row['slika'] . '" width=100px>s
            </div>
            </div>

            <div class="form-field">
                <label for="category">Kategorija:</label>
            <div class="form-field">
                <select name="category" class="form-field-textual" value="' . $row['kategorija'] . '">
                    <option value="novo">novo</option>
                    <option value="rabljeno">rabljeno</option>
                </select>
            </div>
            </div>
            <div class="form-item"> 
                <label>Spremiti u arhivu:
            <div class="form-field">';
                if ($row['arhiva'] == 0) {
                    echo '<input type="checkbox" name="archive" id="archive" />Arhiviraj?';
                } else {
                    echo '<input type="checkbox" name="archive" id="archive" checked/>Arhiviraj?';
                }
                echo '</div>
            </label>
            </div>
            </div>
            <div class="form-item">
                <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" value="Prihvati" name="update">Izmjeni</button>
                <button type="submit" value="Izbriši" name="delete">Izbriši</button>
            </div>
            </form>';
            }

            /* brisanje */
            if (isset($_POST['delete'])) {
                $id = $_POST['id'];
                $query = "DELETE FROM main WHERE id=$id";
                $result = mysqli_query($dbc, $query);
            }

            /* update */
            if (isset($_POST['update'])) {
                $naslov = $_POST['title'];
                $about = $_POST['about'];
                $content = $_POST['content'];
                $slika = $_FILES['pphoto']['name'];
                $naslov = str_replace("'", "''", $naslov);
                $about = str_replace("'", "''", $about);
                $content = str_replace("'", "''", $content);
                $kategorija = $_POST['category'];
                if (isset($_POST['archive'])) {
                    $archive = 1;
                } else {
                    $archive = 0;
                }
                $target_dir = 'img/' . $slika;
                move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

                $id = $_POST['id'];
                $query = "UPDATE main SET naslov='$naslov', sazetak='$about', tekst='$content', slika='$slika', kategorija='$kategorija', arhiva='$archive' WHERE id='$id' ";
                $result = mysqli_query($dbc, $query);
            }
            ?>
            </div>
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