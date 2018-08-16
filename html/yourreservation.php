<?php
session_start();

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);

echo"Make a new Reservation? Just Fill in the form below";

include("makereservation.php");

$uid=$_SESSION['uid'];

$query = "SELECT * FROM reservation where cusid = '$uid'";

$result = mysqli_query($conn,$query);

$rows = $result->num_rows;

for ($j = 0 ; $j < $rows ; ++$j)
{
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);

    echo <<<_END
  <pre>
    Reservation ID $row[0]
    Check-in  Date $row[1]
    Check-out Date $row[2]
    Room Type      $row[3]
    Quantity       $row[4]
    Total          $row[5]
  </pre>
  <form action="yourreservation.php" method="post">
  <input type="hidden" name="delete" value="yes">
  <input type="hidden" name="rsvid" value="$row[0]">
  <input type="submit" value="Cancel Reservation"></form>
_END;
}


if (isset($_POST['delete']) && isset($_POST['rsvid']))
{
    $rid = get_post($conn, 'rsvid');
    $query  = "DELETE FROM reservation WHERE reservationid='$rid'";

    $result = $conn->query($query);
   if($result){echo "You have cancelled this reservation!";}

   else {echo "DELETE failed: $query<br>" .
       $conn->error . "<br><br>";}
}


echo" You just booked room type". $_SESSION['type'];


function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}
?>


