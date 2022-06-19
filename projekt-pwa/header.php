    <header>
        <?php
            session_start();
        ?>
        <nav class="centar">
            <ul>
                <li class="shrink"><a href="index.php">Početna</a></li>
                <li class="shrink"><a href="login.php">Prijava</a></li>
                <li class="shrink"><a href="register.php">Registracija</a></li>
                <?php 
                    $_SESSION['logged'] = false;
                if(isset($_SESSION['ime']) && $_SESSION['level'] == 1){
                    $_SESSION['logged'] = true;
                    echo '<li class="shrink"><a href="unos.php">Unos</a></li>
                        <li class="shrink"><a href="administracija.php">Admin</a></li>';  
                    
                }

                if(isset($_SESSION['ime']) && $_SESSION['level'] == 0){
                    $_SESSION['logged'] = true;
                }
                
                if($_SESSION['logged'] == true) {
                    echo  "<form action='login.php' method='post' class='gumb'>
                                <button type='submit' name='logout' id='logout'>logout
                                </button>
                           </form>";
                }
                if(isset($_POST['logout'])) {
                    session_unset();
                    session_destroy();
                    header("Refresh:0");
                }
            
                ?>
            </ul>
        </nav>
	</header>