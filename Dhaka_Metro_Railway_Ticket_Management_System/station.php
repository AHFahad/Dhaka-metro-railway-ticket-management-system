<!DOCTYPE html>
<?php  
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:customerloginAndregister.php");
  }
include('service/db.php');

    $sname="";
    $slocation="";
    $sstatus=false;
//    $cemail="";
//    $cpassword="";
//    $cdob="";
	$sid = 0;
	$update = false;
 ?>

<!--

// to get na infromation of whitch data has been edited..
-->
<?php 
	if (isset($_GET['edit'])) {
		$sid = $_GET['edit'];
		$update = true;
		$record =executeSQL( "SELECT * FROM station WHERE sid=$sid");

		{
			$n = mysqli_fetch_array($record);
			$sname = $n['sname'];
			$slocation = $n['slocation'];
            $sstatus=$n['sstatus'];
//            $cemail=$n['cemail'];
            //$cpassword=$n['cpassword'];
//            $cdob=$n['cdob'];
            
		}
	}
?>




<html>
<head>
	<title>Station</title>
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
       
        $results = executeSQL("SELECT * FROM station"); 
    ?>

<table class="table">
	<thead>
		<tr>
            <th>ID</th>
			<th>Station Name</th>
			<th>Location</th>
            <th>Status</th>
<!--
            <th>mobile</th>
            <th>date of birth</th>
-->
            
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="ID"><?php echo $row['sid']; ?></td>
			<td data-label="Station Name"><?php echo $row['sname']; ?></td>
			<td data-label="Location"><?php echo $row['slocation']; ?></td>
            
<!--            <td><?php echo $row['cemail']; ?></td>-->
            <td data-label="Status"><?php 
                    if($row['sstatus']==1)
                        echo "Active" ;
                    else{
                        echo "Not Active";
                    }
                
                
                ?></td>
            
<!--            <td><?php echo $row['cdob']; ?></td>-->
			<td data-label="Action">
				<a href="station.php?edit=<?php echo $row['sid']; ?>" class="edit_btn" >Edit</a>
			</td>
<!--
			<td>
				<a href="service/stationService.php?del=<?php echo $row['sid']; ?>" class="del_btn">Delete</a>
			</td>
-->
		</tr>
	<?php } ?>
</table>
    
    
<!--    //show input form.....-->

<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
    
	<form method="post" action="service/stationService.php" class="sign-in-form">
        
        
        <input type="hidden" name="sid" value="<?php echo $sid; ?>">
        <label>Name</label>
		<div class="input-field">
		<i class="fas fa-plane-departure"></i>	
			<input type="text" name="sname" value="<?php echo $sname; ?>"required>
		</div>
		<label>Location</label>
		<div class="input-field">
		<i class="fas fa-address-card"></i>	
			<input type="text" name="slocation" value="<?php echo $slocation; ?>" required>
		</div>
        
        
        
        <label>status</label>
        <div class="input-field">
		<i class="fas fa-lightbulb"></i>	
            
                <select name="sstatus" >
                  <option value=1 <?php if($sstatus==1){echo "selected";} ?> >Active</option>
                  <option value=0 <?php if($sstatus==0){echo "selected";} ?> >Not Active</option>
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