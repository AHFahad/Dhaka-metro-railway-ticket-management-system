<!DOCTYPE html>
<?php  
session_start();
if (!isset($_SESSION['login'])) {
    header("Location:customerloginAndregister.php");
  }
include('service/db.php');

    $cname="";
    $caddress="";
    $cmobile="";
    $cemail="";
    $cpassword="";
    $cdob="";
	$cid = 0;
	$update = false;
    $cstatus=false;
 ?>

<!--

// to get na infromation of whitch data has been edited..
-->
<?php 
	if (isset($_GET['edit'])) {
		$cid = $_GET['edit'];
		$update = true;
		$record =executeSQL( "SELECT * FROM customer WHERE cid=$cid");

		{
			$n = mysqli_fetch_array($record);
			$cname = $n['cname'];
			$caddress = $n['caddress'];
            $cmobile=$n['cmobile'];
            $cemail=$n['cemail'];
            //$cpassword=$n['cpassword'];
            $cdob=$n['cdob'];
             $cstatus=$n['cstatus'];
            
		}
	}
?>




<html>
<head>
	<title>Customer</title>
    <link rel="stylesheet" type="text/css" href="style/liststyle.css">
    <link rel="stylesheet" type="text/css" href="style/downFormStyle.css">
</head>
<body>
    
    <!--    header declaration-->
    <?php
    include('ticketClerkHeader.php');
    ?>
    
    
<!--    //show messeage ....-->
    
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
       
        $results = executeSQL("SELECT * FROM customer"); 
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
             <th>Status</th>
            
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
            <td data-label="ID"><?php echo $row['cid']; ?></td>
			<td data-label="Name"><?php echo $row['cname']; ?></td>
			<td data-label="Address"><?php echo $row['caddress']; ?></td>
            <td data-label="Email"><?php echo $row['cemail']; ?></td>
            <td data-label="Mobile"><?php echo $row['cmobile']; ?></td>
            <td data-label="Date of birth"><?php echo $row['cdob']; ?></td>
            
            
            <td data-label="Status"><?php 
                    if($row['cstatus']==1)
                        echo "Active" ;
                    else{
                        echo "Not Active";
                    }
                
                
                ?></td>
            
            
            
            
            
            
            
			<td data-label="Action">
				<a href="customer.php?edit=<?php echo $row['cid']; ?>" class="edit_btn" >Edit</a>
			</td>
<!--
			<td>
				<a href="service/customerService.php?del=<?php echo $row['cid']; ?>" class="del_btn">Delete</a>
			</td>
-->
		</tr>
	<?php } ?>
</table>
    
    
<!--    //show input form.....-->

    <div class="container5">
      <div class="forms-container">
        <div class="signin-signup">
    
	<form method="post" action="service/customerService.php" class="sign-in-form">
        
        
        <input type="hidden" name="cid" value="<?php echo $cid; ?>">
        <label>Name</label>
		<div class="input-field">
            <i class="fas fa-user"></i>
			<input type="text" name="cname" value="<?php echo $cname; ?>" required>
		</div>
        <label>Address</label>
		<div class="input-field">
            <i class="fas fa-address-card"></i>
			<input type="text" name="caddress" value="<?php echo $caddress; ?>" required>
		</div>
        <label>Password (You can not update password)</label>
        <div class="input-field">
            <i class="fas fa-lock"></i>
			<input type="password" name="cpassword" value="<?php echo $cpassword; ?>">
		</div>
        <label>Email</label>
        <div class="input-field">
            <i class="fas fa-envelope"></i>
			<input type="email" name="cemail" value="<?php echo $cemail; ?>" required>
		</div>
        <label>Mobile</label>
        <div class="input-field">
            <i class="fas fa-mobile-alt"></i>
			<input type="text" name="cmobile" value="<?php echo $cmobile; ?>" required>
		</div>
        <label>date of birth</label>
        <div class="input-field">
            <i class="fas fa-calendar"></i>
			<input type="date" name="cdob" value="<?php echo $cdob; ?>" required>
		</div>
        <label>status</label>
        <div class="input-field">
			
                 <i class="fas fa-lightbulb"></i>	
                <select name="cstatus" >
                  <option value=1 <?php if($cstatus==1){echo "selected";} ?> >Active</option>
                  <option value=0 <?php if($cstatus==0){echo "selected";} ?> >Not Active</option>
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