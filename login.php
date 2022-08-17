<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = pg_connect("host=ec2-44-205-112-253.compute-1.amazonaws.com dbname=d2nlbeglsecip0 user=ydypewlqkahcdd password=6a6cdfac81a598105e12c69d03feed05cd392af4c48efbd082dd52928e8d3594 port=5432") or die('Unable To connect');
        $result = pg_query($con,"SELECT * FROM login_user WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
        $row  = pg_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
    header("Location:index.php");
    }
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<form name="frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h3 align="center">Enter Login Details</h3>
 Username:<br>
 <input type="text" name="email">
 <br>
 Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</form>
</body>
</html>