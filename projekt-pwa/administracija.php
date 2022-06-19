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
        <div class="container visina2">

            <?php
            include 'connect.php';

            echo "<form method='post' class='ispis'>";
            echo "<select name='idiot' id='idiot'>";

            $query = "SELECT * FROM main";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {

                echo "<option value='" . $row['naslov'] . "'>" . $row['naslov'] . "</option>";
            }
            echo "</select><button type='submit' class='btn' name='odaberi' value='odaberi'>ispisi</button></form>";

            if (isset($_POST['odaberi'])) {
                $idiot = $_POST['idiot'];
                $query = "SELECT * FROM main WHERE naslov = '$idiot'";
                $result = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($result);
                
                /* brisanje */
                if (isset($_POST['obrisi'])) {
                    $idiot = $_POST['idiot'];
                    $query = "DELETE FROM main WHERE naslov='$idiot'";
                    $result = mysqli_query($dbc, $query);
                    header("Refresh:0");
                }
                /* update */
                if (isset($_POST['update'])) {
                    $naslov = $_POST['naslov'];
                    $sazetak = $_POST['sazetak'];
                    $tekst = $_POST['tekst'];
                    $slika = $_FILES['slika']['name'];
                    $naslov = str_replace("'", "''", $naslov);
                    $sazetak = str_replace("'", "''", $sazetak);
                    $tekst = str_replace("'", "''", $tekst);
                    $kategorija = $_POST['kategorija'];
                    if (isset($_POST['arhiva'])) {
                        $arhiva = 1;
                    } else {
                        $arhiva = 0;
                    }
                    $target_dir = 'img/' . $slika;
                    move_uploaded_file($_FILES["arhiva"]["tmp_name"], $target_dir);

                    $query = "UPDATE main SET naslov='$naslov', sazetak='$sazetak', tekst='$tekst', slika='$slika', kategorija='$kategorija', arhiva='$arhiva' WHERE naslov='$idiot' ";
                    $result = mysqli_query($dbc, $query);
                }
                echo "
                    
                    <form class='adm' method='post' enctype=mutipart/form-data>
                        <h4>naslov</h4> 
                            <input type='text' mame='naslov' value='" . $row['naslov'] . "'> 
                        <h4>sažetak</h4> 
                            <textarea name='sazetak' cols='30' rows='6' type='text'>'" . $row['sazetak'] . "'</textarea>
                        <h4>tekst</h4>
                            <textarea name='tekst' cols='30' rows='10' type='text'>'" . $row['tekst'] . "'</textarea>
                        <h4>slika</h4>
                        <label class='btnfile btn'>Odaberite sliku
                            <input type='file' class='posebno' name='slika' value='" . $row['slika'] . "'></label> 
                        <h4>kategorija</h4>
                            <select  name='kategorija' value='" . $row['kategorija'] . "' >
                                <option value='novo'>novo</option>
                                <option value='staro'>staro</option>

                            </select>
                        <label>Arhiva ";
                if ($row['arhiva'] == 0) {
                    echo '<input type="checkbox" name="arhiva"> Arhiviraj? ';
                } else {
                    echo '<input type="checkbox" name="arhiva" checked> Arhiviraj? ';
                }
                echo "</label>";
                echo "<button type='submit' class='btn' name='update' value='update'>Update</button>";
                echo "<button type='submit' class='btn drugi' name='obrisi' value='obrisi'>Obriši</button>"; 
                echo "<button type='reset' class='btn' name='reset' value='reset'>Resetiraj</button>";

                echo "</form>";
                
            }
            ?>
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