<?php
session_start();
?>

<html>
<body >
<?php




$cid=$_POST["cid"];
$cod=$_POST["cod"];
$norm=$_POST["txtroom"];
$type=$_POST["roomtype"];
$spreq=$_POST["txtspanyreq"];
$email=$_POST["txtemail"];
$phone=$_POST["txtnumber"];




$username = $_SESSION['username'];
$uid=$_SESSION['uid'];

include 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);


$ddiff=floor(strtotime($cod)-strtotime($cid))/86400;
$_SESSION['datediff']=$ddiff;


if($ddiff<0)
{
    $message = "CheckIn Date cant be greater than Checkout Date :()";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>window.location='makereservation.php';</script>";
}

else
{  // $type = get_post($conn,'roomtype');

    $num_booked=0;

    $query = "select sum(quantity) as booked_rooms from reservation where (checkindate>'$cid' and checkoutdate<'$cod'  and roomtype='$type')";
    $new=mysqli_query($conn,$query);

    while ($row = mysqli_fetch_assoc($new)) {
        $num_booked= $row['booked_rooms'];
    }

    $totalrooms_query="SELECT quantity FROM room where type='$type'";
    $totalrooms_query_q=mysqli_query($conn,$totalrooms_query);
    $t_rooms=0;
    while ($row = mysqli_fetch_assoc($totalrooms_query_q)) {
        $t_rooms= $row['quantity'];
    }

    $a_rooms=$t_rooms-$num_booked;

    if($norm>$a_rooms)
    {
        $message = "Sorry only ".$a_rooms." remaning in ".$type." category on your chosen dates:()";
        echo "<script type='text/javascript'>alert('$message');</script>";
        echo "<script>window.location='makereservation.php';</script>";
    }
    else
    {

        if($type=1){$total=666*$ddiff;}
        else if ($type=2){$total=888*$ddiff;}

        $query = "INSERT INTO reservation (checkindate,checkoutdate,roomtype,quantity,total,comment,email,phone,cusid) VALUES" .
            "('$cid','$cod','$type','$norm','$total','$spreq','$email','$phone',$uid)";

        $result = mysqli_query($conn,$query);



        $message = "Booking Successful!";


        $qq=mysqli_query($conn,"select * from reservation");
        $row1=mysqli_fetch_array($qq);
        $rsvid=mysqli_num_rows($qq);

        $_SESSION['rid']=$rsvid;
        $_SESSION['norm']=$norm;
        $_SESSION['type']=$type;

        echo "<script type='text/javascript'>alert('$message');</script>";

       // $link = $_SERVER['HTTP_REFERER'];
       echo "<script>window.location='yourreservation.php';</script>";
        //echo "<script>window.location='$link'</script>";
    }

}
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}


?>
</body>
</html>
