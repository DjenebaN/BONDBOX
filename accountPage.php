<?php
    include 'raccourci/header.php';
    include 'navbar.php';


    echo "<div id='detailCompte'>";
    echo "<div id='intituléCompte'><h2>Bienvenue ".$_SESSION['user']['pseudo']."</h2>";
    echo "<button><a href='logout.php'>Se deconnecter<br><i class='fas fa-times'></i></a></button></div>";
    echo "<div id='infoCompte'>";
    echo "<p>Prenom: ".$_SESSION['user']['prenom']."</p>";
    echo "<p>Nom: ".$_SESSION['user']['nom']."</p>";
    echo "<p>Age: ".$_SESSION['user']['age']."</p>";
    echo "</div>";
    echo "</div>";

    
?>



</body>
</html>