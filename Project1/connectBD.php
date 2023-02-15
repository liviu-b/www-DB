<?php 
if (session_id() == '') {
    //session has not started
    session_start();
}
                $servername="localhost";
                $username="root";
                $password="";
                $dbname="magazinpieseauto";
                $conn=mysqli_connect($servername,$username,$password,$dbname);

                if(!$conn)
                 die("Eroare la conectare: " .mysqli_connect_error());
?>