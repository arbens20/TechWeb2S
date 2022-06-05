

<?php
    require_once('connexiondb.php');
?>

<link rel="stylesheet" href="../Css/stylespatient.css">

<?php include("menu.php");?>






 <!-- Afficher liste des consultations -->

 </div>
    <form action="rconsultation.php" method="POST" class="select">
            <label for="search">La Liste Des consultations</label> </br>
        </div>
        <input type="search" name="search" placeholder="Rechercher">
        <button type="submit" class="fas fa-search">Rechercher</button>
              <table class="table">
                <thead>
                  <tr>
                  <th id="th">id Medecin</th>
                    <th id="th">Code Patient</th>
                    <th id="th">Poids</th>
                    <th id="th">Hauteur</th>
                    <th id="th">Diagnostique</th>
                    <th id="th">Date consultation</th>
                    
                    
                   
                  </tr>
                </thead>
                <tbody id="tbody">
                <?php 
                                    $con = mysqli_connect("localhost","root","","syn_med");

                                    if(isset($_POST['search']))
                                    {
                                        $searchitems = $_POST['search'];
                                        $query = "SELECT * FROM consultation WHERE CONCAT(codepatient) LIKE '%$searchitems%' ";
                                        $query_run = mysqli_query($con, $query);
                                        
                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td id="td"><?= $items['idmedecin']; ?></td>
                                                    <td id="td"><?= $items['codepatient']; ?></td>
                                                    <td id="td"><?= $items['poids']; ?></td>
                                                    <td id="td"><?= $items['hauteur']; ?></td>
                                                    <td id="td"><?= $items['diagnostique']; ?></td>
                                                    <td id="td"><?= $items['date_consultation']; ?></td>
                                                    
                                                    
                                                    
                                                    
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