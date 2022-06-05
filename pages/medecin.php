<?php
    require_once('connexiondb.php');

    if(isset($_POST['medecin'])){
         $nom=$_POST['nom'];
         $prenom=$_POST['prenom'];
         $sexe=$_POST['sexe'];
         $telephone=$_POST['telephone'];
         $adresse=$_POST['adresse'];
         $email=$_POST['email'];
         $specialite=$_POST['specialite'];

         $a="select * from medecin where email='$email'";
         $resultat=mysqli_query($con,$a);
         $num=mysqli_num_rows($resultat);
         if($num==1){
             echo"ce medecin est deja enregestrer";
         }else{
             $enr="insert into medecin(nom,prenom,sexe,tel,adresse,email,specialite) values('$nom','$prenom','$sexe','$telephone','$adresse','$email','$specialite')" or die('no connect');
             mysqli_query($con,$enr);
             echo"Enregistrement reussi";
         }
     }

?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des medecins</title>
    <!-- <link rel="stylesheet" type="texte/css" href="../css/boot" -->
    <link rel="stylesheet" type ="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/stylesmedecin.css">
</head>
<body>
    <?php include("menu.php");?>

    <div class="container">
        <form action="medecin.php" method="post">

            <h1>Veuillez rentrer les informations des medecins</h1>
        
            <div class="medecin">
                <label for="nom">Nom</label> </br>
                <input type="text" name="nom" id="" placeholder="Nom du medecin" required>
            </div>

            <div class="medecin">
                <label for="nom">Prenom</label></br>
                <input type="text" name="prenom" id="" placeholder="prenom du medecin" required>
            </div>

            <div class="medecin">
            <label for="sexe">Sexe</label> </br>
                <select name="sexe" id="">
                    <option value="none">Choisisez le sexe</option>
                    <option value="masculin" name="sexe">Masculin</option>
                    <option value="feminin" name="sexe">Feminin</option>
                </select>
                
            </div>


            <div class="medecin">
                <label for="telephone">Telephone</label></br>
                <input type="number" name="telephone" id="" placeholder="telephone du medecin" required>
                
            </div>

            <div class="medecin">
                <label for="adresse">Adresse</label></br>
                <input type="text" name="adresse" id="" placeholder="adresse du medecin" required>
                
            </div>


            <div class="medecin">
                <label for="email">Email</label></br>
                <input type="email" name="email" id="" placeholder="email du medecin" required>
                
            </div>

            <div class="medecin">
                <label for="specialite">Specialite</label> </br>
                <select name="specialite" id="">
                <option value="none">Choisisez votre specialisation</option>
                <option value="pediatre" name="specialite">Pediatre</option>
                <option value="interniste" name="specialite">Interniste</option>
                <option value="chirugien" name="specialite">Chirugien</option>
                <option value="gynecologue" name="specialite">Gynecologue</option>
                <option value="dentiste" name="specialite">Dentiste</option>
                <option value="therapeutre" name="specialite">Therapeutre</option>
                <option value="orthodontiste" name="specialite">Orthodontiste</option>
                <option value="urologue" name="specialite">Urologue</option>
                <option value="dermatologue" name="specialite">Dermatologue</option>
                <option value="neurologue" name="specialite">Neurologue</option>
                </select>
            </div>

            <div class="btn">
                <button type="submit" name="medecin">Enregistrer</button>
            </div>
            </br>

        </form>
    </div>

    </div>

  