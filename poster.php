<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <title>BondBox</title>
    <link rel="stylesheet" href="css/style2.css" />
    </head>
<body>
    <div id="boxPost">
        <h3>Publier</h3>
        <form id="posting" method="POST" action="#" enctype="multipart/form-data">
            <img src="<?php echo $img;?>" id="previewImg"/>
            <textarea id='descInput' name="postTT" placeholder="Titre" rows="2" cols="87"></textarea>
            <input id = 'publishBttn' type="file" name="myfile" accept="image/*" onchange="preview(this)"/>
            <div id="preview"></div>
            <textarea id='descInput' id="desc" name="desc" placeholder="Description" rows="10" cols="95"></textarea>
            <input id='publishBttn' type="submit" name="publish" value="Publier">
        </form>
    </div>

    <?php
    include("./connexion.php");
    
    if(isset($_POST["publish"])) {
        if(empty($_POST["postTT"]) || empty($_POST["desc"])) {
            echo "<p style='color:red'>Tous les champs sont obligatoires!</p>";
        } else {
            $titre = $_POST["postTT"];
            $description = $_POST["desc"];
    
            if(isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == 0) {
                $file_name = $_FILES["myfile"]["name"];
                $file_tmp = $_FILES["myfile"]["tmp_name"];
                $file_dest = "uploads/" . $file_name;
    
                if(move_uploaded_file($file_tmp, $file_dest)) {
                    try {
                        $stmt = $connexion->prepare("INSERT INTO `post` (`titre`, `img`, `description`) 
                                                    VALUES (:titre, :img, :description)");
                        $stmt->execute(array("titre"=> $_POST["postTT"],
                                            "img" => $file_dest,
                                            "description"=> $_POST["desc"],)); 
                        echo "<p style='color:green'>Message envoyé!</p>";
                    } catch(PDOException $e) {
                        printf("Erreur lors de l'envoi du message : %s\n", $e->getMessage());
                    }
                } else {
                    echo "<p style='color:red'>Erreur lors de l'upload du fichier!</p>";
                }
            } else {
                echo "<p style='color:red'>Veuillez sélectionner un fichier!</p>";
            }
        }
    }
    ?>

    </div>

    <script src="jvs/script.js"></script>
</body>
</html>