<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:customerloginAndregister.php");
  }
include('service/db.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Refund List</title>
        <link rel="stylesheet" type="text/css" href="style/listStyle.css">

</head>

<body>
    <?php
    include('adminHeader.php');
    ?>
    <?php 
       
        $results = executeSQL("SELECT ticket.cid,customer.cname, ticket.tiid,ticket.tiprice,ticket.titransactionno FROM ticket INNER JOIN customer ON ticket.cid=customer.cid where tistatus='0'"); 
    ?>

<table class="table">
	<thead>
		<tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
			<th>Ticket ID</th>
			<th>Amount</th>
            <th>Transaction No</th>
            
            
			
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="Customer ID"><?php echo $row['cid']; ?></td>
            <td data-label="Customer Name"><?php echo $row['cname']; ?></td>
			<td data-label="Ticket ID"><?php echo $row['tiid']; ?></td>
			<td data-label="Amount"><?php echo $row['tiprice']; ?></td>
            <td data-label="Transaction No"><?php echo $row['titransactionno']; ?></td>
<!--
            <td><?php echo $row['tmobile']; ?></td>
            <td><?php echo $row['tdob']; ?></td>
			
-->
		</tr>
	<?php } ?>
</table>
    
</body>

</html>