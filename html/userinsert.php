<?php

    if (isset($_POST['myname'])) { $myname = $_POST['myname']; }
    if (isset($_POST['mypassword'])) { $mypassword = $_POST['mypassword']; }
    if (isset($_POST['mypasswordconf'])) { $mypasswordconf = $_POST['mypasswordconf']; }
    if (isset($_POST['myemail'])) { $myemail = $_POST['myemail']; }
    if (isset($_POST['requesttype'])) { $requesttype = $_POST['requesttype']; }


    if ($myname === '') :
        $err_myname = '<div class="error">Sorry, your name is a required field</div>';
    endif; // input field empty

    if ($myemail === '') :
        $err_myname = '<div class="error">Sorry, your email is a required field</div>';
    endif; // input field empty

    if (strlen($mypassword) <= 6):
        $err_passlength = '<div class="error">Sorry, the password must be at least six characters</div>';
    endif; //password not long enough


    if ($mypassword !== $mypasswordconf) :
        $err_mypassconf = '<div class="error">Sorry, passwords must match</div>';
    endif; //passwords don't match


    if ( !(preg_match('/[A-Za-z]+, [A-Za-z]+/', $myname)) ) :
        $err_patternmatch = '<div class="error">Sorry, the name must be in the format: Last, First</div>';
    endif; // pattern doesn't match


require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query    = "INSERT INTO customers (name,email,password) VALUES" .
    "('$myname','$myemail','$mypassword')";

$result = mysqli_query($conn,$query);

if (!$result){
    $message = "Registration failed. Try again!";
    echo $message;
}

else
{
    echo "Insert record successfully!";
    echo "<script>window.location='reservation.html';</script>";
}


?>