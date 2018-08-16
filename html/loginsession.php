<?php
// ob_start();
session_start();

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$username=$_POST['username'];
$password=$_POST['password'];

$query = "select * from customers where  name='$username' and  password='$password'";

$result   = mysqli_query($conn,$query);

if(mysqli_num_rows($result)){
    $_SESSION['username']=$username;
    echo "<script>window.location='yourreservation.php';</script>";
}


else
{
    $message="Incorrect username/password found!";
    echo "<script type='text/javascript'>alert('$message');</script>";
   // echo "<script>window.location='reservation.html';</script>";
    echo"<script>close()</script>";
}

?>
