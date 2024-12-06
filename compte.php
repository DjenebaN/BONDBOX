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
    
    $user_id=($_SESSION['user']['id']);
    $sql="SELECT * from post WHERE id = $user_id";
    if(!$connexion->query($sql)) echo "Pb d'accès au events";
        else{
            echo "<div id='feedlist'>";
            foreach ($connexion->query($sql) as $row){
                echo "<div class = 'feed'>".
                    "<div class='fav'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."'/>".
                    "<div><h2>".$row['titre']."</h2>".
                    "<p>Description ".$row['description']."</p>".
                    "</div></div></div>";
                }
            echo "</div>";
    }
    
?>



</body>
</html>