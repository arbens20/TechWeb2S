<?php 
require_once('pages/connexiondb.php');
// démarrer la session
   session_start() ;
  if(isset($_POST['boutton-valider'])){ 
    if(isset($_POST['user']) && isset($_POST['pswd'])) { //On verifie ici si l'utilisateur a rentré des informations
      
      $user = $_POST['user'] ;
      $pswd = $_POST['pswd'] ;
      $erreur = "" ;
    
        $req = mysqli_query($con , "SELECT * FROM connexion WHERE user = '$user' AND pswd ='$pswd' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:pages/main.php") ;//Si le nombre de ligne est > 0 
            // Nous allons créer une variable de type session qui vas contenir l'user de l'utilisateur
            $_SESSION['user'] = $user ;
        }else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" href="Css/index.css">
</head>
<body>
   <section>
       <h1> Connexion</h1>
       <?php 
       if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
           echo "<p class= 'Erreur'>".$erreur."</p>"  ;
       }
       ?>
       <form action="" method="POST">  <!--on ne mets plus rien au niveau de l'action , pour pouvoir envoyé les données  dans la même page -->
           <label>Adresse Mail</label>
           <input type="text" name="user">
           <label >Mots de Passe</label>
           <input type="password" name="pswd">
           <input type="submit" value="Valider" name="boutton-valider">
       </form>
   </section> 
</body>
</html>