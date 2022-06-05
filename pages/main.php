<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <title>Admin</title>
</head>

<body> 




    <div class="onglets">

    <div class="brand-name">
            <h1 class="logo"><a href="#">SYNTAX MED</a></h1>

        </div>
            <ul class="dropmenu">
                
                <li class="link"> <a href="">Patient</a>
                <ul class="sub">
                    <li> <a href="patient.php">Ajouter</a></li>
                    <li> <a href="rpatient.php">Rechercher</a></li>
                </ul>
                </li>
                <li class="link"> <a href="">Medecin</a>
                    <ul class="sub">
                        <li> <a href="medecin.php">Ajouter</a></li>
                        <li> <a href="rmedecin.php">Rechercher</a></li>
                    </ul>
                </li>
                <li class="link"> <a href="">Consultations</a>
                    <ul class="sub">
                        <li> <a href="Consultation.php">Ajouter</a></li>
                        <li> <a href="rconsultation.php">Rechercher</a></li>
                    </ul>
                </li>
                <li class="link"> <a href="prescription.php">Prescriptions</a></li>
                
                
            </ul>
        </div>
    
        </div>
    </div>

    <div class="container">
        <div class="header">
            <div class="nav">
            <div class="search">
                <form action="rechpatient.php" method="post">
                <div class="pst"><input type="search" name="search" placeholder="Le nom a rechercher" class="">
                <button type="submit">Rechercher</button></div>
                
                </div>

                <?php 
                                    $con = mysqli_connect("localhost","root","","syn_med");

                                    if(isset($_POST['search']))
                                    {
                                        $searchitems = $_POST['search'];
                                        $query = "SELECT * FROM dossier_patient WHERE CONCAT(nom) LIKE '%$searchitems%' ";
                                        $query_run = mysqli_query($con, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                            <tr>
                                                     <td id="td"><?= $items['code']; ?></td>
                                                    <td id="td"><?= $items['nom']; ?></td>
                                                    <td id="td"><?= $items['prenom']; ?></td>
                                                    <td id="td"><?= $items['sexe']; ?></td>
                                                    <td id="td"><?= $items['tel']; ?></td>
                                                    <td id="td"><?= $items['adresse']; ?></td>
                                                    
                                                    
                                                    
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>

                
                <div class="user">
                    <a href="patient.php" class="btn"> Nouveau Patient </a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">


                <div class="card">
                    <div class="box">

                    <!-- Afficher nbre medecins -->
                    <?php
                        require_once('connexiondb.php');
                        $sql = "SELECT * FROM medecin";
                        if ($result=mysqli_query($con,$sql)) {
                            $rowcountmedecin=mysqli_num_rows($result);
                                     
}
?>
                        <h1><?php  echo $rowcountmedecin; ?></h1>
                        <p><a href="medecin.php">Add Medecins</a></p>
                        <p><a href="rmedecin.php">Search Medecins</a></p>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>

                    <!-- Afficher nbre patient -->

                    <?php
                        require_once('connexiondb.php');
                        $sql = "SELECT * FROM dossier_patient" ;
                        if ($result=mysqli_query($con,$sql)) {
                            $rowcountpatient=mysqli_num_rows($result);
                                     
}
?>


                <div class="card">
                    <div class="box">
                        <h1><h1><?php  echo $rowcountpatient; ?></h1></h1>
                        <p><a href="patient.php">Add Patient</a></p>
                        <p><a href="rpatient.php">Search Patient</a></p>
                    </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>


                <div class="card">
                    <div class="box">
                        <!-- Afficher nbre consultation -->
                    <?php
                        require_once('connexiondb.php');
                        $sql = "SELECT * FROM consultation";
                        if ($result=mysqli_query($con,$sql)) {
                            $rowcountconsultation=mysqli_num_rows($result);
                                     
}
?>
                        <h1><?php  echo $rowcountconsultation; ?></h1>
                        <p><a href="consultation.php">Add Consultations</a></p>
                        <p><a href="rconsultation.php">Search Consultations</a></p>          
                              </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>


                <div class="card">
                    <div class="box">
                        <!-- Afficher nbre prescriptions -->
                    <?php
                        require_once('connexiondb.php');
                        $sql = "SELECT * FROM prescription";
                        if ($result=mysqli_query($con,$sql)) {
                            $rowcountprescription=mysqli_num_rows($result);
                                     
}
?>
                        <h1><?php  echo $rowcountprescription; ?></h1>
                        <p><a href="prescription.php">Add Prescriptions</a></p>
                           
                                   </div>
                    <div class="icon-case">
                        <img src="students.png" alt="">
                    </div>
                </div>
            </div>

            <div class="content-2">


            <!-- Afficher les nouveaux medecins -->
                <div class="nouveau-medecins">
                    <div class="title">
                        <h2>Medecins</h2>
                        <a href="medecin.php" class="btn">ADD</a>
                    </div>
                    <table>
                    <thead>
                  <tr>
                  <th id="th">id</th>
                    <th id="th">Nom</th>
                    <th id="th">Prenom</th>
                    <th id="th">Sexe</th>
                    <th id="th">Telephone</th>
                    <th id="th">Adresse</th>
                    <th id="th">Email</th>
                    <th id="th">Specialite</th>
                    
                   
                  </tr>
                </thead>
                <tbody id="tbody">
                <?php 
                                    $con = mysqli_connect("localhost","root","","syn_med");

                                    {
                                        $query = "SELECT * FROM medecin LIMIT 7";
                                        $query_run = mysqli_query($con, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td id="td"><?= $items['id']; ?></td>
                                                    <td id="td"><?= $items['nom']; ?></td>
                                                    <td id="td"><?= $items['prenom']; ?></td>
                                                    <td id="td"><?= $items['sexe']; ?></td>
                                                    <td id="td"><?= $items['tel']; ?></td>
                                                    <td id="td"><?= $items['adresse']; ?></td>
                                                    <td id="td"><?= $items['email']; ?></td>
                                                    <td id="td"><?= $items['specialite']; ?></td>
                                                    
                                                   
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                    
                </tbody>


                       

                    </table>
                </div>


<!-- Afficher les nouveaux Patients -->

                <div class="recent-add">
                    <div class="title">
                        <h2>Patients</h2>
                        <a href="patient.php" class="btn">ADD</a>
                    </div>
                    <table>
                    <thead>
                  <tr>
                  <th id="th">code</th>
                    <th id="th">Nom</th>
                    <th id="th">Prenom</th>
                    <th id="th">Sexe</th>
                    <th id="th">Telephone</th>
                    <th id="th">Adresse</th>
                    
                    
                   
                  </tr>
                </thead>
                <tbody id="tbody">
                <?php 
                                    $con = mysqli_connect("localhost","root","","syn_med");

                                    
                                    {
                                        
                                        $query = "SELECT * FROM dossier_patient LIMIT 7 ";
                                        $query_run = mysqli_query($con, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                     <td id="td"><?= $items['code']; ?></td>
                                                    <td id="td"><?= $items['nom']; ?></td>
                                                    <td id="td"><?= $items['prenom']; ?></td>
                                                    <td id="td"><?= $items['sexe']; ?></td>
                                                    <td id="td"><?= $items['tel']; ?></td>
                                                    <td id="td"><?= $items['adresse']; ?></td>
                                                    
                                                    
                                                    
                                                    
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                    
                </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div> 

</body>
</html>