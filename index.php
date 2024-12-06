<?php
    include 'raccourci/header.php';
    include 'navbar.php';
    include("raccourci/connexion.php");
?>

<div id="feed">
    <form id="recherche" action="" method="GET">
        <input type="text" name="search">
        <button type="submit" name="cherche"><i class="fas fa-search"></i></button>

        <?php
        
            $sql="SELECT * from categorie";
            echo "<select>";
            echo "<option></option>";
            foreach ($pdo->query($sql) as $result){
                echo "<option>".$result['nom']."</option>";
            }
            echo "</select>"
        ?>
    </form>
    <?php
    $sql = "SELECT * from post";
    if (!$pdo->query($sql)) {
        echo "Pb d'accès au feed";
    } else {
        echo "<div id='feedlist'>";
        foreach ($pdo->query($sql) as $row) {
            echo "<div class='feed'><img src='data:image/jpeg;base64," . base64_encode($row['img']) . "'/>" .
                "<div><h2>" . $row['titre'] . "</h2>" .
                "<p>Description " . $row['description'] . "</p>";
            if (isset($_SESSION['user'])) {
                echo "<a href = 'comment.php'><button class='comment-button'>Commenter</button></a>".
                    "<form method='POST' action='#'onsubmit='Count1(event)'>".
                    "<button id='Like'><img id='likebttn' src='image/heart.png' alt='Like'></button>" .
                    "</form>".

                    "<form method='POST' action='#'onsubmit='Count2(event)'>".
                    "<button id='Fav'><img id='favbttn' src='image/fav.png' alt='Fav'></button>" .
                    "</form>";
            }
            echo "</div>" .
                "</div>";
        }
        echo "</div>";
    }
    ?>
</div>


<div id="followingList">
    <?php
        if (isset($_SESSION['user'])) {
            $user_id=($_SESSION['user']['id']);
            $sql="SELECT * from follow WHERE id_star = $user_id";
            echo "<div id='list'>";
            foreach ($pdo->query($sql) as $row){
                $result=($row['id_follow']);
                $CompteSuivi="SELECT * from user WHERE id = $result";
                $res = $pdo->query($CompteSuivi);
                if ($res->rowCount() > 0) {
                // Sortir les données de chaque ligne
                    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>".$row['pseudo']."</p>";
                    }
                } else {
                    echo "<p>Suis quelqu'un!</p>";
                }
            }
            echo "</div>";
        }else{
            echo "<p>Connect toi</p>";
        }
    ?>
</div>

    
</body>
</html>