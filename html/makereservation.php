<?php
session_start();
//var_dump($_SESSION);
$user = $_SESSION['username'];
echo "<p>Welcome! ".$user."<br /></p>";

require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);

$q1 = "SELECT id FROM customers where name= '$user'";

$result = mysqli_query($conn,$q1);
$row= mysqli_fetch_assoc($result);

$uid = $row['id'];

$_SESSION['uid']=$uid;


?>

<html>
<head>
    <script language=javascript>

        function checkout()
        {
            var i=0;
            for(x=0;x<document.reservationform.elements.length;x++)
            {
                if(document.reservationform.elements[x].value=="")
                {
                    reservationform.txtname.focus();
                    alert("Please Complete All the information on the form");
                    i=1;
                    break;
                }
            }

            if(i==0)
            {
                reservationform.method="POST";
                reservationform.action="book.php";
                reservationform.submit();
            }
        }
    </script>
</head>
<body bgcolor="#fff">



<br><br>
<form action="book.php" method="POST" name="reservationform" id="reservationform">
    <br><br>
    <table  border=0 align=center>

        <tr>
            <th align=left>Fill in the new reservation information below</th>

        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <th align=left>Check-in Date   :</th>
            <td>
                <input type="date" name="cid" max="2979-12-31" ><br>
            </td>
        </tr>
        <tr></tr>
        <tr>
            <th align=left>Check-out Date   :</th>
            <td>
                <input type="date" name="cod" max="2979-12-31"><br>
            </td>
        </tr>
        <tr>
            <th align=left>No Of Rooms   :</th>
            <td><select name=txtroom>
                    <?php
                    for($i=1;$i<=5;$i++)
                    {
                        echo "<option value=$i>$i</option>";
                    }
                    ?>
                </select></td>
            <th align=left>Type   :</th>
            <td>
               <select name="roomtype" id="roomtype">
                    <option value="1">Relax Spa Suite - $666/night</option>
                    <option value="2">Relax Skylight House - $888/night</option>
                </select>



            </td>
        </tr>

        <tr>
            <th align=left>Full Name   :</th>
            <td colspan=4><input type=text name=txtname size=50></td>
        </tr>
        <tr>
            <th align=left>Email   :</th>
            <td colspan=4><input type="text" name="txtemail" size=50></td>
        </tr>

        <tr>
            <th align=left>Telephone   :</th>
            <td colspan=4><input type="text" name="txtnumber" size=15 ></td>
        </tr>

        <tr>
            <th align=left>Comments :</th>
            <td colspan=4><textarea name=txtspanyreq rows=5 cols=40></textarea>
        </tr>
        <br />
        <br />
        <tr>
            <td colspan=2 align=center><input type=button name=s1 value="submit" onClick="checkout()">
                <input type=reset name=s2 value="clear"><a href=makereservation.php></a></td>
        </tr>
    </table>
</form>
</body>
</html>
