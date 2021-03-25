<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:customerloginAndregister.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Customer home page</title>
        <link rel="stylesheet" type="text/css" href="style/homeStyle.css">

</head>

<body>
    <?php
    include('customerHeader.php');
    ?>
    <div class="welcome">
        <h3>GMAIL:bdrailway@gmail.com</h3>
        <h3>PHONE:016-XXXXXXXXXX</h3>
    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>