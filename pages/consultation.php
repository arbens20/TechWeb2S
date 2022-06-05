<?php
    require_once('connexiondb.php');
     if(isset($_POST['consultation'])){
         $id_medecin=$_POST['id_medecin'];
         $code_patient=$_POST['code_patient'];
         $poids=$_POST['poids'];
         $hauteur=$_POST['hauteur'];
         $diagnostique=$_POST['diagnostique'];
         $date_consultation=$_POST['date_consultation'];
         

         $a="select * from consultation where codepatient='$code_patient'";
         $resultat=mysqli_query($con,$a);
         $num=mysqli_num_rows($resultat);
         if($num==1){
             echo"consultation deja enregestrer";
         }else{
             $enr="insert into consultation(idmedecin,codepatient,poids,hauteur,diagnostique,date_consultation) values('$id_medecin','$code_patient','$poids','$hauteur','$diagnostique','$date_consultation')" or die('no connect');
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
    <title>Dossier des consultations</title>
    <!-- <link rel="stylesheet" type="texte/css" href="../css/boot" -->
    <link rel="stylesheet" type ="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/stylesconsultation.css">
</head>
<body>
    <?php include("menu.php");?>

    <div class="container">
        <form action="consultation.php" method="post">
            <h1>Fiche de Consultation</h1>
            <div class="consultation">
                <label for="id_medecin">ID Medecin</label> </br>
                <input type="text" name="id_medecin" id="" placeholder="id_medecin" required>
            </div>
            <div class="consultation">
                <label for="code_patient">Code Patient</label> </br>
                <input type="text" name="code_patient" id="" placeholder="code_patient" required>
            </div>

            <div class="consultation">
                <label for="poids">Poids</label> </br>
                <input type="text" name="poids" id="" placeholder="prenom du consultation" required>
            </div>

            


            <div class="consultation">
                <label for="hauteur">Hauteur</label> </br>
                <input type="number" name="hauteur" id="" placeholder="hauteur" required>
                
            </div>

            <div class="consultation">
                <label for="diagnostique">Diagnostique</label> </br>
                <textarea name="diagnostique" id="" cols="70" rows="10"  placeholder="diagnostique" required></textarea>                
            </div>


            <div class="consultation">
                <label for="date_consultation">Date de consultation</label> </br>
                <input type="date" name="date_consultation" id="" placeholder="date consultation" required>
                
            </div>

            <div class="btn">
                <button type="submit" name="consultation">Enregistrer</button>
            </div>


        </form>
    </div>

    </div>