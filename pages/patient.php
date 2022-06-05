<?php
    require_once('connexiondb.php');
     if(isset($_POST['patient'])){
        $code=$_POST['code'];
         $nom=$_POST['nom'];
         $prenom=$_POST['prenom'];
         $sexe=$_POST['sexe'];
         $telephone=$_POST['telephone'];
         $adresse=$_POST['adresse'];
         $date=$_POST['date'];

         $a="select * from dossier_patient where code='$code'";
         $resultat=mysqli_query($con,$a);
         $num=mysqli_num_rows($resultat);
         if($num==1){
             echo"ce patient est deja enregestrer";
         }else{
             $enr="insert into dossier_patient(code,nom,prenom,sexe,tel,adresse,date_enregistrement) values('$code','$nom','$prenom','$sexe','$telephone','$adresse','$date')" or die('no connect');
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
    <title>Dossier des patients</title>
    <!-- <link rel="stylesheet" type="texte/css" href="../css/boot" -->
    <link rel="stylesheet" type ="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/stylespatient.css">
</head>
<body>
    <?php include("menu.php");?>

    <div class="container">
        <form action="patient.php" method="post">
            <h1>Veuillez entrer les informations du patients</h1>
            <div class="patient">
                <label for="code">Code</label> </br>
                <input type="text" name="code" id="" placeholder="Code du patient" required>
            </div>
            <div class="patient">
                <label for="nom">Nom</label> </br>
                <input type="text" name="nom" id="" placeholder="Nom du patient" required>
            </div>

            <div class="patient">
                <label for="prenom">Prenom</label> </br>
                <input type="text" name="prenom" id="" placeholder="prenom du patient" required>
            </div>

            <div class="patient">
            <label for="sexe">Sexe</label> </br>
                <select name="sexe" id="">
                    <option value="none">Choisisez le sexe</option>
                    <option value="masculin" name="sexe">Masculin</option>
                    <option value="feminin" name="sexe">Feminin</option>
                </select>
            </div>


            <div class="patient">
                <label for="telephone">Telephone</label> </br>
                <input type="number" name="telephone" id="" placeholder="telephone du patient" required>
                
            </div>

            <div class="patient">
                <label for="adresse">Adresse</label> </br>
                <input type="text" name="adresse" id="" placeholder="adresse du patient" required>
                
            </div>


            <div class="patient">
                <label for="date">Date</label> </br>
                <input type="date" name="date" id="" placeholder="adresse du patient" required>
                
            </div>

            <div class="btn">
                <button type="submit" name="patient">Enregistrer</button>
            </div>


        </form>
    </div>

    </div>

    

    


</body>