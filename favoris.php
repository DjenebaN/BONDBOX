<?php
    include 'raccourci/header.php';
    include 'navbar.php';
    include 'raccourci/connexion.php';

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
    $user_id=($_SESSION['user']['id']);
    $sql="SELECT * from fave WHERE id_user_faved = $user_id";
    echo "<div id='feedlist'>";
    foreach ($pdo->query($sql) as $row){
        $result=($row['id_post_faved']);
        $PostFavoris="SELECT * from post WHERE id = $result";
        $res = $pdo->query($PostFavoris);
        if ($res->rowCount() > 0) {
            // Sortir les données de chaque ligne
            while($row = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class = 'feed'>".
                    "<div class='fav'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."'/>".
                    "<div><h2>".$row['titre']."</h2>".
                    "<p>Description ".$row['description']."</p>".
                    "</div></div></div>";
            }
        } else {
            echo "0 résultats";
        }
    }
    echo "</div>"
?>

</div>

<div id="followingList">
    <?php
        $user_id = $_SESSION['user']['id'];
        $sql = "SELECT * FROM follow WHERE id_star = $user_id";
        foreach ($pdo->query($sql) as $row){
            $followed_id = $row['id_follow'];
            $followed_query = "SELECT * FROM user WHERE id = $followed_id";
            $res = $pdo->query($followed_query);
            if ($res->rowCount() > 0) {
                while($followed_row = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div id='list'>".$followed_row['pseudo']."</div>";
                }
            } else {
                echo "0 résultats";
            }
        }
    ?>
</div>


</body>
</html>