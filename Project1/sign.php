<?php session_start();
$a=0;

if(empty($_POST['user']))
$a=1;
if(empty($_POST['pass']))
$a=1;
if(empty($_POST['confpass']))
$a=1;
if(empty($_POST['email']))
$a=1;

 echo php_ini_loaded_file();
$user=$_POST['user'];
$parola=$_POST['pass'];
$confpass=$_POST['confpass'];
$email=$_POST['email'];

if($a==0)
{
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="magazinpieseauto";
	
	$conn=mysqli_connect($servername,$username,$password,$dbname);
	
	if(!$conn){
		die("Eroare la conectare: " .mysqli_connect_error());
	}
	if($parola==$confpass){
		$sql="INSERT INTO utilizatori (Username, Parola, Email,Admin)
		VALUES ('$user','$parola','$email',0)
		";	
	
		if(mysqli_query($conn,$sql)){
		echo "<script type='text/javascript'>alert('Inregistrare efectuata cu succes');</script>";

		}else
		echo '<script type="text/javascript">  window.onload = function(){
		alert("New user added");
		}</script>';
	
	}else
		echo "<script type='text/javascript'>alert('Parolele difera!!');</script>";
	

}
mysqli_close($conn);
?>