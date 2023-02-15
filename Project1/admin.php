<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link rel="stylesheet" href="./css/admin.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>

<body>
    <div id="left">
        <div id="logo">
            <img src="./img/logo.png" />
        </div>
        <div id="menu">
            <ul>
                <li class="Conturi"><a href="#">Conturi</a></li>
                <li class="Produse"><a href="#">Produse</a></li>
                <li class="Add_produse"><a href="#">Add produse</a></li>
                <li class="Log_Out"><a href="index.html">Log Out</a></li>

            </ul>

        </div>
    </div>
    <?php include 'connectBD.php'; ?>
   

   

    <div id="right-add">
        <h1>Adauga un produs nou!</h1>
        <br /><br />

        <?php

        if (isset($_POST['changeProdus'])) {
            move_uploaded_file($_FILES['img']['tmp_name'],'./img/'. $_FILES['img']['name']);
            $nume=$_POST['prod_name'];
            $categorie=$_POST['category'];
            $pret=$_POST['price'];
            $pic_name=$_FILES['img']['name'];
            $path='./img/'.$pic_name;
            
            $imaginea=file_get_contents($path);
            $sql="INSERT INTO produse(Nume,Categorie,Pret,PathImg)
               VALUES ('$nume','$categorie','$pret','$path') ";
            if(mysqli_query($conn,$sql)){
               echo "<p style='color:red;text-align:left;font-size:20px'>Produs adaugat in baza de date! </p>";
            }else{
                echo "EROARE:".mysqli_error($conn);
            }
        }

        ?>
        <form method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>
                    <h2> Produs</h2>
                </legend>
                <label>Denumire Produs:</label>
                <input type="text" name="prod_name" required><br><br>
                <label>Categorie Produs:</label>
                <select name="category">
                    <option value="Uleiuri">Uleiuri</option>
                    <option value="Motor">Motor</option>
                    <option value="Frane">Sistem franare</option>
                    <option value="Filtre">Filtre</option>
                    <option value="Suspensie">Suspensie</option>
                </select><br><br>
                <label>Pret:</label>
                <input type="number" name="price" required><br><br>
                <label>Imagine:</label>
                <input type="file" name="img" required><br><br>

                <div class="div-butoane">
                    <input type="reset" value="Reset" class="butoane">
                    <input type="submit" value="Adauga" name="changeProdus" onclick="AddProdus()" class="butoane">

                </div>
            </fieldset>


        </form>
    </div>


   

    <div id="right-products">

        <?php
        if (isset($_POST['delete_p'])) {

            $sql_del1 = "DELETE from cos_produse
                    where ID_produs='" . $_POST['idprod'] . "'
                    ";
            mysqli_query($conn, $sql_del1);

            $sql_del2 = "DELETE from comenzi_finale
            where ID_produs='" . $_POST['idprod'] . "'
            ";
             mysqli_query($conn, $sql_del2);

            $sql_del = "DELETE from produse
                    where ID='" . $_POST['idprod'] . "'
                    ";
            if (mysqli_query($conn, $sql_del)) {
                echo '<p  style="color:red;text-align:center;font-size:20px;"><Produs sters cu succes! <p>';
            } else {
                echo '<p  style="color:red;text-align:center;font-size:20px">EROARE la stergerea produsului <p>'. mysqli_error($conn) ;
            }
        }


        ?>

        <h2>Tabel cu produsele din baza de date</h2>
        <table border="1px solid black" class="table_p">
            <tr>
                <th>ID</th>
                <th>Nume Produs</th>
                <th>Pret</th>
                <th>Imagine</th>
                <th>Optiuni</th>
            </tr>
            <?php

            $sql = "Select * 
                    FROM Produse ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                            <tr>
                            <td>' . $row["ID"] . '</td>
                            <td>' . $row["Nume"] . ' </td>
                            <td>' . $row["Pret"] . ' Ron</td>';
                            
                       if($row["PathImg"]=="0"){ 
                            echo'<td><img src="data:image/jpeg;base64,' . base64_encode($row['Imagine']) . '" width="100px" height="100px"/></td>';
                       }else{
                            echo'<td><img src='.$row["PathImg"].' width="100px" height="100px"> </td>';    
                            
                       }
                           echo' <td> 
                           
                            <form method="post" action="modify.php?username=' . $_GET["username"] . '&id='.$row["ID"].'">
                            <input type="hidden" name="idprod" value="'.$row['ID'].'"/>
                            <input type="submit"  value="Modifica" id="s_b" class="butoane_prod"/>
                            </form>
                            <form method="post">
                            <input type="hidden" value=' . $row["ID"] . ' name="idprod">
                            <input id="s_b" class="butoane_prod" name="delete_p" value="Sterge" type="submit" onclick="stergeProdus()"></td>
                            </tr>
                        </form>';
                }
            }




            ?>
        </table>
    </div>



    <div id="right-acc">

        <?php
        if (isset($_POST['delete-acc'])) {
            $sql = "SELECT * FROM utilizatori where ID=$_POST[IDuser]";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $sql_d1 = "DELETE from mesaje where ID_user=$row[ID]";
                mysqli_query($conn, $sql_d1);
                $sql_d3 = "DELETE from comenzi_finale where ID_user=$row[ID]";
                mysqli_query($conn, $sql_d3);
                $sql_d2 = "DELETE from cos_produse where ID_user=$row[ID]";
                mysqli_query($conn, $sql_d2);

                $sql_d = "DELETE from utilizatori where ID=$row[ID]";
                if (mysqli_query($conn, $sql_d)) {
                } else {
                    echo "Eroare la stergerea contului " . mysqli_error($conn);
                }
            }
        }


        ?>


        <h2>Tabel cu toate conturile existente in baza de date (*fara administratori)</h2><br><br>
        <table>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "Select * 
	        FROM Utilizatori 
            where not admin=1
            ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form method="post">
                    <tr>
                    <td>' . $row["ID"] . '</td>
                    <td>' . $row["Username"] . '</td>
                    <td>' . $row["Email"] . '</td>
                    <input type="hidden"  name="IDuser" value="' . $row['ID'] . '">
                    <td><input type="submit" value="Delete Account" name="delete-acc" class="button-del-acc"/></td>
                    </tr>
                    </form>';
                }
            }


            mysqli_close($conn);
            ?>



        </table>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="./javascript/jquery-3.6.0.min.js"></script>
    <script src="./javascript/admin.js"> </script>

</body>

</html>