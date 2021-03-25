<!DOCTYPE html>
<?php  
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:customerloginAndregister.php");
  }
include('service/db.php');

    $trname="";
    $trprice="";
    $trseatcapacity="";
    $trstarttime="";
    $trendtime="";
    $trstartstation=0;

    $trendstation=0; 
    $trstatus=0;

	$trid = 0;
	$update = false;
 ?>

<!--

// to get na infromation of whitch data has been edited..
-->
<?php 
	if (isset($_GET['edit'])) {
		$trid = $_GET['edit'];
		$update = true;
		$record =executeSQL( "SELECT * FROM train WHERE trid=$trid");

		{
			$n = mysqli_fetch_array($record);
			$trname = $n['trname'];
			$trprice = $n['trprice'];
            $trseatcapacity=$n['trseatcapacity'];
            $trstarttime=$n['trstarttime'];
            $trendtime=$n['trendtime'];
            $trstartstation=$n['trstartstation'];
            $trendstation=$n['trendstation'];
            $trstatus=$n['trstatus'];
            echo $trstartstation;
            
		}
	}
?>




<html>
<head>
	<title>Edit Train</title>
    <link rel="stylesheet" type="text/css" href="style/liststyle.css">
    <link rel="stylesheet" type="text/css" href="style/downFormStyle.css">

</head>
<body>
    
<!--    header declaration-->
    <?php
    include('ticketClerkHeader.php');
    ?>
    
    
    
<!--    //show messeage update....-->
    
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    
<!--    //show the list...-->
    
    <?php 
       
        $results = executeSQL("SELECT * FROM train"); 
    ?>

<table class="table">
	<thead>
		<tr>
            <th>ID</th>
			<th>Name</th>
			<th>Ticket price</th>
            <th>Train Seat Capacity</th>
            <th>Train start time</th>
            <th>Train end time</th>
            <th>Train start station</th>
            <th>Train end station</th>
            <th>Status</th>
            
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="ID"><?php echo $row['trid']; ?></td>
			<td data-label="Name"><?php echo $row['trname']; ?></td>
			<td data-label="Ticket price"><?php echo $row['trprice']; ?></td>
            <td data-label="Train Seat Capacity"><?php echo $row['trseatcapacity']; ?></td>
            <td data-label="Train start time"><?php echo $row['trstarttime']; ?></td>
            <td data-label="Train end time"><?php echo $row['trendtime']; ?></td>
            
            
            <td data-label="Train start station">
                <?php
                $stationid=$row['trstartstation'];
                $result=executeSQL("SELECT * FROM station WHERE sid = $stationid");
                    
                $result = mysqli_fetch_array($result);
                                                       
                echo $result["sname"];
                ?>
                
            </td>
            
            
            
            
            <td data-label="Train end station">
                     
                <?php
                $stationid=$row['trendstation'];
                $result=executeSQL("SELECT * FROM station WHERE sid = $stationid");
                    
                $result = mysqli_fetch_array($result);
                                                       
                echo $result["sname"];
                ?>
                
            
            
            
            
            </td>
            
            <td data-label="Status"><?php 
                    if($row['trstatus']==1)
                        echo "Active" ;
                    else{
                        echo "Not Active";
                    }
                
                
                ?></td>
            
            
			<td data-label="Action">
				<a href="train.php?edit=<?php echo $row['trid']; ?>" class="edit_btn" >Edit</a>
			</td>
<!--
			<td>
				<a href="service/trainService.php?del=<?php echo $row['trid']; ?>" class="del_btn">Delete</a>
			</td>
-->
		</tr>
	<?php } ?>
</table>
    
    
<!--    //show input form.....-->
    

<div class="container6">
      <div class="forms-container">
        <div class="signin-signup">



	<form method="post" action="service/trainService.php" class="sign-in-form">
        
        
        <input type="hidden" name="trid" value="<?php echo $trid; ?>">
        <label>Name</label>
		<div class="input-field">
            <i class="fas fa-subway"></i>
			<input type="text" name="trname" value="<?php echo $trname; ?>" required>
		</div>
        <label>Ticket price</label>
		<div class="input-field">
            <i class="fas fa-tags"></i>
			<input type="text" name="trprice" value="<?php echo $trprice; ?>" required>
		</div>
        <label>Train start time</label>
        <div class="input-field">
             <i class="far fa-clock"></i>
			<input type="time" name="trstarttime" value="<?php echo $trstarttime; ?>" required>
		</div>
        <label>Train end time</label>
        <div class="input-field">
            <i class="far fa-clock"></i>
			<input type="time" name="trendtime" value="<?php echo $trendtime; ?>" required>
		</div>
        <label>Train seat capacity</label>
        <div class="input-field">
             <i class="fas fa-chair"></i>
			<input type="text" name="trseatcapacity" value="<?php echo $trseatcapacity; ?>" required>
		</div>
        
        <label>Train Start station</label>
        <div class="input-field">
			
        <i class="fas fa-plane-departure"></i>
            
            
            
            <select name="trstartstation" required>
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
         
            <select name="trendstation" required>
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
        
        
        
        
        <label>Status</label>
        <div class="input-field">
			
            <i class="fas fa-lightbulb"></i>
                <select name="trstatus">
                  <option value=1 <?php if($trstatus==1){echo "selected";} ?> >Active</option>
                  <option value=0 <?php if($trstatus==0){echo "selected";} ?> >Not Active</option>
                </select>
        </div>
		
            
			<?php if ($update == true): ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php else: ?>
                <button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>
            
		
	</form>
    


    </div>
      </div> 
    </div>










</body>
</html>