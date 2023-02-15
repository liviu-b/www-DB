<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="./css/signup.css" />
        <title>Creaza cont</title>
    </head>
    <body>

        <?php 

            $user = $pass = $confpass = $email = "";
           
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user = test_input($_POST["user"]);
                $email = test_input($_POST["email"]);
                $pass = test_input($_POST["pass"]);
                $confpass = test_input($_POST["confpass"]);

                $servername="localhost";
                $username="root";
                $password="";
                $dbname="magazinpieseauto";
                $conn=mysqli_connect($servername,$username,$password,$dbname);

                if(!$conn)
                 die("Eroare la conectare: " .mysqli_connect_error());

               
                if($pass==$confpass){

                    $sql1="Select * from Utilizatori WHERE Username='$user' ";
                    $result = mysqli_query($conn,$sql1);

                    if(mysqli_num_rows( $result )==0){

                        $sql="INSERT INTO utilizatori (Username, Parola, Email,Admin)
                        VALUES ('$user','$pass','$email',0)
                        ";

                        if(mysqli_query($conn,$sql))
                        echo '
                        <script type="text/javascript">
                            window.onload = function () {
                                alert("User added!");
                            }</script>';
                        else
                        echo '
                        <script type="text/javascript">
                            window.onload = function () {
                                alert("ERROR");
                            }</script>';
                    }else
                        echo "<script type='text/javascript'>alert('Username existent!!');</script>";
                }else
                    echo "
                    <script type='text/javascript'>alert('Parolele difera!!');</script>";
               
             mysqli_close($conn);
             }
        
       
        

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        ?>



        <div id="sign">
            <h2>Creeaza cont</h2>
            <form method="post"  >
                <input type="text" placeholder="Nume Utilizator.." name="user" pattern="\S{5,}" oninvalid="setCustomValidity('Usernamul terbuie sa aiba cel putin 5 caractere!')" oninput="setCustomValidity('')" required />
                <input type="password" placeholder="Parola.." name="pass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$" oninvalid="setCustomValidity('Parola trebuie sa aiba cel putin o litara mica,o litera mare si un numar!(minim 6 caractere)')" oninput="setCustomValidity('')" required />
                <input type="password" placeholder="Confirmare parola.." name="confpass" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$" oninvalid="setCustomValidity('Parola trebuie sa aiba cel putin o litara mica,o litera mare si un numar!')" oninput="setCustomValidity('')" required />
                <input type="email" placeholder="Email.." name="email" required />
                <input type="submit" value="Creeaza" />
                <input type="button" value="Return to 1st page" onclick="window.location.href='index.html'" />
            </form>
        </div>


    </body>
</html>