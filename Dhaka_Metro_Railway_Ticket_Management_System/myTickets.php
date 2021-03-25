<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location:customerloginAndregister.php");
      }
include('service/db.php');
   if(isset($_POST['search'])){
    $trstartstation=$_POST['trstartstation'];
    $trendstation=$_POST['trendstation'];
   }
?>
<html>
<head>
<title>My Tickets</title>
    <link rel="stylesheet" type="text/css" href="style/liststyle.css">
    <link rel="stylesheet" type="text/css" href="style/downformstyle.css">
</head>
<body>
    
    <?php
    include('customerHeader.php');
    ?>
    
    
     <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    
     <?php 
       $cid=$_SESSION['id'];
        $results = executeSQL("SELECT ticket.tiid,ticket.tiprice,ticket.tistatus,ticket.tiseatno,train.trid,train.trname,train.trstartstation,train.trendstation,train.trstarttime,train.trendtime FROM ticket INNER JOIN train on ticket.trid=train.trid WHERE ticket.cid=$cid"); 
    ?>
    
    <table class="table">
	<thead>
		<tr>
            <th>Ticket ID</th>
			<th>Train Name</th>
			<th>start station</th>
            <th>end station</th>
            <th>start time</th>
            <th>end time</th>
             <th>status</th>
            
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="Ticket ID"><?php echo $row['tiid']; ?></td>
			<td data-label="Train Name"><?php echo $row['trname']; ?></td>
<!--
			<td><?php echo $row['trstartstation']; ?></td>
            <td><?php echo $row['trendstation']; ?></td>
-->
            
            
             <td data-label="start station">
                <?php
                $stationid=$row['trstartstation'];
                $result=executeSQL("SELECT * FROM station WHERE sid = $stationid");
                    
                $result = mysqli_fetch_array($result);
                                                       
                echo $result["sname"];
                ?>
                
            </td>
            
            
            
            
            <td data-label="end station">
                     
                <?php
                $stationid=$row['trendstation'];
                $result=executeSQL("SELECT * FROM station WHERE sid = $stationid");
                    
                $result = mysqli_fetch_array($result);
                                                       
                echo $result["sname"];
                ?>
                
            
            
            
            
            </td>
            
            
            <td data-label="start time"><?php echo $row['trstarttime']; ?></td>
            <td data-label="end time"><?php echo $row['trendtime']; ?></td>
       
            
            <td data-label="status"><?php 
                    if($row['tistatus']==1)
                        echo "Active" ;
                    else{
                        echo "Canceled";
                    }
                
                
                ?></td>
            
            
			
			<td data-label="Action">
                <?php if($row['tistatus']==1){?>
				<a href="service/customerService.php?cancel=<?php echo $row['tiid']; ?>" class="del_btn">Cancel</a>
                <?php }?>
			</td>
		</tr>
	<?php } ?>
</table>
    
    

</body>
</html>