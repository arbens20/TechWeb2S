<?php
    require_once('connexiondb.php');
     if(isset($_POST['prescription_save'])){
        $id_consultation=$_POST['id_consultation'];
         $prescription=$_POST['prescription'];
         

         $a="select * from prescription where idconsultation='$id_consultation'";
         $resultat=mysqli_query($con,$a);
         $num=mysqli_num_rows($resultat);
         if($num==1){
             echo"Prescription deja enregestrer";
         }else{
             $enr="insert into prescription(idconsultation,prescription) values('$id_consultation','$prescription')" or die('no connect');
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
    <title>Prescriptions</title>
    <!-- <link rel="stylesheet" type="texte/css" href="../css/boot" -->
    <link rel="stylesheet" type ="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../Css/stylespatient.css">
</head>
<body>
    <?php include("menu.php");?>

    <div class="container">
        <form action="prescription.php" method="post">
            <h1>Veuillez entrer les Prescriptions</h1>
            <div class="prescription">
                <label for="id_consultation">ID Consultation</label> </br>
                <input type="text" name="id_consultation" id="" placeholder="ID Consultation" required>
            </div>
            <div class="prescription">
                <label for="prescription">prescription</label> </br>
                <textarea name="prescription" id="" cols="30" rows="10"  placeholder="Prescription" required></textarea>
                
            </div>

            

            <div class="btn">
                <button type="submit" name="prescription_save">Enregistrer</button>
            </div>


        </form>
    </div>

    </div>



    


</body>