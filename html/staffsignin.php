
<?php

/**
reception log in : admin1,admin1
manager log in : admin,admin
 */


   require_once 'login.php';
	//$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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



<form name="staffloginform" action="staffloginsession.php" method="post">
        <table  class = "table" width="400" height="178"  align="center" cellpadding="1"cellspacing="1" border="3">
            <tr>
                <td height="41" colspan="2" align="center"><h2><b>Staff Login</b></h2></td>
            </tr>
            <tr>
                <td width="170" height="40"  align="center"><b>Username</b></td>
                <td width="213">
                    <input type="text" name="username" required>
                    </td>
            </tr>
            <tr>
                <td height="38" align="center"><b>Password</b></td>
                <td>
                    <input type="password" name="password" required>
                    </td>
            </tr>
            <br />
            <tr>
                <td height="48" colspan="2" align="center">
                    <input type="submit"  value="Login" name="ok"> </td>
            </tr>
            <tr>
                <td colspan="2" align="center"> login hint: admin / admin </td>
            </tr>
        </table>
        <p>&nbsp;</p>
    </form>

</body>
</html>

