
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
</head>
<body>

<p>Staff Login</p>



<form name="staffloginform" action="staffloginsession.php" method="post">
        <table  class = "table" width="400" height="178"  align="center" cellpadding="1"cellspacing="1" border="3">
            <tr>
                <td height="41" colspan="2" align="center"><h2><b>Staff Login</b></h2></td>
            </tr>
            <tr>
                <td width="170" height="40"  align="center"><b>Username</b></td>
                <td width="213">
                    <input type="text" name="username">
                    </td>
            </tr>
            <tr>
                <td height="38" align="center"><b>Password</b></td>
                <td>
                    <input type="password" name="password">
                    </td>
            </tr>
            <br />
            <tr>
                <td height="48" colspan="2" align="center">
                    <input type="submit"  value="Login" name="ok"> </td>
            </tr>

        </table>
        <p>&nbsp;</p>
    </form>

</body>
</html>

