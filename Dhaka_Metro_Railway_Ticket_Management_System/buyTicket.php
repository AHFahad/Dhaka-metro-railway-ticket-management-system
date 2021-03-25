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
<title>Buy Ticket</title>

    <link rel="stylesheet" type="text/css" href="style/liststyle.css">
    <link rel="stylesheet" type="text/css" href="style/downformstyle.css">
    <link rel="stylesheet" type="text/css" href="style/homeStyle.css">
    
</head>
<body>
    <?php
    include('customerHeader.php');
    ?>

<!-- form start -->

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">







    <form method="post" action="buyTicket.php" class="sign-in-form">
        
        
   
        
    <label>Train Start Station</label>
       <div class="input-field">
			

       <i class="fas fa-plane-departure"></i>
            
            
            
            <select name="trstartstation">
                    <?php 

                    $result = executeSQL("SELECT * FROM station");

                    while ($row = $result->fetch_assoc())
                    {
                        if($row['sstatus']==1){
                            $selected="";
                        if($row['sid']==$trstartstation){
                            $selected="selected";
                            echo "selected";
                        }
                        else{
                            $selected="";
                        }
                        
                    
                         
                        echo '<option value="'.$row['sid'].'" '.$selected.' ">'.$row['sname'].'</option>';
                            
                        }
                        
                    }
                    ?>

            </select>
                   
		</div>
        
        
        <label>Train end Station</label>
        <div class="input-field">
			

        <i class="fas fa-plane-arrival"></i>
            
         
            <select name="trendstation">
                    <?php 

                    $result = executeSQL("SELECT * FROM station");

                    while ($row = $result->fetch_assoc())
                    { 
                        if($row['sstatus']==1){
                            
                            $selected="";
                            if($row['sid']==$trendstation){
                                $selected="selected";
                                echo "selected";
                            }
                            else{
                                $selected="";
                            }

                            echo '<option value="'.$row['sid'].'" '.$selected.' ">'.$row['sname'].'</option>';
                            
                            
                        }
                       
                    }
                    ?>

            </select>
            
            
            
            
		</div>
        <label>Date</label>
        <div class="input-field">
			
            <i class="fas fa-calendar"></i>
			<input type="date" name="bookdate" required>
		</div>
    
    
		
            
		
                <button class="btn slid" type="submit" name="search" >Search</button>
          
            
		
	</form>
    


        </div>
    </div> 
</div>

<!-- form end -->






    
    <?php 
    if(isset($_POST['search'])){
        $trstartstation=$_POST['trstartstation'];
        $trendstation=$_POST['trendstation'];
        $bookdate=$_POST['bookdate'];
    
    ?>
    

      
        
     <?php 
       $currentDate=date("Y/m/d");
        $results = executeSQL(" select toid,todate,train.trid,train.trname,train.trprice,totalbookedseatbydate.tobookedseat,train.trseatcapacity,train.trstarttime,train.trendtime,train.trstartstation,train.trendstation,train.trstatus from train inner join totalbookedseatbydate on totalbookedseatbydate.trid=train.trid inner join station s on s.sid=train.trendstation inner join station e on e.sid=train.trendstation WHERE trstartstation =$trstartstation  AND trendstation=$trendstation AND totalbookedseatbydate.todate ='$bookdate'"); 
//        echo  $currentDate;
    ?>

<table class="table">
	<thead>
		<tr>
            
            <th>Train ID</th>
			<th>Name</th>
			<th>Ticket price</th>
            <th>total booked seat</th>
            <th>Seat Capacity</th>
            <th>Start time</th>
             <th>End time</th>
            <th>Start station</th>
             <th>End station</th>
            <th>Date</th>
            <th>Status</th>
            
            
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="Train ID"><?php echo $row['trid']; ?></td>
			<td data-label="Name"><?php echo $row['trname']; ?></td>
            <td data-label="Ticket price"><?php echo $row['trprice']; ?></td>
			<td data-label="total booked seat"><?php echo $row['tobookedseat']; ?></td>
            <td data-label="Seat Capacity"><?php echo $row['trseatcapacity']; ?></td>
            <td data-label="Start time"><?php echo $row['trstarttime']; ?></td>
            <td data-label="End time"><?php echo $row['trendtime']; ?></td>
<!--
            <td><?php echo $row['trstartstation']; ?></td>
            <td><?php echo $row['trendstation']; ?></td>
-->
            
             <td data-label="Start station">
                <?php
                $stationid=$row['trstartstation'];
                $result=executeSQL("SELECT * FROM station WHERE sid = $stationid");
                    
                $result = mysqli_fetch_array($result);
                                                       
                echo $result["sname"];
                ?>
                
            </td>
            
          
            
            <td data-label="End station">
                     
                <?php
                $stationid=$row['trendstation'];
                $result=executeSQL("SELECT * FROM station WHERE sid = $stationid");
                    
                $result = mysqli_fetch_array($result);
                                                       
                echo $result["sname"];
                ?>
         
            
            </td>
            
            
            <td data-label="Date"><?php echo $row['todate']; ?></td>
            <td data-label="Status"><?php 
                    if($row['trstatus']==1)
                        echo "Active" ;
                    else{
                        echo "Not Active";
                    }
                
                
                ?></td>
            
           
            
			<td data-label="Action">
                <?php
                         $currentDate=date("Y-m-d");
                if($row['todate']>=$currentDate){?>
				<a href="payment.php?trid=<?php echo $row['trid']; ?>&tobookedseat=<?php echo $row['tobookedseat']; ?>&trseatcapacity=<?php echo $row['trseatcapacity']; ?>&trprice=<?php echo $row['trprice']; ?>&toid=<?php echo $row['toid']; ?>" class="edit_btn" >GET</a>
                <?php }
                else {
                echo "not available";
                }
                ?>
			</td>
			
		</tr>
	<?php } ?>
</table>    
        
        
     <?php   
    }
    
    
    ?>
    
    
    
    
    
    

</body>
</html>