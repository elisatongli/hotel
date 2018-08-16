
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="60-334 Final Project" />
    <meta name="keywords" content="hotel management system project" />
    <meta name="author" content="Tong Li" />
    <title>Relax Hotel|Customer Registration</title>
    <link rel="stylesheet" href="main.css" />

</head>
<body>

<header>

    <nav >
        <a id="logo" href="../index.html">Relax Hotel</a>
        <a href="rooms.html">Rooms</a>
        <a href="amenities.html">Amenities</a>
        <a href="contact.html">Contact</a>
        <a href="reservation.html">Reservation</a>
        <button type="button" onclick="location.href='staffsignin.php';" >Staff Login</button>

    </nav>

</header>


<form id="myform" name="theform" class="group" action="userinsert.php" method="POST">
    <span id="formerror" class="error"></span>
    <ol>
        <li>
            <label for="myname">Username *</label>
            <input type="text" name="myname" id="myname" title="Please enter your username" autofocus value="<?php if (isset($myname)) { echo $myname; } ?>" />
            <?php if (isset($err_myname)) { echo $err_myname; } ?>
        </li>
        <li>
            <label for="myemail">Email *</label>
            <input type="text" name="myemail" id="myemail" title="Please enter your email" autofocus value="<?php if (isset($myemail)) { echo $myemail; } ?>" />
            <?php if (isset($err_myemail)) { echo $err_myemail; } ?>
        </li>
        <li>
            <label for="mypassword">Password</label>
            <input type="password" name="mypassword" id="mypassword" value="<?php if (isset($mypassword)) { echo $mypassword; } ?>" />
            <?php if (isset($err_passlength)) { echo $err_passlength; } ?>
        </li>
        <li>
            <label for="mypasswordconf">Password (confirm)</label>
            <input type="password" name="mypasswordconf" id="mypasswordconf" value="<?php if (isset($mypasswordconf)) { echo $mypasswordconf; } ?>" />
            <?php if (isset($err_mypassconf)) { echo $err_mypassconf; } ?>
        </li>

    </ol>






    <button type="submit" name="action" value="submit">Register</button>
</form>
</body>
</html>

