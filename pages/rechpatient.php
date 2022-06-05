<?php include("menu.php");?>

<link rel="stylesheet" href="../Css/stylespatient.css">
 
 
 <form action="rechpatient.php" method="POST" class="selectmed" >
            <label for="search">La Liste Des Patients</label> </br>
        </div>
        <input type="search" name="search" placeholder="Rechercher">
        <button type="submit" class="fas fa-search">Rechercher</button>
              <table class="table">
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
                    
                </tbody>
              </table>