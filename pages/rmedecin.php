

<?php
    require_once('connexiondb.php');
?>

<link rel="stylesheet" href="../Css/stylespatient.css">

<?php include("menu.php");?>






 <!-- Afficher liste des medecins -->

 </div>
    <form action="rmedecin.php" method="POST" class="select">
            <label for="search">La Liste Des Medecins</label> </br>
        </div>
        <select name="search" id="select" >
            <option value="none">Medecin</option>
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
        <button type="submit" class="fas fa-search">lister</button>
              <table class="table">
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

                                    if(isset($_POST['search']))
                                    {
                                        $searchitems = $_POST['search'];
                                        $query = "SELECT * FROM medecin WHERE CONCAT(specialite) LIKE '%$searchitems%' ";
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