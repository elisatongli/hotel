<?php

$cid=$_POST["cid"];
$cod=$_POST["cod"];
$num_booked=0;


include 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);

$query = "select sum(quantity) as booked_rooms from reservation where (checkindate>'$cid' and checkoutdate<'$cod'  and roomtype='$type')";
$new=mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($new)) {
$num_booked= $row['booked_rooms'];
}


$t_rooms=0;
$query = "select sum(quantity) as total_rooms from room";
$new=mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($new)) {
    $t_rooms= $row['total_rooms'];
}

$a_rooms=$t_rooms-$num_booked;

echo $a_rooms;
echo $num_booked;
echo $t_rooms;

if($a_rooms>0) {

    $message = "There are $a_rooms rooms available, log in to book!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>window.location='reservation.html';</script>";

}

?>