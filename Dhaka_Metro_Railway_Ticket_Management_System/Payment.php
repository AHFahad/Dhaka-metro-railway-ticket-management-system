<!DOCTYPE html>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header("Location:customerloginAndregister.php");
      }
    require "service/db.php";
?>
<html>
<head>
    <title>Payment</title>
    
    <link rel="stylesheet" type="text/css" href="style/liststyle.css">
    <link rel="stylesheet" type="text/css" href="style/downformstyle.css">
    <link rel="stylesheet" type="text/css" href="style/homeStyle.css">
    
</head>
<body>
    <?php
    include('customerHeader.php');
    
    
    $trid = $_GET['trid'];
    $tobookedseat = $_GET['tobookedseat'];
    $trseatcapacity = $_GET['trseatcapacity'];
    $trprice = $_GET['trprice'];
    $toid = $_GET['toid'];
    $_SESSION['trid']= $_GET['trid'];
    $_SESSION['tobookedseat'] = $_GET['tobookedseat'];
    $_SESSION['trseatcapacity'] = $_GET['trseatcapacity'];
    $_SESSION['trprice'] = $_GET['trprice'];
    $_SESSION['toid'] = $_GET['toid'];
    
    
    
    $availableseat=$trseatcapacity-$tobookedseat;
    $ticketscanbuy=0;
    if($availableseat>=4){
        $ticketscanbuy=4;
    }
    elseif($availableseat<0){
        $ticketscanbuy=0;
    }
    else{
      $ticketscanbuy=$availableseat;
    }
    
    
    ?>


<div class="container3">
    <div class="forms-container">
        <div class="signin-signup">

         <form method="post" action="service/customerservice.php" class="sign-in-form">
        
         <label>Cost per seat</label>
         
         
        <div class="input-group">
        
        <i class="fas fa-money-bill-wave"></i>
        
            <?php echo $trprice;?> 

             <input type="hidden" id="price" name="t" value="<?php echo $trprice; ?>">
             
		</div>



        <?php echo  "You can buy ".$ticketscanbuy." tikets at Max "; ?>
           
			<label>No of tickets</label>
        <div class="input-field">
            
        <i class="fas fa-ticket-alt"></i>
            <select name="nooftickets" id="nooftickets">
                <?php
                    
                    
                    $count=1;
                    while($count<=$ticketscanbuy){
                       echo '<option value="'.$count.'"  ">'.$count.'</option>';
                        $count++;
                    }
                ?>
            </select>
		</div>
        <label>Total Cost</label>
        <div class="input-group">
             
            <p class="totalcost" id="totalcost"><?php echo $trprice;?></p>
		</div>
        <label>Payment method</label>  
          <div class="input-field">
          <i class="far fa-credit-card"></i>
			<select name="tipaymentmethod" id="paymentmethod" >
                <option value="1">Bikash</option>
                <option value="2">Bank</option>
                <option value="3">Nagad</option>
             
            </select>
		</div>
        <label>Send money to our</label>
             <div class="input-group">
			
            <p id="accountno">bikash account :016-XXXXXXX</p>
		</div>
        <label>Transaction No</label>
        <div class="input-field">
            <i class="fas fa-barcode"></i>
			<input type="text" name="titransactionno" required>
		</div>
    
    
		
            
		
                <button class="btn" type="submit" name="pay" >Pay</button>
          
            
		
	</form>
    
    </div>
    </div> 
</div>
    
    
   
    
    <script>
        document.getElementById('nooftickets').onchange = function() {
        var a = this.value;
        var b=  document.getElementById('price').value;
            var x=a*b;
        document.getElementById("totalcost").innerHTML = x;    
       
        };
        document.getElementById('paymentmethod').onchange = function() {
        var a = this.value;
        if(a==1){
          document.getElementById("accountno").innerHTML = "bikash account :016-XXXXXXX";  
        }
        else if(a==2){
          document.getElementById("accountno").innerHTML = "bank account :123-XXXXX-XX-X";  
        } 
        else{
          document.getElementById("accountno").innerHTML = "Nagat account :016-XXXXXXX";  
        }   
       
        };
    </script>
</body>
</html>