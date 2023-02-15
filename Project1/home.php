<!DOCTYPE html>
<?php
if (session_id() == '') {
    //session has not started
    session_start();
}

setcookie('nume', $_GET['username'], time() + 3600);

?>
<html>

<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    </script>
</head>

<body>
    <?php include 'connectBD.php'; ?>
    <div id="left">
        <div id="logo">
            <img src="./img/logo.png" />
        </div>
        <div id="menu">
            <ul>
                <li class="Produse"><a href="#">Produse</a></li>
               
                <li class="Cosul"><a href="#">Cosul meu</a></li>

                <li class="LogOut"><a href="index.html">Log Out</a></li>
            </ul>
        </div>
    </div>

   
    <!-------Produse-------->
    <div class="products">
        <nav class="bar_nav">
            <a href="#Motor">Motor</a> |
            <a href="#Filtre">Filtre</a> |
            <a href="#suspensie">Suspensie</a> |
            <a href="#Frana">Sistem franare</a> |
            <a href="#Uleiuri">Uleiuri</a>
        </nav><br><br>

 
        <section id="Motor">
            <br><br><br><br>
            <h2>Motor</h2>

            <hr />
            <?php
            if (isset($_POST['Submit-add-prod'])) {
                if (session_id() == '') {
                    session_start();
                }
                $sql_select = "Select * from utilizatori where Username= '" . $_GET['username'] . "'";
                $result = mysqli_query($conn, $sql_select);
                $row = mysqli_fetch_assoc($result);

                $IDuser = $row["ID"];
                $sql_insert = "INSERT INTO cos_produse(ID_user, ID_produs) VALUES ($IDuser,$_POST[IDprod])";
                if (mysqli_query($conn, $sql_insert)) {
                } else {
                    echo '<script>alert ("EROARE"); </script>';
                }
            }
            ?>
            <?php
            $sql_motor = "select * from produse where Categorie='Motor'";
            $result = mysqli_query($conn, $sql_motor);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { #sterge onsubmit
                    echo '<form method="post" > 
                            <div class="produs">';
                            if($row["PathImg"]=="0"){ 
                                echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/>';
                           }else{
                                echo'<img src='.$row["PathImg"].' width="100px" height="100px"> ';    
                                
                           }
                          echo'  <h3>' . $row['Nume'] . '</h3><br>
                            <h4>' . $row['Pret'] . ' Ron</h4><br>
                            <input type="hidden"  name="IDprod" value="' . $row['ID'] . '">
                            <input type="submit" class="button-add" name="Submit-add-prod" onclick="showTable()" value="Adauga">
                        </div>
                        </form>';
                }
            }
            ?>

        </section>

        <section id="Filtre">
            <br><br><br><br>
            <h2>Filtre</h2>

            <hr />

            <?php
            $sql_motor = "select * from produse where Categorie='Filtre'";
            $result = mysqli_query($conn, $sql_motor);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form method="post">
                       <div class="produs">';
                       if($row["PathImg"]=="0"){ 
                        echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/>';
                   }else{
                        echo'<img src='.$row["PathImg"].' width="100px" height="100px"> ';    
                        
                   }
                    echo'   <h3>' . $row['Nume'] . '</h3><br>
                            <h4>' . $row['Pret'] . ' Ron</h4><br>
                       <input type="hidden"  name="IDprod" value="' . $row['ID'] . '">
                       <input type="submit" class="button-add" name="Submit-add-prod" onclick="showTable()" value="Adauga">
                   </div>
                   </form>';
                }
            }
            ?>
            <!-- 
            <div class="produs">
                <img src="./img/filtru_aer.jfif" />
                <h3>Filtru aer MAN</h3>
                <button class="buton-add">Adauga in cos</button>
            </div>

            <div class="produs">
                <img src="./img/filtru_ulei.jfif" />
                <h3>Filtru ulei MAHLE</h3>
                <button class="buton-add">Adauga in cos</button>
            </div> -->

        </section>

        <section id="suspensie">
            <br><br><br><br>
            <h2>Suspensie</h2>

            <hr />
            <?php
            $sql_motor = "select * from produse where Categorie='Suspensie'";
            $result = mysqli_query($conn, $sql_motor);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form method="post">
                        <div class="produs">';
                        if($row["PathImg"]=="0"){ 
                            echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/>';
                       }else{
                            echo'<img src='.$row["PathImg"].' width="100px" height="100px"> ';    
                            
                       }
                      echo'  <h3>' . $row['Nume'] . '</h3><br>
                            <h4>' . $row['Pret'] . ' Ron</h4><br>
                        <input type="hidden"  name="IDprod" value="' . $row['ID'] . '">
                        <input type="submit" class="button-add" name="Submit-add-prod" onclick="showTable()" value="Adauga">
                    </div>
                    </form>';
                }
            }
            ?>
            <!-- <div class="produs">
                <img src="./img/amortizor.jfif" />
                <h3>Amortizor</h3>
                <button class="buton-add">Adauga in cos</button>
            </div>

            <div class="produs">
                <img src="./img/arc.jfif" />
                <h3>Arc punte fata</h3>
                <button class="buton-add">Adauga in cos</button>
            </div>

            <div class="produs">
                <img src="./img/amortizor.jfif" />
                <h3>Amortizor</h3>
                <button class="buton-add">Adauga in cos</button>
            </div>
            <div class="produs">
                <img src="./img/amortizor.jfif" />
                <h3>Amortizor</h3>
                <button class="buton-add">Adauga in cos</button>
            </div>
            <div class="produs">
                <img src="./img/amortizor.jfif" />
                <h3>Amortizor</h3>
                <button class="buton-add">Adauga in cos</button>
            </div> -->
        </section>

        <section id="Frana">
            <br><br><br><br>
            <h2>Elemente sistem franare</h2>

            <hr />
            <?php
            $sql_motor = "select * from produse where Categorie='Sistem franare'";
            $result = mysqli_query($conn, $sql_motor);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form method="post">
                        <div class="produs">';
                        if($row["PathImg"]=="0"){ 
                            echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/>';
                       }else{
                            echo'<img src='.$row["PathImg"].' width="100px" height="100px"> ';    
                            
                       }
                      echo'  <h3>' . $row['Nume'] . '</h3><br>
                            <h4>' . $row['Pret'] . ' Ron</h4><br>
                        <input type="hidden"  name="IDprod" value="' . $row['ID'] . '">
                        <input type="submit" class="button-add" name="Submit-add-prod" onclick="showTable()" value="Adauga">
                    </div>
                    </form>';
                }
            }
            ?>
            <!-- <div class="produs">
                <img src="./img/disc_frane.jfif" />
                <h3>Disc frane TRW</h3>
                <button class="buton-add">Adauga in cos</button>
            </div>

            <div class="produs">
                <img src="./img/placute_frane.jfif" />
                <h3>Placute frane TRW</h3>
                <button class="buton-add">Adauga in cos</button>
            </div> -->

        </section>

        <section id="Uleiuri">
            <br><br><br><br>
            <h2>Uleiuri</h2>

            <hr />

            <?php
            $sql_motor = "select * from produse where Categorie='Uleiuri'";
            $result = mysqli_query($conn, $sql_motor);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form method="post">
                         <div class="produs">';
                         if($row["PathImg"]=="0"){ 
                            echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/>';
                       }else{
                            echo'<img src='.$row["PathImg"].' width="100px" height="100px"> ';    
                            
                       }
                      echo'   <h3>' . $row['Nume'] . '</h3><br>
                            <h4>' . $row['Pret'] . ' Ron</h4><br>
                         <input type="hidden"  name="IDprod" value="' . $row['ID'] . '">
                         <input type="submit" class="button-add" name="Submit-add-prod" onclick="showTable()" value="Adauga">
                     </div>
                     </form>';
                }
            }


            ?>


        </section>

    </div>

    
    <!-------Cart ---->
    <div class="cart cart_page">

        <?php
        if (isset($_POST['remove-prod'])) {
            if (session_id() == '') {
                session_start();
            }

            $sql_select = "Select * from utilizatori where Username= '" . $_GET['username'] . "'";
            $result = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_assoc($result);

            $IDuser = $row["ID"];

            $sql_delete = "DELETE from cos_produse where ID_user=$IDuser and ID_produs=$_POST[IDprodCos] limit 1";

            if (mysqli_query($conn, $sql_delete)) {
              
            } else {
                echo '
                <script type="text/javascript">
                    window.onload = function () {
                        $(".content-contact").css("display", "none");
                        $("#content").css("display", "none");
                        $(".cart").css("display", "initial");
                        $(".account").css("display", "none");
                        $(".products").css("display", "none");
                        alert("Eroare la stergerea produsului din cos!");
                    }
                    </script>';
            }
        } ?>

        <!-------FINALIZARE COMANDA------------------->
        <?php
        if (isset($_POST['final_comanda'])) {
            if (session_id() == '') {
                session_start();
            }

            $IDuser = $_POST['IDuser'];
            $total = $_POST['totalComanda'];

            $sql_get_sold = "SELECT * from utilizatori where ID=$IDuser";
            $result = mysqli_query($conn, $sql_get_sold);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                    $sql_copy = "Select * from cos_produse
                                 where ID_user=$IDuser";

                    $result2 = mysqli_query($conn, $sql_copy);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row2 = mysqli_fetch_assoc($result2)) {

                            $sql_copy2 = "INSERT INTO  comenzi_finale(ID_user,ID_produs, Data)
                                        values ($row2[ID_user],$row2[ID_produs],CURRENT_TIMESTAMP())";
                            if(mysqli_query($conn,$sql_copy2)){
                               
                            }   else{
                                echo mysqli_error($conn);
                            }
                    }
                    }   
                    echo "<p style='color:green;text-align:left;'>Comanda finalizata cu succes</p>";
                    echo '<script>alert("Comanda trimisa!"); </script>';
                
            }
        }
        ?>
        <?php
        $sql_select1 = "Select * from utilizatori where Username= '" . $_GET['username'] . "'";
        $result10 = mysqli_query($conn, $sql_select1);
        $row = mysqli_fetch_assoc($result10);

        $IDuser = $row["ID"];
        echo '<table>
            <tr>
                <th>Produs</th>
                <th>Subtotal</th>
            </tr>';
        $sql_inner = "Select produse.ID as 'IDp',produse.Imagine,produse.PathImg,produse.Pret,produse.Nume from produse 
                        inner join cos_produse
                        on cos_produse.ID_produs=produse.ID
                        inner join utilizatori
                        on utilizatori.ID=cos_produse.ID_user
                        where utilizatori.ID=$IDuser
                        ORDER BY produse.ID";
        $result = mysqli_query($conn, $sql_inner);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>
                            <form method="POST">
                            <div class="cart-info">';
                            
                        if($row["PathImg"]=="0"){ 
                                echo'<img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/>';
                           }else{
                                echo'<img src='.$row["PathImg"].' width="100px" height="100px"> ';    
                                
                           }
                           echo'     <div>
                                    <p>' . $row['Nume'] . '</p>
                                    <small>' . $row['Pret'] . ' Ron</small><br>
                                    <input type="hidden"  name="IDprodCos" value="' . $row['IDp'] . '">
                                    <input type="submit" name="remove-prod" value="Remove" id="remove-prod" onclick="comanda()">
                                </div>
                            </div>
                            </form>
                        </td>
                        <td>' . $row['Pret'] . ' Ron</td>
                    </tr>';
            }
            echo '</table>';
        }


        $sql_sum = "Select SUM(Pret) as Suma from produse
                      inner join cos_produse
                        on cos_produse.ID_produs=produse.ID
                        inner join utilizatori
                        on utilizatori.ID=cos_produse.ID_user
                        where utilizatori.ID=$IDuser";


        $result = mysqli_query($conn, $sql_sum);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $subtotal = $row['Suma'];
            $taxa_transport = 20;
            $total_comanda = $taxa_transport + $subtotal;
            if ($subtotal > 0) {
                echo ' <div class="pret-total">
                        <table>
                            <tr>
                                <td>Subtotal</td>
                                <td>' . $subtotal . '</td>
                            </tr>
                            <tr>
                                <td>Taxa transport</td>
                                <td>' . $taxa_transport . '</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>' . $total_comanda . '</td>
                            </tr>
                            <tr class="center-text">
                            <form method="post">
                               <input type="hidden"  name="IDuser" value="' . $IDuser . '">
                               <input type="hidden"  name="totalComanda" value="' . $total_comanda . '">
                                <td colspan=2><input type="submit" name="final_comanda" onclick="comanda()" class="buton_com_final" value="Finalizeaza comanda"></td>
                        
                            </form>    
                                </tr>
                        </table>
    
                    </div>';
            } else {
                echo '</table>';
            }
        }
        ?>

    </div>


    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="./javascript/jquery-3.6.0.min.js"></script>
    <script src="./javascript/home.js"></script>

    <script src="./javascript/slider.js">
       
    </script>

</body>

</html>