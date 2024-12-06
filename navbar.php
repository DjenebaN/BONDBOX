<div id="navbar">
    <div id="logo">
        <img src="image/logo_sans_bg.png" alt="logo" height="100"> <!-- temporaire -->
        <h2 class ='lienFeed'><a href="index.php">BondBox</a></h2>
    </div>
    <ul>
        <?php
        if (isset($_SESSION['user'])) {
            echo "<li><a href='favoris.php'>Favoris</a></li>";
            echo "<li><a href='poster.php'>Poster</a></li>";
            echo "<li><a href='contact.php'>Contact</a></li>";
        }else{
            echo "<li><a href='inscription.php'>Compte</a></li>";
            echo "<li><a href='contact.php'>Contact</a></li>";
            echo "<li><a href='inscription.php'>Poster</a></li>";
        }
        ?>
    </ul>
    <?php
        if (isset($_SESSION['user'])) {
            echo "<div id='affichageCompte'>";
            echo "<h2><a href='compte.php'>".$_SESSION['user']['pseudo']."</a></h2>";
            if (empty($_SESSION['user']['avatar'])) {
                echo "<img src='https://api.dicebear.com/8.x/bottts/png' alt='avatar'>";
            }else{
                echo "<img src='data:image/jpeg;base64,".base64_encode($_SESSION['user']['avatar'])."'>";
            }
            echo "</div>";
        }else{
            echo "<button id='connection'><a href='inscription.php'>Se Connecter</a></button>";
        }
    ?>
</div>