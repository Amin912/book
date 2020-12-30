<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css?version=3" />
        <link rel="stylesheet" href="css/admin.css" />
        <title>MonLivre</title>
        <script src="js/admin.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    </head>
    
    <body>
        <div id="bloc_page">

            <header>
                
                <div id="logoWrap">
                 <div class="menuIcon" onclick="toggle()">
                    <img src="images/menu.png" width="40px">
                </div>

                    <div id="logo" >
                        <a href="#" class="logoClick">
                            <span class="logoTemp">
                                <img src="images/livre_logo.jpg" alt="Logo de livre" />
                                <h1 class="logoText">MonLivre</h1> 
                            </span>
                        </a>
                           
                    </div>
                </div>
               

                <div id="searchWrap">

                    <form action="">
                        <input type="text" class="searchSt" name="input">
                        <button class="submitButton">
                                <img src="images/search.png" width="22">
                                    
                        </button>
                    </form>
                    <button class="advSearch">Avancée</button>
                </div>

                <div class="navRight">
                    
                        
                            <a href="#" >Accueil</a>
                            <a href="signin.html">Connexion</a>
                            <a href="product.html">Acheter</a>
                    
                </div>

                <div class="navIcons">
                    <a href="#" ><img class="loginIcon" src="images/home.png" /></a>
                    <a href="login.html"><img class="loginIcon" src="images/login.png" /></a>
                    <a href="#"><img class="loginIcon" src="images/cart.png" /></a>
                </div>
                
            </header>

           <!--  <div id="menu" class="sideMenu">
                <ul>
                    <a href="#"><li class="menuElem" >Liste des livres</li></a>
                    <a href="#"><li class="menuElem" >liste des utilisat</li></a>   
            </ul>
            </div> -->

            <div class= "choiceForm">
                <form action='' class="form-inline">
                    
                        <select name='choice' type="text" id= "choice" class="form-control form-control-sm" >
                        <option value="">Sélectionner</option>
                        <option value="livres">Aficher la liste des livres</option>
                        <option value="utilisateurs">Afficher la liste des utilisateurs</option>
                    </select>
                    
                        <button id='filter' class="btn btn-sm btn-primary">Recherche</button>
            
                    </form>

            </div>

            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "livres";
            

            $conn= new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            if(isset($_POST["deleteBook"]))
           {
            $conn->query("DELETE FROM livres WHERE id=".$_POST['idBook']);
           }
           if(isset($_POST["deleteUser"]))
           {
            $conn->query("DELETE FROM utilisateurs WHERE id=".$_POST['idUser']);
           }




            if (isset($_POST["isbn"])){

                
                $continue=TRUE;
                $nom=$conn -> real_escape_string($_POST['nom']);
                $auteur=$conn -> real_escape_string($_POST['auteur']);
                $isbn=$conn -> real_escape_string($_POST['isbn']);
                $quan=$conn -> real_escape_string($_POST['quantite']);
                
                $target_dir = "livres/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $target_file = $target_dir . "$isbn." . $imageFileType;
                // Check if image file is a actual image or fake image
                if($_FILES["file"]["size"]>0) {
                  $check = getimagesize($_FILES["file"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
               
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
                }
                if ($_FILES["file"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
                }
 }


                if($nom==="" || $isbn==="" || $auteur===""|| $quan==="") header("location: bookInfo.html");
                // $continue=false;

                if($continue){
                $sql = "SELECT isbn FROM livres";

                $result=$conn->query($sql);
                if(mysqli_num_rows($result)>0)
                {
                    while ($val=mysqli_fetch_assoc($result))
                    {
                        if($isbn === $conn->real_escape_string($val['isbn'])){$continue=FALSE; echo "<p style='color:#f32013;' >Ce livre existe déjà</p>"; break;}
                        // $contiue=TRUE;
                    }
                }
            }
                // else {$contiue=TRUE;}

                if($continue===TRUE){
                    $sql = "INSERT INTO livres (ID, Nom, auteur, isbn, quantite) VALUES (DEFAULT, '$nom', '$auteur', '$isbn', '$quan')";

                    if ($conn->query($sql) === TRUE) {
                      echo "<p  style='color: green; '>Livre enregisté</p>";
                      
                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                // $conn->close();
            }

            if(isset($_GET['choice'])){
            if ($_GET['choice']=="livres"){
                $sql= "SELECT * FROM livres ORDER BY id DESC";
                
                $liste=$conn->query($sql);
                    if (mysqli_num_rows($liste) > 0) { ?>
                    


                        <table  id="table_id" class="adminTable table-striped table-bordered table-s" >
                            <thead>
                            <tr>
                                <th style="width: 10%;">
                                    Id
                                </th>
                                <th style="width: 23%;">
                                    Nom
                                </th>
                                <th style="width: 23%;">
                                    Auteur
                                </th>
                                <th style="width: 25%;">
                                    ISBN
                                </th>
                                <th >
                                    Quantité
                                </th>
                                <th>
                                    Supprimer
                                </th>
                            </tr>   
                            </thead>
                            <tbody>


                        

                        <?php 
                        while($row = mysqli_fetch_assoc($liste)) {
                        ?>
                            <tr>
                                <td style="text-align: center;"  <?php if (isset($row["Traitement"])) echo "class=" . $row["Traitement"]; ?>>
                                    <?php echo  $row["id"];?> 
                                </td>
                                <td>
                                    <?php echo $row["nom"];?> 
                                </td>
                                <td>
                                    <?php echo $row["auteur"];?> 
                                </td>
                                <td>
                                    <?php echo $row["isbn"];?> 
                                </td>
                                <td >
                                    <!-- <form action="" method="get">
                                        <input type="text" name="id" style="display: none;" value=" <?php echo $row["id"];?>">
                                        <a href="#" onclick="this.closest('form').submit(); return false;">Plus d'informations</a>
                                    </form> -->
                                    <?php echo $row["quantite"];?> 
                                </td>
                                <td>
                                    <form action='' method="post">
                                        <input type="text" name="idBook" style="display: none;" value=" <?php echo $row["id"];?>">
                                        <input type="submit" name="deleteBook" class="btn btn-danger btn-sm" value="Supprimer">
                                    </form>
                                </td>
                            </tr>
                        
                            
                        <?php
                        }

                        echo "</tbody></table><br><a href='./bookInfo.html' class='addBook btn btn-bg btn-info'>Nouveau livre</a>";
                    } 
                    else {
                        echo "0 resultats";
                    }               
            }

            else if ($_GET['choice']=="utilisateurs"){
                $sql= "SELECT * FROM utilisateurs ORDER BY id DESC";
                
                $liste=$conn->query($sql);
                    if (mysqli_num_rows($liste) > 0) { ?>
                    


                        <table  id="table_id" class="adminTable table-striped table-bordered table-s" >
                            <thead>
                            <tr>
                                <th style="width: 10%;">
                                    Id
                                </th>
                                <th style="width: 23%;">
                                    Nom
                                </th>
                                <th style="width: 23%;">
                                    Prénom
                                </th>
                                <th style="width: 25%;">
                                    Email
                                </th>
                                 <th style="width: 25%;">
                                    Supprimer
                                </th>
                               <!--  <th >
                                    Plus
                                </th> -->
                            </tr>   
                            </thead>
                            <tbody>


                        

                        <?php 
                        while($row = mysqli_fetch_assoc($liste)) {
                        ?>
                            <tr>
                                <td style="text-align: center;"  <?php if (isset($row["Traitement"])) echo "class=" . $row["Traitement"]; ?>>
                                    <?php echo  $row["id"];?> 
                                </td>
                                <td>
                                    <?php echo $row["nom"];?> 
                                </td>
                                <td>
                                    <?php echo $row["prenom"];?> 
                                </td>
                                <td>
                                    <?php echo $row["email"];?> 
                                </td>
                                <!-- <td >
                                    <form action="" method="get">
                                        <input type="text" name="id" style="display: none;" value=" <?php echo $row["id"];?>">
                                        <a href="#" onclick="this.closest('form').submit(); return false;">Plus d'informations</a>
                                    </form>
                                </td> -->

                                <td>
                                    <form action='' method="post">
                                        <input type="text" name="idUser" style="display: none;" value=" <?php echo $row["id"];?>">
                                        <input type="submit" name="deleteUser" class="btn btn-danger btn-sm" value="Supprimer">
                                    </form>
                                </td>
                            </tr>
                        
                            
                        <?php
                        }
                            

                        echo "</tbody></table>";
                    } 
                    else {
                        echo "0 resultats";
                    }               
            }

           }
           
            $conn->close();
            ?>

            <section>
                

               <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    <br>    </section>

            
            
            
            
            
           <div class="footer-social-icons">
                <h4>Nous suivre</h4>
                <ul class="social-icons">
                    <li><a href="" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                    <li><a href="" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                    <li><a href="" class="social-icon"> <i class="fa fa-rss"></i></a></li>
                    <li><a href="" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                    <li><a href="" class="social-icon"> <i class="fa fa-linkedin"></i></a></li>
                    <li><a href="" class="social-icon"> <i class="fa fa-github"></i></a></li>
                </ul>
            </div>

          
        

        </div>
    </body>
</html>
