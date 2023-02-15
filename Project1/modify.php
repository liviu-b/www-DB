<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link rel="stylesheet" href="./css/modify.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
    <div id="left">
        <div id="logo">
            <img src="./img/logo.png" />
        </div>
        <div id="menu">
        <?php
          echo'  <ul>
                <li class="Conturi"><a href="admin.php?username=' . $_GET["username"] . '">Meniu Principal</a></li>
                

            </ul>'
            ?>
        </div>
    </div>  

  

    <div id="right-change">
        <h1>Schimba detaliile produsului</h1>
        <br /><br />
        <?php
         $servername="localhost";
         $username="root";
         $password="";
         $dbname="magazinpieseauto";
 
         $conn=mysqli_connect($servername,$username,$password,$dbname);
 
         if(!$conn){
             die("Eroare la conectare: " .mysqli_connect_error());
         }

        ?>

         <?php
        if (isset($_POST['modify_p'])) {
                        

                $sql_upd="UPDATE produse
                          SET Nume='".$_POST['nume_p']."',
                              Categorie='".$_POST['category_p']."',
                              Pret='".$_POST['pret_p']."'
                          Where ID='" . $_GET['id'] . "'  
                              ";
                if(mysqli_query($conn,$sql_upd)){
                    echo '<p  style="color:red;text-align:left;">Produs modificat cu succes <p>';
                }else
                {
                    echo '<p style="color:red;text-align:left;">Eroare la modificarea produsului <p>';
                }

        }   

?>



        <?php
           
                 $sql="Select * 
	                FROM produse
                    where ID='" . $_GET['id'] . "'
                    ";
	              $result = mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);


	        if(mysqli_num_rows( $result )>0){
                echo'<form method="post">';
                    echo " <fieldset>";
                    echo"     <legend><h2>  Modificati produsul</h2></legend>";
                                 echo"       <label>Imagine actuala:</label><br>";
                    if($row["PathImg"]=="0"){ 
                                    echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/><br>';
                               }else{
                                    echo'<img src='.$row["PathImg"].' width="100px" height="100px"><br>';    
                                    
                               }
                    echo"    <label>Denumire Produs:</label>";
                    echo"     <input type='text' name='nume_p' value=".json_encode($row['Nume'])."><br><br>";
                    echo"      <label>Categorie Produs:</label>";
                    echo"     <select name='category_p' >";
                    echo"          <option value='Uleiuri'>Uleiuri</option>";
                    echo"         <option value='Motor'>Motor</option>";
                    echo"         <option value='Frane'>Sistem franare</option>";
                    echo"         <option value='Filtre'>Filtre</option>";
                    echo"         <option value='Suspensie'>Suspensie</option>";
                    echo"     </select><br><br>";
                    echo"     <label>Pret:</label>";
                    echo"    <input type='number' name='pret_p' value=".$row['Pret']."><br><br>";
                    echo"    <input type='submit' value='Modifica' name='modify_p' class='butoane'>";
                    echo"     </div>";
                    echo"  </fieldset>";
                    echo'</form>';
            }

                
            mysqli_close($conn);
                  ?>

       
           
            
            
         </div>
   
   



    <footer id="footer">
        <h2>� Copyright 2021 | - Valentin Badea -</h2>
    </footer>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="jquery-3.6.0.min.js"></script>


</body>
</html>