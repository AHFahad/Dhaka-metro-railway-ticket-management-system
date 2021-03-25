<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:customerloginAndregister.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Ticket Clerk home page</title>
        <link rel="stylesheet" type="text/css" href="style/homeStyle.css">

</head>

<body>
    <?php
    include('ticketClerkHeader.php');
    ?>
    <div class="welcome">
        <h1>Welcome to bangladesh First Metro Railway website</h1>
    </div>
</body>
<?php
    include('footer.php');
    ?>
</html>