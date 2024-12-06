<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <title>BondBox</title>
    <link rel="stylesheet" href="css/style2.css" />
    </head>
<body>
    <div id="box">
        <form id="inscForm" method="POST" action="#" >
                <h3>Contact</h3>
                <input type="text" name="lastname" placeholder="Nom"/>
                <input type="text" name="firstname" placeholder="Prénom"/>
                <input type="text" name="email" placeholder="Email"/>
                <textarea id="messagebox" name="message" placeholder="Message" rows="10" cols="87"></textarea>
                <input type="submit" name="envoi" value="Envoyer">
            </form> 
            <?php
    include("./connexion.php");

    if(isset($_POST["envoi"])){
            if(empty($_POST["firstname"])
                ||empty($_POST["lastname"])
                ||empty($_POST["email"])
                ||empty($_POST["txt"])){
                echo "<p style='color:red'>Tous les champs sont obligatoires!</p>";
            }else{
                try{
                    $stmt = $connexion->prepare("INSERT INTO `message`
                                                (`firstname`, `lastname`, `email`, `message`)
                                                VALUES (:firstname, :lastname, :email, :message);"); 
                    $stmt->execute(array("firstname"=> $_POST["firstname"],
                                            "lastname"=>$_POST["lastname"],
                                            "email"=>$_POST["email"],
                                            "message"=>$_POST["message"])); 
                }
                catch(PDOException $e){
                    printf("Erreur lors de l'envoi du message : %s\n", $e->getMessage());
                    exit();
                }finally{
                    echo "<p style='color:green'>Message envoyé!</p>";
                }
            }
        }
        ?>
    </div>

</body>
</html>