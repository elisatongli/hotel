<?php
session_start();
$user=$_SESSION['username'];

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Relax Hotel| Staff</title>
    <link rel="stylesheet" href="../css/staff.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<header>

    <nav >
        <a id="logo" href="../index.html">Relax Hotel</a>
        <a href="rooms.html">Rooms</a>
        <a href="amenities.html">Amenities</a>
        <a href="contact.html">Contact</a>
       <a href="staffmain.php">Staff</a>
    </nav>

</header>

<body>


<?php
echo <<<_END

<div id="staffheader">
<p>&nbsp;&nbsp;Welcome $user !! You are able to do following operations: </p>

<nav >
    <a href="#newreservation">Make New Reservation</a>
    <a href="#reservations">Check/Cancel Existing Reservation</a>
    <a href="#reports">Reports</a>
</nav>

</div>

_END;
?>

<div id="newreservation">
    <h2>New Reservation</h2>
    <ul>
        <li>Staff can make new reservation on behalf of customer</li>
        <li>To do so, you need to register a new customer record on customer's behalf</li>
        <li>Click below link to open a new window to begin the operation</li>
        <li  onclick="window.open('reservation.html','_blank')" id="newlink">New Reservation for customer</li>
    </ul>
</div>


<div id="reservations">
    <h2>Existing Reservations</h2>
<?php include ("staffreservation.php");?>
    </div>

<div id="reports">
    <h2>Reports</h2>
<?php include ("staffreport.php"); ?>

</body>
