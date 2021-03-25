<!DOCTYPE html>
<?php  
session_start();
if (!isset($_SESSION['login'])) {
	header("Location:customerloginAndregister.php");
  }
include('service/db.php');

    $tname="";
    $taddress="";
    $tmobile="";
    $temail="";
    $tpassword="";
    $tdob="";
	$tid = 0;
	$update = false;
 ?>

<!--

// to get na infromation of whitch data has been edited..
-->
<?php 
	if (isset($_GET['edit'])) {
		$tid = $_GET['edit'];
		$update = true;
		$record =executeSQL( "SELECT * FROM ticketclerk WHERE tid=$tid");

		{
			$n = mysqli_fetch_array($record);
			$tname = $n['tname'];
			$taddress = $n['taddress'];
            $tmobile=$n['tmobile'];
            $temail=$n['temail'];
            //$tpassword=$n['tpassword'];
            $tdob=$n['tdob'];
            
		}
	}
?>




<html>
<head>
	<title>Edit Ticket Clerk</title>
    
	<link rel="stylesheet" type="text/css" href="style/liststyle.css">
	<link rel="stylesheet" type="text/css" href="style/downformstyle.css">
	

</head>
<body>
<!--    header load-->
    <?php
    include('adminHeader.php');
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
       
        $results = executeSQL("SELECT * FROM ticketclerk"); 
    ?>

<table class="table">
	<thead>
		<tr>
            <th>ID</th>
			<th>Name</th>
			<th>Address</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Date of birth</th>
            
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="ID"><?php echo $row['tid']; ?></td>
			<td data-label="Name"><?php echo $row['tname']; ?></td>
			<td data-label="Address"><?php echo $row['taddress']; ?></td>
            <td data-label="Email"><?php echo $row['temail']; ?></td>
            <td data-label="Mobile"><?php echo $row['tmobile']; ?></td>
            <td data-label="Date of birth"><?php echo $row['tdob']; ?></td>
			<td data-label="Action">
				<a href="ticketClerk.php?edit=<?php echo $row['tid']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td data-label="Action">
				<a href="service/ticketClerkService.php?del=<?php echo $row['tid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
    
    
<!--    //show input form.....-->
<div class="container4">
      <div class="forms-container">
        <div class="signin-signup">    

	<form method="post" action="service/ticketClerkService.php" class="sign-in-form">
        
        
        <input type="hidden" name="tid" value="<?php echo $tid; ?>">
        <label>Name</label>
		<div class="input-field">
			<i class="fas fa-user"></i>
			<input type="text" name="tname" value="<?php echo $tname; ?>" required>
		</div>
		<label>Address</label>
		<div class="input-field">
			<i class="fas fa-address-card"></i>	
			<input type="text" name="taddress" value="<?php echo $taddress; ?>" required>
		</div>
		<label>Password</label>
        <div class="input-field">
			<i class="fas fa-lock"></i>
			<input type="password" name="tpassword" value="<?php echo $tpassword; ?>" >
		</div>
		<label>Email</label>
        <div class="input-field">
			<i class="fas fa-envelope"></i>
			<input type="text" name="temail" value="<?php echo $temail; ?>" required>
		</div>
		<label>Mobile</label>
        <div class="input-field">
			<i class="fas fa-mobile-alt"></i>
			<input type="text" name="tmobile" value="<?php echo $tmobile; ?>" required>
		</div>
		<label>date of birth</label>
        <div class="input-field">
			<i class="fas fa-calendar"></i>
			<input type="date" name="tdob" value="<?php echo $tdob; ?>" required>
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